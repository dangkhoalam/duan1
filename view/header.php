<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
        $html_account='<a href="index.php?pg=myaccount">'.$username.'</a>
        <a href="index.php?pg=logout">Thoát</a>';

    }else{
        $html_account='<a href="index.php?pg=dangky">ĐĂNG KÝ</a>
        <a href="index.php?pg=dangnhap">ĐĂNG NHẬP</a>';
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffe House</title>
    <link rel="stylesheet" href="layout/css/style1.css">
</head>

<body>
    <div class="containerfull padd20" style="margin-bottom: 30px;">
        <div class="container">
            <!-- <div class="logo col2"><a href="./admin/login.php"><img src="layout/images/Untitled-2-01.png"  alt=""></a></div> -->
            <div class="menu col8" style="display: flex;">
                <div class="col3"  >
                    <form action="index.php?pg=sanpham" method="post">
                        
                        <input type="submit" name="timkiem" value="Tìm kiếm">
                        <input  type="text" name="kyw" id="" placeholder="Nhập từ khóa tìm kiếm theo tên"   >
                    </form>
                </div>
                <div class="col9"  >
                    <a href="index.php" style="color:black;">TRANG CHỦ</a>
                    <!-- <a href="index.php?pg=gioithieu">GIỚI THIỆU</a> -->
                    <a href="index.php?pg=sanpham" style="color:black;">SẢN PHẨM</a>
                    <a href="index.php?pg=lienhe" style="color:black;">LIÊN HỆ</a>
                    <!-- <a href="index.php?pg=lienhe">LIÊN HỆ</a> -->
                    
                    <?=$html_account;?>
                </div>
                
                
            </div>
        </div>
    </div>