<?php
include 'database.php';

//  modifier un produit
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['update'])) {
        if(!empty($_POST['libelle']) && !empty($_POST['description'])) {
            $libelle = htmlspecialchars($_POST['libelle']);
            $description = htmlspecialchars($_POST['description']);

            $sql = "UPDATE produits SET libelle = :libelle, description = :description WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':libelle' => $libelle,
                ':description' => $description,
                ':id' => $id
            ]);
            if($stmt->rowCount() > 0) {
                echo "Produit mis à jour avec succès!";
                header('Location: index.php');
                exit();
            } else {
                echo "Erreur lors de la mise à jour du produit.";
            } 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update_produit</title>
</head>
<body>
    <h1>Modifier le produit</h1>
    <form method="POST">
        <label for="libelle">Libelle:</label>
        <input type="text" name="libelle" id="libelle" value="<?php echo htmlspecialchars($produit['libelle']); ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo htmlspecialchars($produit['description']); ?></textarea>
        <br>
        <button type="submit" name="update">Mettre à jour</button>
    </form>
</body>
</html>