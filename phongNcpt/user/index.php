<?php
require_once ('../connect/dbhelp.php');
session_start();
$conn = mysqli_connect('localhost', 'root', 'ncpt@dungchung', 'phongncpt') or die ('ko kết nối đc')
?>

<?php
if(!isset($_SESSION['username'])){
	header('Location:../index.html');
}
if(isset($_SESSION['level'])&&($_SESSION['level']==0)){
	header('Location:../admin/index.php');
}
if(isset($_SESSION['level'])&&($_SESSION['level']==5)){
    echo '<script type = "text/javascript">';
    echo 'alert("User đang bị tạm khóa, liên lạc hotline trung tâm để được hỗ trợ");';
    echo 'window.location.href = "logout.php "';
    echo '</script>';
}

$username = $_SESSION['username'];
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <Script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <Script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>
</head>

<body>
    <nav class="sb-topnav " style="background-color: #00437b;">
        <h1 class="navbar-brand ps-3" style="color: #fff; padding-left: 25px" href="index.php">Phòng NCPT - Nhân Viên
        </h1>
    </nav>
    <div class="container-fluid p-0">
        <!-- Bootstrap row -->
        <div class="row" id="body-row">
            <!-- MENU SIDEBAR-->
            <?php include_once('includes/sidebar.php');?>

            <!-- MAIN -->
            <div class="col">

                <h1>
                    Phòng NCPT - VNCERT/CC thông báo:
                </h1>
                <?php
                $query1=mysqli_query($conn,"select id from tbl_nhiemvu where username = '$username' AND date(ngayGiao)=CURDATE()-1;");
                $count_nhiemVuMoi=mysqli_num_rows($query1);
                $query=mysqli_query($conn,"select id from tbl_nhiemvu where username = '$username';");
                $count_nhiemVu=mysqli_num_rows($query);
                $query2=mysqli_query($conn,"select id from tbl_nhiemvu where username = '$username' AND date(hoanThanh)<=CURDATE();");
                $count_nhiemVuQuaHan=mysqli_num_rows($query2);
                ?>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h2><?php echo $count_nhiemVuMoi?></h2>Nhiệm vụ được phân công hôm qua
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="nhiemvu.php">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h2><?php echo $count_nhiemVu;?></h2>Danh sách nhiệm vụ được phân công
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="nhiemvu.php">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <h2><?php echo $count_nhiemVuQuaHan?></h2>Nhiệm vụ quá hạn
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="nhiemvu.php">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Main Col END -->
        </div>
    </div>

</body>

</html>