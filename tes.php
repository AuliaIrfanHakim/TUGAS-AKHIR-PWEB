<!DOCTYPE html>
<html>
<head>
  <title>Kritik dan Saran</title>
  <link rel="stylesheet" type="text/css" href="stylekomen.css">
  <script>
    function validateForm() {
      var name = document.forms["feedbackForm"]["name"].value;
      var email = document.forms["feedbackForm"]["email"].value;
      var feedback = document.forms["feedbackForm"]["feedback"].value;
      
      if (name == "" || email == "" || feedback == "") {
        alert("Nama, email, dan saran harus diisi.");
        return false;
      }
    }

    function showNotification(name, email, feedback) {
      var notification = "Terima kasih, " + name + "!\n\nKomentar Anda telah berhasil diinputkan:\n\nNama: " + name + "\nEmail: " + email + "\nKomentar: " + feedback + "\n\nKomentar anda sangat berarti bagi kami!";
      alert(notification);
    }
  </script>
</head>
<body>
  <div class="container">
    <?php
    // Pengecekan apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $feedback = $_POST["feedback"];
      
      // Validasi input
      if (empty($name) || empty($email) || empty($feedback)) {
        echo "<script>alert('Nama, email, dan saran harus diisi.');</script>";
      } else {
        echo "<script>showNotification('" . $name . "', '" . $email . "', '" . $feedback . "');</script>";
      }
    }
    ?>
    
    <h2>Form Kritik dan Saran</h2>
    <form name="feedbackForm" method="post" onsubmit="return validateForm()">
      <label for="name">Nama:</label>
      <input type="text" name="name"><br>
      <label for="email">Email:</label>
      <input type="email" name="email"><br>
      <label for="feedback">Saran:</label>
      <textarea name="feedback"></textarea><br>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
