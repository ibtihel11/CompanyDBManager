<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <?php
                echo date("d/m/Y h:i A");
            ?>
        </div>
        <div><span>Technoled lumière</span> | <a href="login.php" style="color: #1abc9c;">Déconnexion</a></div>
    </header>
    <nav>
        <a href="views/costumers.php">
            <div>
                Clients
            </div>
        </a>
        <a href="views/items.php">
            <div>
                Articles
            </div>
        </a>
        <a href="views/item_kits.php">
            <div>
                Kits d'articles
            </div>
        </a>
        <a href="views/suppliers.php">
            <div>
                Fournisseurs
            </div>
        </a>
        <a href="views/receivings.php">
            <div>
                Réceptions
            </div>
        </a>
        <a href="views/sales.php">
            <div>
                Ventes
            </div>
        </a>
    </nav>
    <main>
        <h2>Bienvenue, cliquez sur un module ci-dessous pour commencer.</h2>
        <div class="module-buttons">
            <a href="views/costumers.php">
                <div class="module-btn">
                    <i class="fas fa-users fa-2x"></i><br>Clients
                </div>
            </a>
            <a href="views/items.php">
                <div class="module-btn">
                    <i class="fas fa-box fa-2x"></i><br>Articles
                </div>
            </a>
            <a href="views/item_kits.php">
                <div class="module-btn">
                    <i class="fas fa-toolbox fa-2x"></i><br>Kits d'articles
                </div>
            </a>
            <a href="views/suppliers.php">
                <div class="module-btn">
                    <i class="fas fa-industry fa-2x"></i><br>Fournisseurs
                </div>
            </a>
            <a href="views/receivings.php">
                <div class="module-btn">
                    <i class="fas fa-arrow-down fa-2x"></i><br>Réceptions
                </div>
            </a>
            <a href="views/sales.php">
                <div class="module-btn">
                    <i class="fas fa-shopping-cart fa-2x"></i><br>Ventes
                </div>
            </a>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Technoled | <a href="http://82.25.101.237" target="_blank">Technoled.org</a></p>
    </footer>
</body>
</html>
