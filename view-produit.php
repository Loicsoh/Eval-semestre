<?php
include 'database.php';

//  afficher un produit
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du produit</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
        }
        .container p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($produit): ?>
            <h1><?php echo htmlspecialchars($produit['libelle']); ?></h1>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($produit['description']); ?></p>
        <?php else: ?>
            <p>Produit non trouvé.</p>
        <?php endif; ?>
        <a href="index.php"><button>Retour à la liste</button></a>
    </div>
</body>
</html>