<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil du Forum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .categories {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }

        .category {
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            flex: 1 1 calc(33.333% - 40px);
            box-sizing: border-box;
            text-align: center;
            text-decoration: none;
            color: black;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            height: 80px;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        @media (max-width: 768px) {
            .category {
                flex: 1 1 calc(50% - 40px);
            }
        }

        @media (max-width: 480px) {
            .category {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Bienvenue sur le Forum</h1>
    </header>

    <nav>
        <div>
            <a href="#home">Accueil</a>
        </div>
        <?php if ($logged_in) : ?>
            <div>
                <a href="">Profil</a>
            </div>
        <?php else : ?>
            <div>
                <a href="?action=login">Se Connecter</a>
                <a href="?action=login">S'inscrire</a>
            </div>
        <?php endif; ?>
    </nav>

    <div class="container">
        <h2>Catégories</h2>
        <div class="categories">
            <?php foreach ($categories as $category) : ?>
                <a href="?action=category&name=<?= urlencode($category['name'])  ?>" class="category">
                    <h3><?= $category['name']  ?></h3>
                    <p><?= $category['description'] ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>Nombre de membres : <?= $nb_users ?> | Nombre de sujets : <?= $nb_topics ?> | Nombre de messages : <?= $nb_messages ?></p>
    </footer>

</body>

</html>