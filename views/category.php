<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujets de la Catégorie</title>
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

        .category-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .topics {
            width: 100%;
            border-collapse: collapse;
        }

        .topics th,
        .topics td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .topics th {
            background-color: #f4f4f4;
        }

        .topics tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .topics tr:hover {
            background-color: #f1f1f1;
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
    </style>
</head>

<body>

    <header>
        <h1>Catégorie: <?= $category ?></h1>
    </header>

    <nav>
        <div><a href="index.php">Accueil</a></div>
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
        <div class="category-header">
            <h2>Sujets</h2>
        </div>
        <table class="topics">
            <thead>
                <tr>
                    <th>Sujet</th>
                    <th>Dernier message</th>
                    <th>Dernière activité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topics as $topic) : ?>
                    <tr>
                        <td><a href="?action=topic&id=<?= $topic['id'] ?>"><?= $topic['name'] ?></a></td>
                        <td><?= $topic['last_post_content'] ?></td>
                        <td><?= $topic['last_update'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- Ajoutez d'autres sujets ici -->
            </tbody>
        </table>
    </div>

    <footer>
        <p>Nombre de membres : 1234 | Nombre de sujets : 5678 | Nombre de messages : 91011</p>
    </footer>

</body>

</html>