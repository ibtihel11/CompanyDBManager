<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
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
      <h1>Liste des Clients</h1>
      <?php
        require "../connect.php";
        $req1 = "select * from clients ";
        $result=$pdo->query($req1);
        $res= $result->fetchAll(PDO::FETCH_ASSOC);
        if(empty($res)) echo "Probléme d'accès au base de données";
        else{
      ?>
      <div class="list">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">NOM</th>
              <th scope="col">EMAIL</th>
              <th scope="col">TELEPHONE</th>
              <th scope="col">ADRESSE</th>
              <th scope="col">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
          <?php
              foreach ($res as $r){
          ?>
                <tr>
                    <td><?=$r["name"]?></td>
                    <td><?=$r["email"]?></td>
                    <td><?=$r["phone"]?></td>
                    <td><?=$r["address"]?></td>
                    <td>
                        <a href="../actions/clients/viewClient.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Historique</a>
                        <a href="../actions/clients/modifyClient.php?id=<?=$r["id"]?>" class="btn btn-outline-success btn-sm">Modifier</a>
                        <a href="#" onclick="confirmDelete(<?= $r['id']?>)" class="btn btn-outline-success btn-sm">Supprimer</a>
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
        <a href="../actions/clients/addClient.php" class="back">Ajouter un nouveau client</a>
        <a href="../index.php" class="back">Retourner à la page principale</a>
    </main>
    <script>
        function confirmDelete(clientId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ?")) {
                alert("Le client est supprimé avec succès");
                window.location.href = "../actions/clients/deleteClient.php?id=" + clientId;
            } else {
                alert("Action annulée.");
            }
        }
    </script>
</body>
</html>