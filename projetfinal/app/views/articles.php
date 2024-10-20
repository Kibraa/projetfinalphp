<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" type="text/css" href="/css/style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
    <h1>Liste des articles</h1>

    <?php foreach ($articles as $article): ?>
        <h2><?php echo $article['title']; ?></h2>
        <p><?php echo $article['content']; ?></p>
    <?php endforeach; ?>
</body>
</html>

<div class="container">
    <header>
        <h1>Bienvenue dans la boutique</h1>
    </header>
    
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <button>Ajouter au panier</button>
            </div>
        <?php endforeach; ?>
    </div>
    
    <footer>
        <p>© 2024 Mon E-commerce</p>
    </footer>
</div>
