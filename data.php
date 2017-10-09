<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>display_1202150075</title>
      <link rel="stylesheet" href="css/data.css">
</head>

<body>
  <div class="login-page">
  <div class="form">

      <h3 class="h3">DAFTAR NILAI PEMROGRAMAN WEB</h3>
      <h5 class="h5">DIBUAT OLEH : 1202150075 AMRI HANIF SI-39-03</h5>
    <table border='1' style='width:100%'>
      <thead>
        <tr>
        <th id='css-table' rowspan='2'><center>Nim</center></th>
      <th id='css-table' rowspan='2'><center>Nama</center></th>
      <th id='css-table' colspan='4'><center>Nilai</center></th>

          <th id='css-table'rowspan='2'><center>Grade</center></th>
          <th id='css-table'rowspan='2'><center>Keterangan</center></th>
      </tr>
      <tr>
        <th id='css-table' ><center>Tugas</center></th>
          <th id='css-table'><center>Uts</center></th>
          <th id='css-table'><center>Uas</center></th>
          <th id='css-table'><center>Akhir</center></th>

          </tr>
      </thead>
      <?php


  $conn = mysqli_connect('localhost', 'amrihans_amri', 'bonek1927', 'amrihans_mahasiswa');
  if (!$conn) {
    die ("Gagal terhubung MySQL: " . mysqli_connect_error());
  }

  $sql = "SELECT NIM,NAMA,TUGAS,UTS,UAS FROM kuis1_1202150075";

  $query = mysqli_query($conn, $sql);

  if (!$query) {
    die ("SQL Error: " . mysqli_error($conn));
  }
  $counter = 0;
  $nilaiAkhir = array();
  while ($row = mysqli_fetch_assoc($query))
  {
    //$nilaiAkhir = (0.3 * $row['TUGAS']) + (0.3 * $row['UTS']) + (0.4 * $row['UAS']);
    $nilaiAkhir[$counter] = (0.3 * $row['TUGAS']) + (0.3 * $row['UTS']) + (0.4 * $row['UAS']);
    if ($nilaiAkhir[$counter] >= 80) {
    $Grade = 'A';
    }elseif ($nilaiAkhir[$counter] >=65 && $nilaiAkhir[$counter]<80) {
    $Grade = 'B';
    }elseif ($nilaiAkhir[$counter] >=50 && $nilaiAkhir[$counter]<65) {
     $Grade = 'C';
    }elseif ($nilaiAkhir[$counter] >=40 && $nilaiAkhir[$counter]<50) {
      $Grade = 'D';
    } else {
      $Grade = 'E';
    }


    if ($Grade == 'A' ||$Grade == 'B' ||$Grade == 'C') {
    $keterangan = "LULUS";
    } elseif ($Grade == 'D' ||$Grade == 'E') {
    $keterangan = "TIDAK LULUS";
  }
?>
    <tr>
      <td><?php echo $row['NIM']; ?></td>
      <td><?php echo $row['NAMA']; ?></td>
      <td><?php echo $row['TUGAS']; ?></td>
      <td><?php echo $row['UTS']; ?></td>
      <td><?php echo $row['UAS']; ?></td>
      <td><?php echo $nilaiAkhir[$counter++] ?></td>
      <td><?php echo $Grade ?></td>
      <td><?php echo $keterangan ?></td>
    </tr>

    <?php
  }
    $total = 0;
    foreach ($nilaiAkhir as $value) {
      $total += $value;
    }
    ?>

    </table>
    <table>
      <tr>
      <td><h4 class="h4">Rata - rata Nilai: </h4></td>
      <td><?php echo array_sum($nilaiAkhir)/$counter; ?></td>
    </tr>
    <tr>
      <td><h4 class="h4">Nilai Maksimum : </h4></td>
      <td><?php echo max($nilaiAkhir); ?></td>
    </tr>
    <tr>
      <td><h4 class="h4">Nilai Minimum :</h4></td>
      <td><?php echo min($nilaiAkhir); ?></td>
    </tr>
    </table>
</div>
</div>
</body>
</html>
