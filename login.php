<?php
  $servername = "localhost";
  $database = "amrihans_mahasiswa";
  $username = "amrihans_amri";
  $password = "bonek1927";
  $conn = mysqli_connect($servername, $username, $password, $database);

  $user = $_POST["username"];
  $pass = $_POST["password"];
  $result = mysqli_query($conn,"SELECT * FROM login_1202150075 WHERE username='$user' AND password='$pass'");
  //$hasil = mysqli_fetch_array($result);
  if (mysqli_num_rows($result)) {
    header('Location: '.'data.php');
  } else {
    echo '<script language="javascript">
    alert("username dan password salah !"); window.location.href="index.html";
	</script>';
  }
?>
