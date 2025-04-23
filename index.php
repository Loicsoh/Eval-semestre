<?php
include 'database.php';

$sql = "SELECT * FROM produits";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: gray;
        }
    </style>
    <title>liste produits</title>
<body>
    
    <!-- tableau d'affichage des produit de la base de donnees -->
    <h1>Liste des produits</h1>

    
    <a href="insert_produit.php"><button>Ajouter</button></a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Libelle</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td><?php echo $produit['id']; ?></td>
                    <td><?php echo $produit['libelle']; ?></td>
                    <td><?php echo $produit['description']; ?></td>
                    <td>
                       
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        
</body>
</html>