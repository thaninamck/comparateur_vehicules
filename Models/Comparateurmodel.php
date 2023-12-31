<?php  
require_once('../Models/DbModel.php');

class Comparateurmodel {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DbModel();
    }

    public function getTypesVehicules() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->query("SELECT * FROM type_vehicule");
        $results = $stm->fetchAll(PDO::FETCH_NUM);
        $this->dbModel->disconnect($pdo);
        return $results;
    }

    public function getModeleByMarque($idmrq) {
        
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT * FROM modele  WHERE id_mrq = ?");
        $stm->execute(array($idmrq));
        $modeles = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $modeles;
    }


    


    public function getYearByModele($idmdl) {
        
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT DISTINCT annee,id_vcl FROM `vehicule`  WHERE id_mdl = ?");
        $stm->execute(array($idmdl));
        $annees = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $annees;
    }


    public function getVersionByYear($year , $idmdl) {
        
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("SELECT ve.id_vcl, ve.id_mdl, ve.image,  ve.annee, vr.id_version, vr.nom AS nom_version
                                FROM vehicule ve
                                JOIN version vr ON ve.id_vcl = vr.id_vcl
                                WHERE ve.annee =  ?
                                AND ve.id_mdl = ?");
        $stm->execute(array($year , $idmdl ));
        $versions = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $versions;
    }

    public function insertComparaison($id1 , $id2) {
        
        $pdo = $this->dbModel->connect();
        $stm =  $pdo->prepare("INSERT INTO comparaison (id_vcl_cmp, id_vcl_cmp_av, occurences)
                                VALUES
                                    (?, ?, 1)
                                ON DUPLICATE KEY UPDATE
                                   occurences = occurences + 1;
                                ");
        $stm->execute(array($id1 , $id2));
        
        $this->dbModel->disconnect($pdo);
        
    }


    public function getIDsComparaisons() {
        $pdo = $this->dbModel->connect();
        $stm = $pdo->prepare("SELECT id_vcl_cmp as id1 , id_vcl_cmp_av as id2 FROM `comparaison` WHERE occurences >= 15;");
        $stm->execute();
        $IDs = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $IDs;
    }
    
    public function getPopularComparaisons() {
        $pdo = $this->dbModel->connect();
        
        // Récupérer les ID des comparaisons populaires
        $IDs = $this->getIDsComparaisons();
        
        // Si aucun ID trouvé, retourner un tableau vide
        if (empty($IDs)) {
            $this->dbModel->disconnect($pdo);
            return [];
        }
    
        // Convertir les ID pour les utiliser dans la requête SQL IN
        $idList = [];
        foreach ($IDs as $id) {
            $idList[] = $id['id1'];
            $idList[] = $id['id2'];
        }
    
        // Créer une chaîne de placeholders pour les IDs
        $placeholders = implode(',', array_fill(0, count($idList), '?'));
    
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
                    WHERE c.id_vcl_cmp IN ($placeholders) AND c.id_vcl_cmp_av IN ($placeholders)
                    AND c.occurences >= 1
                    LIMIT 0, 25;";
    
        $stm = $pdo->prepare($query);
        $stm->execute(array_merge($idList, $idList));
        $comparaisons = $stm->fetchAll(\PDO::FETCH_ASSOC);
        $this->dbModel->disconnect($pdo);
        return $comparaisons;
    }




    public function compareSingleVehicle($marque, $model, $year, $version) {
        $pdo = $this->dbModel->connect(); 
    
        $query = "SELECT mo.id_mdl, version.nom as version, version.id_version, mo.id_mdl, v.id_vcl, v.image, m.nom AS marque, mo.nom AS modele, c.id_caract as id_caract, v.annee, c.nom AS caracteristique, c.valeur AS valeur 
        FROM vehicule v 
        JOIN modele mo ON v.id_mdl = mo.id_mdl 
        JOIN marque m ON mo.id_mrq = m.id_mrq 
        JOIN version ON version.id_vcl=v.id_vcl 
        JOIN vehicule_caracteristiques vc ON v.id_vcl = vc.id_vcl 
        LEFT JOIN caracteristiques c ON vc.id_caract = c.id_caract 
        WHERE m.id_mrq = ? AND mo.id_mdl = ? AND v.annee = ? AND version.id_version = ?"; 
    
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $marque, PDO::PARAM_INT);
        $stmt->bindParam(2, $model, PDO::PARAM_INT);
        $stmt->bindParam(3, $year, PDO::PARAM_INT);
        $stmt->bindParam(4, $version, PDO::PARAM_INT);
        $stmt->execute();
    
        $vehicles = [];
    
        // Utiliser fetch pour obtenir les résultats de la requête
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vehicleId = $row['id_vcl'];
    
            $caracteristique = [
                'id_caract' => $row['id_caract'],
                'caracteristique' => $row['caracteristique'],
                'valeur' => $row['valeur']
            ];
    
            if (!isset($vehicles[$vehicleId])) {
                $vehicles[$vehicleId] = [
                    'id_mdl' => $row['id_mdl'],
                    'version' => $row['version'],
                    'id_version' => $row['id_version'],
                    'id_vcl' => $row['id_vcl'], 
                    'image' => $row['image'],
                    'marque' => $row['marque'],
                    'modele' => $row['modele'],
                    'annee' => $row['annee'],
                    'caracteristiques' => []
                ];
            }
    
            $vehicles[$vehicleId]['caracteristiques'][] = $caracteristique;
        }
    
        $this->dbModel->disconnect($pdo);
    
        return $vehicles;
    }
    















}
    
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
/*function getVehiclesData($conn) {
    $query = "SELECT mo.id_mdl, version.nom as version, version.id_version, mo.id_mdl, v.id_vcl, v.image, m.nom AS marque, mo.nom AS modele, c.id_caract as id_caract, v.annee, c.nom AS caracteristique, c.valeur AS valeur 
              FROM vehicule v 
              JOIN modele mo ON v.id_mdl = mo.id_mdl 
              JOIN marque m ON mo.id_mrq = m.id_mrq 
              JOIN version ON version.id_vcl=v.id_vcl 
              JOIN vehicule_caracteristiques vc ON v.id_vcl = vc.id_vcl 
              LEFT JOIN caracteristiques c ON vc.id_caract = c.id_caract 
              WHERE m.id_mrq = 5 AND mo.id_mdl = 2 AND v.annee = 2023 AND version.id_version = 4";

    $result = $conn->query($query);

    $vehicles = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $vehicleId = $row['id_vcl'];

            // Créer une structure pour stocker les caractéristiques
            $caracteristique = [
                'id_caract' => $row['id_caract'],
                'caracteristique' => $row['caracteristique'],
                'valeur' => $row['valeur']
            ];

            // Si le véhicule n'existe pas encore dans $vehicles, le créer avec ses attributs
            if (!isset($vehicles[$vehicleId])) {
                $vehicles[$vehicleId] = [
                    'id_mdl' => $row['id_mdl'],
                    'version' => $row['version'],
                    'id_version' => $row['id_version'],
                    'id_vcl' => $row['id_vcl'],
                    'image' => $row['image'],
                    'marque' => $row['marque'],
                    'modele' => $row['modele'],
                    'annee' => $row['annee'],
                    'caracteristiques' => []
                ];
            }

            // Ajouter la caractéristique au véhicule correspondant
            $vehicles[$vehicleId]['caracteristiques'][] = $caracteristique;
        }
    }

    return $vehicles;
}

    
    

    
}
*/



?>