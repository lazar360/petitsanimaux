<?php include("../Commons/header.php"); ?>

<?php 
$bdd = connexionPDO();
$stmt = $bdd->prepare("SELECT * FROM animal");
$stmt->execute();
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

echo "<pre>";
print_r($resultats);


function connexionPDO() {
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_animaux;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $bdd;
    }
    catch(PDOException $e) {
        die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}
?>

<?php include("../Commons/footer.php") ?>