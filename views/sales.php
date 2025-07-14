<!DOCTYPE html>
<html>
<head>
    <title>Ventes</title>
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
      <h1>Liste des Ventes</h1>
      <?php
        require "../connect.php";
        $req1 = "select * from sales ";
        $result=$pdo->query($req1);
        $res= $result->fetchAll(PDO::FETCH_ASSOC);
        if(empty($res)) echo "Probléme d'accès au base de données";
        else{
      ?>
      <div class="list">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">CLIENT</th>
              <th scope="col">DATE</th>
              <th scope="col">PRODUITS</th>
              <th scope="col">QUANTITES</th>
              <th scope="col">TOTAL</th>
              <th scope="col">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
          <?php
              foreach ($res as $r){
          ?>
                <tr>
                    <td class="item">
                        <a href="../actions/clients/viewClient.php?id=<?=$r["client_id"]?>">
                            <?=$r["client_id"]?>
                        </a>
                    </td>
                    <td><?=$r["sale_date"]?></td>
                    <td>
                        <ul class="list-group list-group-flush">
                        <?php
                            // requete pour obtenir la liste des produits du kit (ids)
                            $req2 = "select * from sale_items where sale_id=?";
                            $pst=$pdo->prepare($req2);
                            $pst->bindParam(1,$r["id"],PDO::PARAM_INT);
                            $pst->execute();
                            $result2= $pst->fetchAll(PDO::FETCH_ASSOC);
                            // requete pour obtenir les noms des produits du kit
                            $req3 = "select * from products where id=?";
                            foreach($result2 as $p){
                                $pst=$pdo->prepare($req3);
                                $pst->bindParam(1,$p["product_id"],PDO::PARAM_INT);
                                $pst->execute();
                                $nom= $pst->fetch(PDO::FETCH_ASSOC);
                        ?>
                                <li class="list-group-item item">
                                    <a href="../actions/items/viewItem.php?id=<?=$p["product_id"]?>">
                                        <?= $nom["name"] ?>
                                    </a>
                                </li>
                        <?php 
                            }
                        ?>
                        </ul>
                    </td>
                    <td>
                        <ul style="list-style-type: none;">
                        <?php
                            $req4 = "select * from sale_items where id=?";
                            foreach($result2 as $p){
                                $pst=$pdo->prepare($req4);
                                $pst->bindParam(1,$p["id"],PDO::PARAM_INT);
                                $pst->execute();
                                $qte= $pst->fetch(PDO::FETCH_ASSOC);
                        ?>
                            <li><?=$qte["quantity"]?></li>
                        <?php 
                            }
                        ?>
                        </ul>
                    </td>
                    <td><?=$r["total_amount"]?></td>
                    <td>
                        <a href="../actions/sales/viewSales.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Facture</a>
                        <a href="../actions/sales/modifySales.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Modifier</a>
                        <a href="../actions/sales/deleteSales.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Supprimer</a>
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
        <a href="../actions/sales/addSales.php" class="back">Ajouter une nouvelle vente</a>
        <a href="../index.php" class="back">Retourner à la page principale</a>
    </main>
</body>
</html>