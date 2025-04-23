<?php
    // supprimer un produit et message de confirmation de suppression
    include 'database.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM produits WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        if($stmt->rowCount() > 0) {
           echo "Produit supprimé avec succès!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</html>

