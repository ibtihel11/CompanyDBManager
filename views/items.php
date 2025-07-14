<!DOCTYPE html>
<html>
<head>
    <title>Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <header>
        <div>
            <?php
                echo date("d/m/Y h:i A");
            ?>
        </div>
        <div><span>Technoled lumière</span> | <a href="../login.php" style="color: #1abc9c;">Déconnexion</a></div>
    </header>
    <nav>
        <a href="costumers.php">
            <div>
                Clients
            </div>
        </a>
        <a href="items.php">
            <div>
                Articles
            </div>
        </a>
        <a href="item_kits.php">
            <div>
                Kits d'articles
            </div>
        </a>
        <a href="suppliers.php">
            <div>
                Fournisseurs
            </div>
        </a>
        <a href="receivings.php">
            <div>
                Réceptions
            </div>
        </a>
        <a href="sales.php">
            <div>
                Ventes
            </div>
        </a>
    </nav>
    <main>
        <?php
            require "../connect.php";
            $req1 = "select * from products";
            $result=$pdo->query($req1);
            $res= $result->fetchAll(PDO::FETCH_ASSOC);
            if(empty($res)) echo "Probléme d'accès au base de données";
            else{
        ?>
        <h1>Liste des Articles</h1>
        <div class="list">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">NOM</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">UNITE</th>
                    <th scope="col">PRIX UNITE</th>
                    <th scope="col">QUANTITEE</th>
                    <th scope="col">DATE</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <?php
              foreach ($res as $r){
            ?>
                <tr>
                    <td><?=$r["name"]?></td>
                    <td><?=$r["description"]?></td>
                    <td><?=$r["unit"]?></td>
                    <td><?=$r["unit_price"]?></td>
                    <td><?=$r["stock_quantity"]?></td>
                    <td><?=$r["created_at"]?></td>
                    <td>
                        <a href="../actions/items/viewItem.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Details</a> <!--historique-->
                        <a href="../actions/items/modifyItem.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Modifier</a>
                        <a href="../actions/items/deleteItem.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php
                    }
            ?>
            </tbody>
            </table>
            <?php
                }
            ?>
        </div>
        <br>
        <a href="../actions/items/addItem.php" class="back">Ajouter un nouveau produit</a>
        <a href="../index.php" class="back">Retourner à la page principale</a>
    </main>
</body>
</html>
