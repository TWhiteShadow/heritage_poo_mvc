<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médiathèque - Tableau de Bord</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.jade.min.css"
>    <link rel="stylesheet" href="/assets/css/style.css">

</head>


<header>
    <nav>
        <div class="logo">
            <i class="fas fa-book-reader"></i> Médiathèque
        </div>
        <div class="nav-links">
            <a href="/"><i class="fas fa-home"></i> Accueil</a>
            <?php if (!isset($_SESSION['user'])) { ?>
                <a href="login"><i class="fas fa-user"></i> Mon compte</a>
            <?php } else { ?>
                <a href="logout"><i class="fas fa-user"></i> <?= $_SESSION['user']['username'] ?></a>
            <?php } ?>
        </div>
    </nav>
</header>

<body>
    <main>

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            :root {
                /* --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --accent-color: #e74c3c;
        --background-color: #f5f6fa; */
                --text-color: #2c3e50;
            }

            body {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            /* Header */
            header {
                background-color: #202632;
                color: var(--pico-color);
                padding: 1rem;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
                max-width: 1200px;
                margin: 0 auto;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: bold;
            }

            .nav-links {
                display: flex;
                gap: 2rem;
            }

            .nav-links a {
                text-decoration: none;
                padding: 0.5rem 1rem;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .nav-links a:hover {
                background-color: var(--secondary-color);
            }
        </style>