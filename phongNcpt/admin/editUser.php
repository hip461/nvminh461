<?php
session_start();
require_once ('../connect/dbhelp.php');
if(!isset($_SESSION['username'])){
	header('Location:../index.html');
}
$s_fullname = $s_chucVu = $s_email = $s_soDienThoai = $s_diaChi = $s_level = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['fullname'])) {
		$s_fullname= $_POST['fullname'];
	}

	if (isset($_POST['chucVu'])) {
		$s_chucVu = $_POST['chucVu'];
	}

	if (isset($_POST['email'])) {
		$s_email = $_POST['email'];
	}
	if (isset($_POST['soDienThoai'])) {
		$s_soDienThoai= $_POST['soDienThoai'];
	}

    if (isset($_POST['diaChi'])) {
		$s_diaChi= $_POST['diaChi'];
	}

	if (isset($_POST['level'])) {
		$s_level = $_POST['level'];
	}

    if (isset($_POST['username'])) {
		$s_username = $_POST['username'];
	}

	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}
	$s_fullname = str_replace('\'', '\\\'', $s_fullname);
	$s_chucVu = str_replace('\'', '\\\'', $s_chucVu);
	$s_email = str_replace('\'', '\\\'', $s_email);
	$s_soDienThoai = str_replace('\'', '\\\'', $s_soDienThoai);
	$s_diaChi = str_replace('\'', '\\\'', $s_diaChi);
	$s_level  = str_replace('\'', '\\\'', $s_level);
	$s_id  = str_replace('\'', '\\\'', $s_id);
	

	if ($s_id != '') {
		//update
		$sql = "update tbl_member set fullname = '$s_fullname', chucVu = '$s_chucVu', email = '$s_email', soDienThoai = '$s_soDienThoai', diaChi = '$s_diaChi', level = '$s_level' where id = " .$s_id;
		$sql1 = "update tbl_nhiemvu set fullname = '$s_fullname' where username = '$s_username'";

	} else {
		//insert
		$sql = "insert into tbl_member(fullname, chucVu, email, soDienThoai, diaChi, level) value ('$s_fullname', '$s_chucVu', '$s_email', '$s_soDienThoai', '$s_diaChi', '$s_level')";
	}

	// echo $sql;

	execute($sql);
	execute($sql1);

	header('Location: viewUser.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from tbl_member where id = '.$id;
	$new = executeResult($sql);
	if ($new != null && count($new) > 0) {
		$std        = $new[0];
		$s_fullname = $std['fullname'];
		$s_chucVu      = $std['chucVu'];
		$s_email  = $std['email'];
		$s_soDienThoai = $std['soDienThoai'];
		$s_diaChi = $std['diaChi'];
		$s_level  = $std['level'];
        $s_username = $std['username'];
	} else {
		$id = '';
	}
}
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
        <h1 class="navbar-brand ps-3" style="color: #fff; padding-left: 25px" href="index.php">Ph??ng NCPT - Admintrators
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
                    S???a th??ng tin nh??n vi??n:
                </h1>
                <form method="post">
                    <div class="form-group">
                        <label for="usr">H??? v?? t??n:</label>
                        <input type="text" name="id" value="<?=$id?>" style="display: none">
                        <input required="true" type="text" class="form-control" id="usr" name="fullname"
                            value="<?=$s_fullname?>">
                    </div>
                    <div class="form-group">
                        <label for="usr">Ch???c v???:</label>
                        <input type="text" class="form-control" id="usr" name="chucVu" value="<?=$s_chucVu?>">
                    </div>
                    <div class="form-group">
                        <label for="usr">Email:</label>
                        <input type="text" class="form-control" id="usr" name="email" value="<?=$s_email?>">
                    </div>
                    <div class="form-group">
                        <label for="usr">S??? ??i???n tho???i:</label>
                        <input type="phone" class="form-control" id="usr" name="diaChi" value="<?=$s_diaChi?>">
                    </div>
                    <div class="form-group">
                        <label for="usr">?????a ch???:</label>
                        <input type="text" class="form-control" id="usr" name="soDienThoai" value="<?=$s_soDienThoai?>">
                    </div>
                    <div class="form-group">
                        <label for="usr">Quy???n:</label>
                        <input type="text" class="form-control" id="usr" name="level" value="<?=$s_level?>">
                    </div>
                    <div class="form-group">
                        <label for="usr">T??n ????ng nh???p:</label>
                        <input type="text" class="form-control" id="usr" name="username" value="<?=$s_username?>">
                    </div>
                    <div style="display: flex; justify-content: space-between">
                        <button class="btn btn-success">Save</button>
                    </div>
                </form>
            </div><!-- Main Col END -->
        </div>
    </div>

</body>

</html>