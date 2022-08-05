<?php
session_start();
if ($_SESSION['login'] != 'login') header('Location: login.php');
include 'koneksi.php';     // include = menambahkan/mengikutkan file, setting koneksi ke database
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

    <title>Aplikasi Kepegawaian</title>

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
                    <li><a href="pegawai.php">Pegawai</a></li>
                    <li><a href="tunjangan.php">Tunjangan</a></li>
                    <li class="active"><a href="#">Jabatan</a></li>
                    <li><a href="log_Pegawai.php">Log Pegawai</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard <?php echo ucfirst($_SESSION['level']); ?></h1>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <?php
                            $result = $mysqli->query("SELECT *  FROM `jabatan` WHERE `id_jabatan` = " . $_GET['id'] . ";");
                            if ($result->num_rows > 0) {
                                // echo "User ada";
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <form class="form-horizontal" action="proses_update_jabatan.php?id=<?php echo $_GET['id']; ?>" method="POST">
                                        <div class="form-group">
                                            <label for="id_jabatan" class="col-sm-2 control-label">kode jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Masukkan Kode untuk Jabatan baru" value="<?php echo $row['id_jabatan']; ?>" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_jabatan" class="col-sm-2 control-label">Nama Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="Masukkan Nama untuk Jabatan baru" value="<?php echo $row['nama_jabatan']; ?>" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi" class="col-sm-2 control-label">Gaji Pokok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Masukkan Gaji Pokok untuk Jabatan baru" value="<?php echo $row['gaji_pokok']; ?>" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi" class="col-sm-2 control-label">Tunjangan Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tunjangan_jabatan" id="tunjangan_jabatan" placeholder="Masukkan Tunjangan untuk Jabatan baru" value="<?php echo $row['tunjangan_jabatan']; ?>" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <a type="cancel" class="btn btn-warning" href="jabatan.php">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Update Data Jabatan</button>
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