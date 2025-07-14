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
        <?php
            require "../../connect.php";
            $id=$_GET["id"];
            $client="select * from clients where id=$id";
            $pst=$pdo->query($client);
            $c=$pst->fetch(PDO::FETCH_ASSOC);
        ?>
        <h1>Modifier un client</h1>
        <form method="post" action="editClient.php?id=<?=$id?>">  
            <label class="form-label" for="nom"> Nom </label>
            <br>
            <input class="form-control" type="text" name="nom" id="nom" required value="<?=$c["name"]?>">
            <br>
            <label class="form-label" for="email"> E-mail </label>
            <br>
            <input class="form-control" type="email" name="email" id="email" value="<?=$c["email"]?>">
            <br>
            <label class="form-label" for="telephone"> Telephone </label>
            <br>
            <input class="form-control" type="number" name="telephone" id="telephone" value="<?=$c["phone"]?>" required>
            <br>
            <label class="form-label" for="adresse"> Adresse </label>
            <br>
            <input class="form-control" type="text" name="adresse" id="adresse" value="<?=$c["address"]?>">
            <br><br>
            <button class="btn btn-outline-success btn-sm"> Envoyer </button>
        </form>
            <a href="../../index.php" class="back">Retourner à la page principale</a>
            <a href="../../views/costumers.php" class="back">Retourner à la liste des clients</a>
    </main>
</body>
</html>
