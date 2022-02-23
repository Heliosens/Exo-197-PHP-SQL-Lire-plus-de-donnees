<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exo complet lecture SQL.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require "connPDO.php";

    $pdo = new connPDO();
    $db = $pdo->conn();

    $stm = $db->prepare("SELECT * FROM clients");
    if($stm->execute()){
        echo "<span>Clients :</span><div>";
        foreach ($stm->fetchAll() as $client){
            echo "<p>" . $client['lastName'] . " " . $client['firstName'] . "</p>";
        }
        echo "</div>";
    }

    $stm = $db->prepare("SELECT * FROM showtypes");
    if($stm->execute()){
        echo "<span>Types de spectacle :</span><div>";
        foreach ($stm->fetchAll() as $item){
            echo "<p>" . $item['type'] . "</p>";
        }
        echo "</div>";
    }

    $stm = $db->prepare("SELECT * FROM clients LIMIT 20");
    if($stm->execute()){
        echo "<span>20 Clients :</span><div>";
        foreach ($stm->fetchAll() as $client){
            echo "<p>" . $client['id'] . " : " . $client['lastName'] . " " . $client['firstName'] . "</p>";
        }
        echo "</div>";
    }

    $stm = $db->prepare("SELECT * FROM clients WHERE card = 1");
    if($stm->execute()){
        echo "<span>Clients avec carte :</span><div>";
        foreach ($stm->fetchAll() as $client){
            echo "<p>" . $client['lastName'] . " " . $client['firstName'] . "</p>";
        }
        echo "</div>";
    }

    $stm = $db->prepare("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName");
    if($stm->execute()){
        echo "<span>M :</span><div>";
        foreach ($stm->fetchAll() as $client){
            echo "<p>Nom : " . $client['lastName'] . "<br>Prénom : " . $client['firstName'] . "</p>";
        }
        echo "</div>";
    }

    $stm = $db->prepare("SELECT * FROM shows ORDER BY title");
    if($stm->execute()){
        echo "<span>Spectacles :</span><div>";
        foreach ($stm->fetchAll() as $name){
            echo "<p>" . $name['title'] . " par " . $name['performer'] . ", le " . $name['date'] . " à " . $name['startTime'] . "</p>";
        }
        echo "</div>";
    }

    $stm = $db->prepare("SELECT * FROM clients");
    if($stm->execute()){
        echo "<span>Clients :</span><div>";
        foreach ($stm->fetchAll() as $client){
            echo "<p>Nom : " . $client['lastName'] . "<br>Prénom : " . $client['firstName'] . "<br>Date de naissance : "
            . $client['birthDate'];
            echo $client['card'] === "1" ? "<br>Carte de fidélité : oui <br>Numéro de carte : " . $client['cardNumber'] : "<br>Carte de fidélité : non";

        }
        echo "</div>";
    }

?>

</body>
</html>
