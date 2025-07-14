<!DOCTYPE html>
<html>
<head>
    <title>Kits de produits</title>
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
            $req1 = "select * from product_kits";
            $result=$pdo->query($req1);
            $res= $result->fetchAll(PDO::FETCH_ASSOC);
            if(empty($res)) echo "Probléme d'accès au base de données";
            else{
        ?>
        <h1>Liste des Kits</h1>
        <div class="list">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">NOM</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">DATE</th>
                    <th scope="col">PRODUITS</th>
                    <th scope="col">PRIX</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <?php
              foreach ($res as $r){
            ?>
                <tr>
                    <td><?=$r["name"]?></td>
                    <td><?=$r["description"]?></td>
                    <td><?=$r["created_at"]?></td>
                    <td>
                        <ul class="list-group list-group-flush">
                        <?php
                            // requete pour obtenir la liste des produits du kit (ids)
                            $req2 = "select * from kit_items where kit_id=?";
                            $pst=$pdo->prepare($req2);
                            $pst->bindParam(1,$r["id"],PDO::PARAM_INT);
                            $pst->execute();
                            $result2= $pst->fetchAll(PDO::FETCH_ASSOC);
                            // requete pour obtenir les noms des produits du kit
                            $req4 = "select name from products where id=?";
                            foreach($result2 as $p){
                                $pst=$pdo->prepare($req4);
                                $pst->bindParam(1,$p["product_id"],PDO::PARAM_INT);
                                $pst->execute();
                                $nom= $pst->fetch(PDO::FETCH_ASSOC);
                        ?>
                            <li class="list-group-item item">
                                <a href="../actions/kits/viewKit.php?id=<?=$p["product_id"]?>">
                                    <?= $nom["name"] ?>
                                </a>&nbsp;(<?= $p["quantity"] ?>)
                            </li>
                        <?php 
                            }
                        ?>
                        </ul>
                    </td>
                    <td><?=$r["price"]?></td>
                    <td>
                        <a href="../actions/kits/viewKit.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Details</a>
                        <a href="../actions/kits/modifyKit.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Modifier</a>
                        <a href="../actions/kits/deleteKit.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Supprimer</a>
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
        <a href="../index.php" class="back">Ajouter un nouveau kit</a>
        <a href="../index.php" class="back">Retourner à la page principale</a>
    </main>
</body>
</html>
