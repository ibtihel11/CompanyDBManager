<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form id="loginForm">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <div id="error-message" class="alert alert-danger d-none fs-7 py-1 px-2 w-auto"></div>
      <button class="login-btn" type="submit">Login</button>
    </form>
    <div class="footer">
      <p>&copy; <?php echo date("Y"); ?> Technoled | <a href="http://82.25.101.237" target="_blank">Technoled.org</a></p>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#loginForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: "processLogin.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(response) {
            if (response === "success") {
              window.location.href = "index.php";
            } else {
              $("#error-message").removeClass("d-none").text(response);
            }
          },
          error: function() {
            $("#error-message").removeClass("d-none").text("Erreur serveur.");
          }
        });
      });
    });
  </script>
</body>
</html>