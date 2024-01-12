<?php  
require_once('../Models/DbModel.php');

class GuideAchatModel {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function getGuideAchat() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM guide_achat");
        $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $results;
    }

    

            public function getvehicles() {
                $pdo = $this->dbModel->connect();
                $stm = $pdo->query("SELECT 
                                            v.id_vcl AS id_vehicule,
                                            v.image AS image_vehicule,
                                            v.annee AS annee_vehicule,
                                            m.id_mrq AS id_marque,
                                            m.logo AS logo_marque,
                                            m.nom AS nom_marque,
                                            mdl.id_mdl AS id_modele,
                                            mdl.nom AS nom_modele,
                                            vs.id_version AS id_version,
                                            vs.nom AS nom_version
                                        FROM vehicule v
                                        JOIN modele mdl ON v.id_mdl = mdl.id_mdl
                                        JOIN marque m ON mdl.id_mrq = m.id_mrq
                                        JOIN version vs ON v.id_vcl = vs.id_vcl");
                $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
                $this->dbModel->disconnect($pdo);
                return $results;
            }

            public function getVehicleById($id) {
                $pdo = $this->dbModel->connect();
                
                $query = "SELECT t.id_type_v as id_type, t.nom as nom_type, v.id_vcl, v.image, v.note, v.annee,
                                m.nom AS marque, m.id_mrq as id_marque, mdl.id_mdl as id_modele, mdl.nom AS modele,
                                vr.nom AS version,vr.id_version as id_version,
                                c.id_caract as id_caract,
                                c.nom AS caracteristique,
                                c.valeur AS valeur
                        FROM vehicule v
                        INNER JOIN modele mdl ON v.id_mdl = mdl.id_mdl
                        INNER JOIN marque m ON mdl.id_mrq = m.id_mrq
                        JOIN marque_type mt ON mt.id_mrq = m.id_mrq
                        JOIN type_vehicule t ON t.id_type_v = mt.id_type_v
                        LEFT JOIN version vr ON v.id_vcl = vr.id_vcl
                        LEFT JOIN vehicule_caracteristiques vc ON v.id_vcl = vc.id_vcl
                        LEFT JOIN caracteristiques c ON vc.id_caract = c.id_caract
                        WHERE v.id_vcl = :id";
                
                $stm = $pdo->prepare($query);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                
                $vehicles = [];
                $currentVehicle = null;
                
                while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    $vehicleId = $row['id_vcl'];
                    
                    if (!$currentVehicle) {
                        $currentVehicle = [
                            'id_vcl' => $row['id_vcl'],
                            'image' => $row['image'],
                            'marque' => $row['marque'],
                            'id_marque' => $row['id_marque'],
                            'modele' => $row['modele'],
                            'id_modele' => $row['id_modele'],
                            'annee' => $row['annee'],
                            'id_version' => $row['id_version'],
                            'version' => $row['version'],
                            'id_type' => $row['id_type'],
                            'nom_type' => $row['nom_type'],
                            'caracteristiques' => []
                        ];
                    }
                    
                    $caracteristique = [
                        'id_caract' => $row['id_caract'],
                        'caracteristique' => $row['caracteristique'],
                        'valeur' => $row['valeur']
                    ];
                    
                    $currentVehicle['caracteristiques'][] = $caracteristique;
                }
                
                if ($currentVehicle) {
                    $vehicles[] = $currentVehicle;
                }
                
                $this->dbModel->disconnect($pdo);
                return $vehicles;
            }
            
            
            
            
            public function getHighRatedAv( $id_vcl) {
                $pdo = $this->dbModel->connect();
                
                $query = "SELECT av.*, u.nom AS nom_utilisateur, u.photo AS photo_utilisateur
                          FROM avis_vehicule av
                          INNER JOIN user u ON av.id_user = u.id_user
                          WHERE av.id_vcl = :id_vcl AND av.note >= 70 AND approuv=1
                          LIMIT 3";
                
                $stm = $pdo->prepare($query);
                
                $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
                $stm->execute();
                
                $avis = $stm->fetchAll(PDO::FETCH_ASSOC);
                
                $this->dbModel->disconnect($pdo);
                return $avis;
            }
            




            public function incrementerNoteAvis($id_avs_vcl){
                $pdo = $this->dbModel->connect();
                
                $query = "UPDATE avis_vehicule SET note = note + 1 WHERE id_avs_vcl = :id_avs_vcl";
                $stm = $pdo->prepare($query);
                $stm->bindParam(':id_avs_vcl', $id_avs_vcl, PDO::PARAM_INT);
                $stm->execute();
                
                $this->dbModel->disconnect($pdo);
            }
            





            public function insererAvisVehicule($id_user, $id_vcl, $avis_text) {
                $pdo = $this->dbModel->connect();
                
                $query = "INSERT INTO avis_vehicule (id_user, id_vcl, cntxt, approuv, date, note) VALUES (:id_user, :id_vcl, :cntxt, 0, NOW(), 0)";
                
                $stm = $pdo->prepare($query);
                
                $stm->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $stm->bindParam(':id_vcl', $id_vcl, PDO::PARAM_INT);
                $stm->bindParam(':cntxt', $avis_text, PDO::PARAM_STR);
                
                // Exécutez la requête d'insertion
                $success = $stm->execute();
                
                $this->dbModel->disconnect($pdo);
                
                return $success; // Renvoie true si l'insertion a réussi, sinon false
            }
            




            public function getPopularComparaisonsOfVehicle($id) {
                $pdo = $this->dbModel->connect();
                
                $query = "SELECT m1.nom AS marque_1, mo1.nom AS modele_1, ver1.nom AS version_1,
                                 m2.nom AS marque_2, mo2.nom AS modele_2, ver2.nom AS version_2 
                          FROM comparaison c 
                          JOIN vehicule v1 ON c.id_vcl_cmp = v1.id_vcl 
                          JOIN modele mo1 ON v1.id_mdl = mo1.id_mdl
                          JOIN marque m1 ON mo1.id_mrq = m1.id_mrq 
                          JOIN version ver1 ON ver1.id_vcl = v1.id_vcl 
                          JOIN vehicule v2 ON c.id_vcl_cmp_av = v2.id_vcl 
                          JOIN modele mo2 ON v2.id_mdl = mo2.id_mdl 
                          JOIN marque m2 ON mo2.id_mrq = m2.id_mrq 
                          JOIN version ver2 ON ver2.id_vcl = v2.id_vcl 
                          WHERE (c.id_vcl_cmp = :id OR c.id_vcl_cmp_av = :id)
                          AND c.occurences >= 1"; 
                
                $stm = $pdo->prepare($query);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                $comparaisons = $stm->fetchAll(PDO::FETCH_ASSOC);
                
                $this->dbModel->disconnect($pdo);
                return $comparaisons;
            }
            
            
            public function getGuideAchatById($id) {
                $pdo = $this->dbModel->connect();
                $stm = $pdo->prepare("SELECT * FROM guide_achat WHERE id_gd_ach = :id");
                $stm->bindParam(':id', $id);
                $stm->execute();
                $results = $stm->fetchAll(\PDO::FETCH_ASSOC);
                $this->dbModel->disconnect($pdo);
                return $results;
            }
            
        
            public function updateGuideAchat($id, $titre, $contenu, $img) {
                $pdo = $this->dbModel->connect();
                $sql = "UPDATE guide_achat SET titre = :titre, contenu = :contenu, img = :img WHERE id_gd_ach = :id";
                
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindParam(':titre', $titre);
                $stmt->bindParam(':contenu', $contenu);
                $stmt->bindParam(':img', $img);
                $stmt->bindParam(':id', $id);
                
                $stmt->execute();
                
                $this->dbModel->disconnect($pdo);
            }
            
        
        


            public function insererNouveauFavori($id_user, $id_vcl) {
                $pdo = $this->dbModel->connect();
                
                $sql = "INSERT INTO favoris (id_user, id_vcl) VALUES (:id_user, :id_vcl)";
                
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_user', $id_user);
                $stmt->bindParam(':id_vcl', $id_vcl);
                
                $stmt->execute();
                
                $this->dbModel->disconnect($pdo);
            }

            public function checkIfFavoriteExists($id_user, $id_vcl) {
                $pdo = $this->dbModel->connect();
                
                $sql = "SELECT COUNT(*) as count FROM favoris WHERE id_user = :id_user AND id_vcl = :id_vcl";
                
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_user', $id_user);
                $stmt->bindParam(':id_vcl', $id_vcl);
                
                $stmt->execute();
                
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $this->dbModel->disconnect($pdo);
                
                return ($result['count'] > 0) ? 1 : 0;
            }
            

            
            
            public function deleteFavorite($id_user, $id_vcl) {
                $pdo = $this->dbModel->connect();
                
                
                    $sql = "DELETE FROM favoris WHERE id_user = :id_user AND id_vcl = :id_vcl";
                    
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id_user', $id_user);
                    $stmt->bindParam(':id_vcl', $id_vcl);
                    
                    $stmt->execute();
                
                
                $this->dbModel->disconnect($pdo);
            }
            
        
        
        }