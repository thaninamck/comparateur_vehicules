<?php
require_once ('../Controllers/AcceuilController.php');

$idtype = !empty($_POST['type_id']) ? $_POST['type_id'] : '';
if (isset($_POST['type_id'])) {
    $accueilController = new AccueilController();
    $marques = $accueilController->getMarqueByType($idtype);
    if ($marques) {
        $html = '<option value="">Sélectionnez la marque</option>';
        foreach ($marques as $marque) {
            $html .= '<option value="' . $marque['id_mrq'] . '">' . $marque['nom'] . '</option>';
        }
        echo $html;
    } else {
        echo '<option value="">Aucune marque trouvée</option>';
    }
}else {
    echo '<option value="">post estvide</option>';
}

?>