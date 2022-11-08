<?php
require_once ('../connect/dbhelp.php');
session_start();
$conn = mysqli_connect('localhost', 'root', 'ncpt@dungchung', 'phongncpt') or die ('ko kết nối đc')
?>

<?php
if(!isset($_SESSION['username'])){
	header('Location:../index.html');
}
$id = $_SESSION['id'];
$username = $_SESSION['username'];
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
        <h1 class="navbar-brand ps-3" style="color: #fff; padding-left: 25px" href="index.php">Phòng NCPT - Admintrators
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
                    Thông tin nhân viên
                    <!-- <small class="text-muted">Version 2.1</small> -->
                </h1>
                <table class="table table-success table-striped-columns">
                    <thead>
                        <tr style="background-color: #97e6a9;">
                            <th>Stt</th>
                            <th>Họ và tên</th>
                            <th>Chức vụ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Username</th>
                            <th width="40px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$trang = 1;
						if (isset($_GET['trang'])) {
							$trang = $_GET['trang'];
						}

						$tim_kiem = '';
						if (isset($_GET['tim_kiem'])){
							$tim_kiem = $_GET['tim_kiem'];
						}

						$sql_so_dong = "select count(*) from tbl_member ";
						$mang_so_dong = mysqli_query($conn, $sql_so_dong);
						$ket_qua_so_dong = mysqli_fetch_array($mang_so_dong);
						$so_dong = $ket_qua_so_dong["count(*)"];
						$so_dong_tren_trang = 30;
						$so_trang = ceil($so_dong / $so_dong_tren_trang);
						$bo_qua = $so_dong_tren_trang * ($trang - 1);
						$sql = "select * from tbl_member where fullname like '%$tim_kiem%' order by id DESC limit $so_dong_tren_trang offset $bo_qua";

						$khach = executeResult($sql);

						$index = 1;
						foreach ($khach as $std) {
							echo '<tr>
                            <td>'.($index++).'</td>
                            <td>'.$std['fullname'].'</td>
                            <td>'.$std['chucVu'].'</td>
                            <td>'.$std['email'].'</td>
                            <td>'.$std['soDienThoai'].'</td>
                            <td>'.$std['diaChi'].'</td>
                            <td>'.$std['username'].'</td>
							<td><button class="btn btn-success" onclick=\'window.open("editUser.php?id='.$std['id'].'","_self")\'>Sửa</button></td>';
						}
					?>
                    </tbody>
                </table>
            </div><!-- Main Col END -->
        </div>
    </div>

</body>

</html>