<?php
include 'database.php';

// insertion des donnees

if(isset($_POST['add'])) {
    if(!empty($_POST['libelle']) && !empty($_POST['description'])) {
        $libelle =htmlspecialchars( $_POST['libelle']);
        $description = htmlspecialchars($_POST['description']);
        
            $sql = "INSERT INTO produits (libelle, description) VALUES (:libelle, :description)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':libelle' => $libelle,
                ':description' => $description
            ]);
            header('Location: index.php');
            exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form action="insert_produit.php" method="POST">
        <label for="libelle">Libelle:</label>
        <input type="text" id="libelle" name="libelle" required>
        <br><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>
        <br>
        <button type="submit" name="add">Ajouter</button>
    </form>
    
</body>
</html>