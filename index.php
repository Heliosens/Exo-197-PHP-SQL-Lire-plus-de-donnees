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
        foreach ($stm->fetchAll() as $client){
            echo "<span>|" . $client['lastName'] . " " . $client['firstName'] . "</span>";
        }
    }

?>

</body>
</html>
