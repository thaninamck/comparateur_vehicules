<?php
require_once ('../Controllers/AcceuilController.php');

$idmrq = !empty($_POST['marque_id']) ? $_POST['marque_id'] : '';
if (isset($_POST['marque_id'])) {
    $accueilController = new AccueilController();
    $modeles = $accueilController->getModeleByMarque($idmrq);
    if ($modeles) {
        $html = '<option value="">Sélectionnez la modele</option>';
        foreach ($modeles as $modele) {
            $html .= '<option value="' . $modele['id_mdl'] . '">' . $modele['nom'] . '</option>';
        }
        echo $html;
    } else {
        echo '<option value="">Aucune modele trouvée</option>';
    }
}else {
    echo '<option value="">post estvide</option>';
}

?>