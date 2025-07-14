<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
        <h1>Historique d'Achats</h1>
        <?php
            require "../../connect.php";
            if (isset($_GET["id"])) {
                $id = intval($_GET["id"]);
                $stmtClient = $pdo->prepare("select * from clients WHERE id = ?");
                $stmtClient->execute([$id]);
                $client = $stmtClient->fetch();
                if ($client) {
        ?>
        <div class='mb-4'>
            <strong>Nom:</strong> <?=$client["name"]?> <br>
            <strong>Email:</strong> <?=$client["email"]?> <br>
            <strong>Téléphone:</strong> <?=$client["phone"]?> <br>
            <strong>Adresse:</strong> <?=$client["address"]?> <br>
        </div>
        <?php
            $stmtSales = $pdo->prepare("select * FROM sales WHERE client_id = ? ORDER BY sale_date DESC");
            $stmtSales->execute([$id]);
            $sales = $stmtSales->fetchAll();
        ?>
            <div class='list'>
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th scope='col'>DATE</th>
                        <th scope='col'>ID ACHAT</th>
                        <th scope='col'>TOTAL</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (count($sales) > 0) {
                        foreach ($sales as $sale) {
                ?>
                    <tr>
                        <td><?=$sale["sale_date"]?></td>
                        <td><?=$sale["id"]?></td>
                        <td><?=$sale["total_amount"]?></td>
                        <td>
                            <a href="../sales/viewSales.php?id=<?=$sale["id"]?>" class="btn btn-outline-success btn-sm">Facture</a>
                        </td>
                    </tr>
                <?php
                            }
                        } else {
                            echo "Aucun achat trouvé pour ce client.";
                        }
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <br>
        <a href="../../views/costumers.php" class="back">Retourner à la liste des clients</a>
        <a href="../../index.php" class="back">Retourner à la page principale</a>
    </main>
</body>
</html>