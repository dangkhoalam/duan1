<?php
	include "ketnoi/connectdb.php";
   
    include "ketnoi/binhluan.php";
   	
   
	session_start();

	if (isset($_SESSION['s_user'])&&($_SESSION['s_user']>0)) {

	 	if (isset($_SESSION['username'])&&($_SESSION['username']!="")){
	  	$user=$_SESSION['username'];
	}else{
		$user="";
	}

	if (isset($_POST['goibinhluan'])&&($_POST['goibinhluan'])) {
		$name=$_POST['name'];	
		$noidung=$_POST['noidung'];
		$idsp=$_POST['idsp'];
		
		

		thembl($name,$idsp,$noidung);
		header('location: guithanhcong.php');

	}
	 $dsbl=showbl();

 ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<body>
	<h2>Bình luận</h2>
	<hr>
		<form action="binhluan.php" method="post">
			<div style="padding-bottom: 30px;">Tên  
				<input type="text" name="name"  value="<?=$user?>">
			</div>
			
			<div>
				<input type="hidden" name="idsp" value="<?=$_GET['idsp']?>">
			</div>
			<div>Nhập Bình Luận</div>
			<div style="padding-bottom: 20px;padding-left: 25px; padding-top: 20px;">
				<textarea name="noidung" id="" cols="30" rows="10" > </textarea>
			</div>
			<input type="submit" value="Gửi Bình Luận" name="goibinhluan">
		</form>
	<hr>
	<?php
		foreach ($dsbl as $bl){
			echo $bl['name'].' - '.$bl['noidung'].  "<br>";
		}
	?>


</body>
<!-- 
<?php }else{

		echo"<a href='index.php?pg=dangnhap' target='_parent'> Bạn vui lòng đăng nhập</a>";
}?>