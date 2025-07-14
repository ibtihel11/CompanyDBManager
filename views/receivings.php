<!DOCTYPE html>
<html>
<head>
    <title>Achats</title>
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
            $req1 = "select * from receipts";
            $result=$pdo->query($req1);
            $res= $result->fetchAll(PDO::FETCH_ASSOC);
            if(empty($res)) echo "Probléme d'accès au base de données";
            else{
        ?>
        <h1>Liste des Réceptions</h1>
        <div class="list">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">FOURNISSEUR</th>
                    <th scope="col">DATE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">PRODUITS</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <?php
              foreach ($res as $r){
            ?>
                <tr>
                    <td class="item">
                        <a href="../actions/suppliers/viewSupplier.php?id=<?=$r["supplier_id"]?>">
                            <?=$r["supplier_id"]?>
                        </a>
                    </td>
                    <td><?=$r["receipt_date"]?></td>
                    <td><?=$r["note"]?></td>
                    <td>
                        <ul class="list-group list-group-flush">
                        <?php
                            // requete pour obtenir la liste des produits (ids)
                            $req2 = "select * from receipt_items where receipt_id=?";
                            $pst=$pdo->prepare($req2);
                            $pst->bindParam(1,$r["id"],PDO::PARAM_INT);
                            $pst->execute();
                            $result2= $pst->fetchAll(PDO::FETCH_ASSOC);
                            // requete pour obtenir les noms des produits
                            $req4 = "select name from products where id=?";
                            foreach($result2 as $p){
                                $pst=$pdo->prepare($req4);
                                $pst->bindParam(1,$p["id"],PDO::PARAM_INT);
                                $pst->execute();
                                $nom= $pst->fetch(PDO::FETCH_ASSOC);
                        ?>
                            <li class="list-group-item item">
                                <a href="../actions/items/viewProduct.php?id=<?=$p["id"]?>">
                                    <?=$nom["name"]?>
                                </a>
                            </li>
                        <?php 
                            }
                        ?>
                        </ul>
                    </td>
                    <td>
                        <?php
                            $req3 = "select sum(unit_price*quantity) from receipt_items where receipt_id=?";
                            $pst=$pdo->prepare($req3);
                            $pst->bindParam(1,$r["id"],PDO::PARAM_INT);
                            $pst->execute();
                            $result3= $pst->fetch(PDO::FETCH_ASSOC);
                            foreach($result3 as $p){
                                echo $p;
                            }
                        ?>
                    </td>
                    <td>
                        <a href="../actions/receivings/modifyReception.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Modifier</a>
                        <a href="./actions/receivings/deleteReception.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Supprimer</a>
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
        <a href="../actions/receivings/addReception.php" class="back">Ajouter un nouveau achat</a>
        <a href="../index.php" class="back">Retourner à la page principale</a>
    </main>
</body>
</html>
