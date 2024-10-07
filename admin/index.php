<?php
    session_start();
    ob_start();
    if(isset($_SESSION['s_user'])&&(is_array($_SESSION['s_user']))&&(count($_SESSION['s_user'])>0)){
        $admin=$_SESSION['s_user'];
    }else{
        header('location: login.php');
    }
?>
<!-- <h1>Bạn đang đăng nhập vào trang Admin: <?=$admin["username"]?> </h1> -->
<?php
    include "../ketnoi/connectdb.php";
    include "../ketnoi/danhmuc.php"; 
    include "../ketnoi/sanpham.php"; 
    include "../ketnoi/giohang.php";
    include "../ketnoi/user.php";
    include "../ketnoi/donhang.php";
    include "../ketnoi/lienhe.php";
    include "view/header.php";
    

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'danhmuc':
                $kq=getall_dm();
                include "view/danhmuc.php";
                break;

            case 'sanpham':          
                $dsdm=getall_dm();
                $kq=getall_sp();
                include "view/sanpham.php";
                break;  
             case 'sanpham_add':   
                if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                $iddm=$_POST['iddm'];
                $name=$_POST['name'];
                $price=$_POST['price'];
                $view=$_POST['view'];
                $bestseller=$_POST['bestseller'];
                //up load hinh
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $img=$target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
                }
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                //if ($_FILES['hinh']['name']!="") $img=$_FILES['hinh']['name']; else $img="";
                insert_sanpham($iddm,$name,$price,$view,$img,$bestseller);

                }

                $dsdm=getall_dm();
                $kq=getall_sp();
                include "view/sanpham.php";
                break;    
            case 'adddm':
                if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                    $tendm=$_POST['tendm'];
                    themdm($tendm);
                }
                $kq=getall_dm();
                include "view/danhmuc.php";
                break;

             case 'updatespfrom':
                $dsdm=getall_dm();
                if (isset($_GET['id'])&&($_GET['id']>0)) {
                   $spct=getonesp($_GET['id']);
                }
                $kq=getall_sp();
                include "view/updatespfrom.php";
                break;

            case 'sampham_update':

                // $dsdm=getall_dm();
                // if (isset($_GET['id'])&&($_GET['id']>0)) {
                   //$spct=getonesp($_GET['id']);
                // }
                
                $dsdm=getall_dm();

                if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                    $iddm=$_POST['iddm'];
                    $name=$_POST['name'];
                    $price=$_POST['price'];
                    $view=$_POST['view'];
                    $bestseller=$_POST['bestseller'];
                    $id=$_POST['id'];

                    if ($_FILES['hinh']['name']!="") {
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        $img=$target_file;
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                          //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                          $uploadOk = 0;
                        }
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                        //if ($_FILES['hinh']['name']!="") $img=$_FILES['hinh']['name']; else $img="";
                        //insert_sanpham($iddm,$tensp,$gia,$img,$chitiet);
                    }else
                        $img="";
                    
                        updatesp($id,$name,$img,$price,$view,$bestseller,$iddm);
                    }
                $dsdm=getall_dm();
                $kq=getall_sp();
                include "view/sanpham.php";
                break;

            case 'deldm':
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    deldm($id);
                }
                $kq=getall_dm();
                break;

            case 'updatedmfrom':
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    $kqone=getonedm($id);
                    $kq=getall_dm();
                    include "view/updatedmfrom.php";
                }
                if (isset($_POST['id'])) {
                    $id=$_POST['id'];
                    $tendm=$_POST['tendm'];
                    updatedm($id,$tendm);
                    $kq=getall_dm();
                    include "view/danhmuc.php";
                }
                break;
            case 'delsp':
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    delsp($id);
                }
                $kq=getall_sp();
                break;
            case 'sampham':
                include "view/sanpham.php";
                break;
            // case 'taikhoan':
            //     include "view/taikhoan.php";
            //     break;
            case 'donhang':
                $kq=getdhall();
                include "view/donhang.php";
                break;
            case 'deldh':
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    delsp($id);
                }
                $kq=deldh($id);
                break;
            case 'taikhoan':
                $kq=getall_user();
                include "view/taikhoan.php";
                break;
            case 'deluser':
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    deluser($id);
                }
                $kq=deluser($id);
                break;

            case 'lienhe':
                $kq=getall_lh();
                include "view/lienhe.php";
                break;
            case 'dellh':
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    dellh($id);
                }
                $kq=getall_lh();
                break;

            case 'addlh':
                if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                    $gioithieu=$_POST['gioithieu'];
                    $sdt=$_POST['sdt'];
                    $email=$_POST['email'];
                    $diachi=$_POST['diachi'];
                    themlh($gioithieu, $sdt, $email, $diachi);

                }
                $kq=getall_lh();
                include "view/lienhe.php";
                break;

            case 'updatelhfrom':
                 if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    $kqone=getonelh($id);
                    $kq=getall_lh();
                    include "view/updatelhfrom.php";
                }
                if (isset($_POST['id'])) {
                    $id=$_POST['id'];
                    $gioithieu=$_POST['gioithieu'];
                    $sdt=$_POST['sdt'];
                    $email=$_POST['email'];
                    $diachi=$_POST['diachi'];
                    updatelh($id, $gioithieu, $sdt, $email, $diachi);
                    $kq=getall_lh();
                    include "view/lienhe.php";
                }
                break;

            case 'thoat':
                if (isset($_SESSION['role']))unset($_SESSION['role']);
                header ('location: ../index.php');//login.php
                include "view/footer.php";
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
    include "view/footer.php";
?>