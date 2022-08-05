<?php
session_start();
if ($_SESSION['login'] != 'login') header('Location: login.php');
include 'koneksi.php';   // include = menambahkan/mengikutkan file, setting koneksi ke database
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="fan.ico">

  <title> Aplikasi Kepegawaian</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">

  <!-- DATA TABLES -->
  <link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Kepegawaian Admin</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo "Hello, " . ucwords($_SESSION['username']); ?></a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <?php if ($_SESSION['level'] == 'admin') { ?>
            <li><a href="user.php">User <span class="sr-only">(current)</span></a></li>
          <?php } ?>
          <li class="active"><a href="#">Pegawai</a></li>
          <li><a href="tunjangan.php">Tunjangan</a></li>
          <li><a href="jabatan.php">Jabatan</a></li>
          <li><a href="log_Pegawai.php">Log Pegawai</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Dashboard <?php echo ucfirst($_SESSION['level']); ?></h1>
        <div class="row">
          <div class="col-md-6">
            <div>
              <?php
              $result = $mysqli->query("SELECT *  FROM `pegawai` WHERE `id_pegawai` = " . $_GET['id'] . ";");
              if ($result->num_rows > 0) {
                // echo "Pegawai ada";
                $no = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
                  <form class="form-horizontal" action="proses_update_pegawai.php?id=<?php echo $_GET['id']; ?>" method="POST">
                  <div class="form-group">
                      <label for="nip" class="col-sm-2 control-label">NIP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nip" id="nip" value="<?php echo $row['nip'] ?>" placeholder="Masukkan Nama untuk Pegawai baru" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama Pegawai</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?php echo $row['nama_pegawai'] ?>" placeholder="Masukkan Nama untuk Pegawai baru" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select name="jk" id="jk" class="form-control">
                          <option>laki-laki</option>
                          <option>perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="Alamat" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $row['alamat'] ?>" placeholder="Masukkan Alamat untuk Pegawai baru" required />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="id_tunjangan" class="col-sm-2 control-label">Kode Tunjangan</label>
                      <div class="col-sm-10">
                        <select name="id_tunjangan" id="disabledSelect" class="form-control">
                          <?php
                          $result = $mysqli->query("select * from tunjangan");
                          if ($result->num_rows > 0) {
                            // echo "divisi ada";
                            while ($div = $result->fetch_assoc()) {
                          ?>
                              <option value="<?php echo $div["id_tunjangan"]; ?>" <?php if ($div["id_tunjangan"] == $row["id_tunjangan"]) echo "selected"; ?>><?php echo ucfirst($div["id_tunjangan"]); ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="id_jabatan" class="col-sm-2 control-label">Kode Jabatan</label>
                      <div class="col-sm-10">
                        <select name="id_jabatan" id="disabledSelect" class="form-control">
                          <?php
                          $result = $mysqli->query("select * from jabatan");
                          if ($result->num_rows > 0) {
                            // echo "divisi ada";
                            while ($div = $result->fetch_assoc()) {
                          ?>
                              <option value="<?php echo $div["id_jabatan"]; ?>" <?php if ($div["id_jabatan"] == $row["id_jabatan"]) echo "selected"; ?>><?php echo ucfirst($div["id_jabatan"]); ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a type="cancel" class="btn btn-warning" href="pegawai.php">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Data Baru</button>
                      </div>
                    </div>
                  </form>
              <?php
                }
              }
              ?>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div><!-- row -->
      </div>
    </div>
  </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- DATA TABES SCRIPT -->
  <script src="js/jquery.dataTables.js" type="text/javascript"></script>
  <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
  <script src="js/dataTables.tableTools.min.js" type="text/javascript"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="js/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  <!-- page script -->
  <script type="text/javascript">
    $(function() {
      $("#example1").dataTable();
      $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
      });
    });
  </script>
</body>

</html>