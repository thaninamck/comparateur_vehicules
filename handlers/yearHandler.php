<?php
require_once ('../Controllers/AcceuilController.php');

$idmdl = !empty($_POST['modele_id']) ? $_POST['modele_id'] : '';
if (isset($_POST['modele_id'])) {
    $accueilController = new AccueilController();
    $years = $accueilController->getYearByModele($idmdl);
    var_dump("le resultat de var_dump est :",$years);
    if ($years) {
        $html = '<option value="">Sélectionnez la year</option>';
        foreach ($years as $year) {
            $html .= '<option value="' . $year['id_vcl'] . '">' . $year['annee'] . '</option>';
        }
        echo $html;
    } else {
        echo '<option value="">Aucune annee trouvée</option>';
    }
}else {
    echo '<option value="">post estvide</option>';
}

?>