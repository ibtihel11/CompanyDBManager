<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        form {
            width: 600px;
            text-align: left;
            margin: 20px;
        }
        form button {
            float: right;
        }
    </style>
</head>
<body>
  <header>
        <div>
            <?php
                echo date("d/m/Y h:i A");
            ?>
        </div>
        <div><span>Technoled lumière</span> | <a href="../../login.php" style="color: #1abc9c;">Déconnexion</a></div>
    </header>
<nav>
        <a href="../../views/costumers.php">
            <div>
                Clients
            </div>
        </a>
        <a href="../../views/items.php">
            <div>
                Articles
            </div>
        </a>
        <a href="../../views/item_kits.php">
            <div>
                Kits d'articles
            </div>
        </a>
        <a href="../../views/suppliers.php">
            <div>
                Fournisseurs
            </div>
        </a>
        <a href="../../views/receivings.php">
            <div>
                Réceptions
            </div>
        </a>
        <a href="../../views/sales.php">
            <div>
                Ventes
            </div>
        </a>
    </nav>
    <main>
        <h1>Ajouter un client</h1>
        <form method="post">  
            <label class="form-label" for="nom"> Nom </label>
            <br>
            <input class="form-control" type="text" name="nom" id="nom" required>
            <br>
            <label class="form-label" for="email"> E-mail </label>
            <br>
            <input class="form-control" type="email" name="email" id="email">
            <br>
            <label class="form-label" for="telephone"> Telephone </label>
            <br>
            <input class="form-control" type="number" name="telephone" id="telephone" required>
            <br>
            <label class="form-label" for="adresse"> Adresse </label>
            <br>
            <input class="form-control" type="text" name="adresse" id="adresse">
            <br><br>
            <button class="btn btn-outline-success btn-sm"> Envoyer </button>
        </form>
        <?php
            require "../../connect.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nom = $_POST["nom"];
                $email = $_POST["email"];
                $telephone = $_POST["telephone"];
                $adresse = $_POST["adresse"];

                $req = "insert into clients (name, email, phone, address) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($req);
                $stmt->bindParam(1, $nom, PDO::PARAM_STR);
                $stmt->bindParam(2, $email, PDO::PARAM_STR);
                $stmt->bindParam(3, $telephone, PDO::PARAM_STR);
                $stmt->bindParam(4, $adresse, PDO::PARAM_STR);
                $stmt->execute();

                header("Location: ../../views/costumers.php");
                exit();
            }
        ?>
        <a href="../../index.php" class="back">Retourner à la page principale</a>
        <a href="../../views/costumers.php" class="back">Retourner à la liste des clients</a>
    </main>
</body>
</html>
