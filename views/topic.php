<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujet - <?= $topic->name() ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding-bottom: 80px;
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

        .topic-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .messages {
            margin-bottom: 20px;
        }

        .message {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .message-author {
            font-weight: bold;
        }

        .message-time {
            font-size: 0.9em;
            color: #666;
        }

        .message-content {
            margin-top: 10px;
        }

        .reply-form {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .reply-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .reply-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reply-form button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            height: 80px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>

    <header>
        <h1>Sujet: <?= $topic->name() ?></h1>
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
        <div class="topic-header">
            <h2><?= $topic->name() ?></h2>
        </div>
        <div class="messages">
            <?php foreach ($topic->posts() as $post) : ?>
                <div class="message">
                    <div class="message-author"><?= $post->author() ?></div>
                    <div class="message-time">Posté le <?= $post->last_update() ?></div>
                    <div class="message-content">
                        <p><?= $post->content() ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($_SESSION['auth'])) : ?>
            <div class="reply-form">
                <h3>Répondre au sujet</h3>
                <form action="?action=create-message" method="post">
                    <input type="hidden" name="topic_id" value="<?= $topic->id() ?>" />
                    <textarea name="message" rows="5" placeholder="Votre message"></textarea>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>Nombre de membres : <?= $GLOBALS['nb_users'] ?> | Nombre de sujets : <?= $GLOBALS['nb_topics'] ?> | Nombre de messages : <?= $GLOBALS['nb_messages'] ?></p>
    </footer>

</body>

</html>