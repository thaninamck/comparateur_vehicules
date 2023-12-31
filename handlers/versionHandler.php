
<?php
require_once ('../Controllers/AcceuilController.php');

$year = !empty($_POST['year']) ? $_POST['year'] : '';
$idmdl = !empty($_POST['modele_id']) ? $_POST['modele_id'] : '';
if (isset($_POST['year']) && isset($_POST['modele_id']) ) {
    $accueilController = new AccueilController();
    $versions = $accueilController->getVersionByYear($year , $idmdl);
    if ($versions) {
        $html = '<option value="">Sélectionnez la year</option>';
        foreach ($versions as $version) {
            $html .= '<option value="' . $version['id_version'] . '">' . $version['nom_version'] . '</option>';
        }
        echo $html;
    } else {
        echo '<option value="">Aucune version trouvée</option>';
    }
}else {
    echo '<option value="">post estvide</option>';
}

?>