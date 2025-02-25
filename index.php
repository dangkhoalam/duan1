<?php
    session_start();
    ob_start();
    if(!isset($_SESSION["giohang"])){
        $_SESSION["giohang"]=[];
    }
    // nhúng kết nối csdl
    include "ketnoi/connectdb.php";
    include "ketnoi/pdo.php";
    include "ketnoi/binhluan.php";
    include "ketnoi/user.php";
    include "ketnoi/danhmuc.php";
    include "ketnoi/sanpham.php";
    include "ketnoi/giohang.php";
    include "ketnoi/donhang.php";
    include "ketnoi/lienhe.php";
    include "view/header.php";

    //data dành cho trang chủ
    $dssp_new=get_dssp_new(4);
    $dssp_best=get_dssp_best(2);
    $dssp_view=get_dssp_view(4);
    $lienhe=getall_lh();

    if(!isset($_GET['pg'])){

        include "view/home.php";
    }else{
        switch ($_GET['pg']) {
            case 'sanpham':
                $dsdm=danhmuc_all();

                $kyw="";
                $titlepage="";

                if(!isset($_GET['iddm'])){
                    $iddm=0;
                }else{
                    $iddm=$_GET['iddm'];
                    $titlepage=get_name_dm($iddm);
                }

                // kiểm tra có phải form search không?
                if(isset($_POST["timkiem"])&&($_POST["timkiem"])){
                    $kyw=$_POST["kyw"];
                    $titlepage="Kết quả tìm kiếm với từ khóa: <span>".$kyw."</span>";
                }

                $dssp=get_dssp($kyw,$iddm,12);

                include "view/sanpham.php";
                break;
            case 'sanphamchitiet':
                $dsdm=danhmuc_all();
                if(isset($_GET["id"])&&($_GET["id"]>0)){
                    $id=$_GET["id"];
                    $iddm=get_iddm($id);
                    $dssp_lienquan=get_dssp_lienquan($iddm,$id,4);
                    $spchitiet=get_sanphamchitiet($id);
                    include "view/sanphamchitiet.php";
                }else{
                    include "view/home.php";
                }


                
                break;
            case 'addcart':
                if(isset($_POST["addcart"])){
                    $name=$_POST["name"];
                    $img=$_POST["img"];
                    $price=$_POST["price"];
                    $soluong=$_POST["soluong"];
                    $sp=array("name"=>$name,"img"=>$img,"price"=>$price,"soluong"=>$soluong);
                    array_push($_SESSION["giohang"],$sp);
                    // echo var_dump($_SESSION["giohang"]);
                    header('location: index.php?pg=viewcart');
                }

                // include "view/gioithieu.php";
                break;
            case 'viewcart':
                if(isset($_GET['del'])&&($_GET['del']==1)){
                    unset($_SESSION["giohang"]);
                    // $_SESSION["giohang"]=[];
                    header('location: index.php');
                }else{
                    if(isset($_SESSION["giohang"])){
                        $tongdonhang=get_tongdonhang();
                    }
                        $giatrivoucher=0;
                    if(isset($_GET['voucher'])&&($_GET['voucher']==1)){
                        $tongdonhang=$_POST['tongdonhang'];
                        $mavoucher=$_POST['mavoucher'];
                        // so sanh với db để lấy giá trị về
                        $giatrivoucher=10;
                        
                    }
                    $thanhtoan=$tongdonhang - $giatrivoucher;
                    include "view/viewcart.php";
                }
                 
                break;
            case 'login':
                
                // input
                // 
                // 
                if(isset($_POST["dangnhap"])&&($_POST["dangnhap"])){
                $username=$_POST["username"];
                $password=$_POST["password"];
                $kq=checkuser($username,$password);
                if(isset($kq)&&(is_array($kq))&&(count($kq)>0)){
                    extract($kq);
                    if($role==1){
                        $_SESSION['s_user']=$kq;
                        header('location: admin/index.php');
                    }
                                        
                    else{
                        $_SESSION['s_user']=$kq;
                        header('location: index.php');
                    }
                }else{
                    $tb="Tài khoản không tồn tại hoặc thông tin đăng nhập sai! ";
                         $_SESSION['tb_dangnhap']=$tb;
                         header('location: index.php?pg=dangnhap');
                }


}

                // if(isset($_POST["dangnhap"])&&($_POST["dangnhap"])){
                //     $username=$_POST["username"];
                //     $password=$_POST["password"];
                    
                //     //xl: kiem tra
                //     $kq=checkuser($username,$password);

                //     if(is_array($kq)&&(count($kq))){
                //         $_SESSION['s_user']=$kq;
                //         header('location: index.php');
                //     }
                //     else{
                //         $tb="Tài khoản không tồn tại hoặc thông tin đăng nhập sai! ";
                //         $_SESSION['tb_dangnhap']=$tb;
                //         header('location: index.php?pg=dangnhap');
                //     }


                //     //out
                    
                // }
                // 
                break;

               case 'thanhtoan':
                if ((isset($_POST['thanhtoan'])) &&($_POST['thanhtoan'])) {
                    //lấy dữ liệu
                    $tongdonhang=$_POST['tongdonhang'];
                    $hoten=$_POST['hoten'];
                    $address=$_POST['address'];
                    $email=$_POST['email'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $madh="MALAOHK".rand(0,999999);
                    //TẠO ĐƠN HÀNG
                    //Và trả về 1 id đơn hàng
                    //$item=array($id,$tensp,$img,$gia,$sl);
                    $iddh=taodonhang($madh,$tongdonhang,$pttt,$hoten,$address,$email,$tel);
                    $_SESSION['iddh']=$iddh;
                     if(isset($_SESSION['giohang']) &&(count($_SESSION['giohang'])>0));
                        foreach ($_SESSION['giohang'] as $sp) {
                        extract($sp);}
                        unset($_SESSION['giohang']);

                }
                include "view/donhang.php";
                break; 
            case 'donhangcf':
                include "view/donhangcf.php";
                break;  
            case 'lichsu':
                include "view/lichsu.php";
                break;     
            case 'dangnhap':
                include "view/dangnhap.php";
                break;
            case 'myaccount':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
                    
                    include "view/myaccount.php";
                }
                
                break;
            case 'logout':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
                    unset($_SESSION['s_user']);
                }
                header('location: index.php');
                break;
            case 'adduser':
                // xác định giá trị input
                if(isset($_POST["dangky"])&&($_POST["dangky"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    $email=$_POST["email"];
                    // xử lý
                    user_insert($username, $password, $email);
                }

                // 
                include "view/dangnhap.php";
                break;
            case 'updateuser':
                // xác định giá trị input
                if(isset($_POST["capnhat"])&&($_POST["capnhat"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    $email=$_POST["email"];
                    $diachi=$_POST["diachi"];
                    $dienthoai=$_POST["dienthoai"];
                    $id=$_POST["id"];
                    $role=0;
                    // xử lý
                    user_update($username,$password,$email,$diachi,$dienthoai,$role,$id);
                    include "view/myaccount_confirm.php";
                }

                // 
                
                break;
                case 'delcart':
                if(isset($_GET['i'])&&($_GET['i']>0)){
                     if(isset($_SESSION['giohang']) &&(count($_SESSION['giohang'])>0));
                        array_splice($_SESSION['giohang'],$_GET['i'],1);
                }else{
                     if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
                }

                if(isset($_SESSION['giohang']) &&(count($_SESSION['giohang'])>0)){


                    header('location: index.php?pg=viewcart');

                }else{
                    header('location: index.php');
                }
                break;

               
                break;
            case 'dangky':
                include "view/dangky.php";
                break;
            case 'donhang':
                include "view/donhang.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            default:
                
                include "view/home.php";
                break;
        }
    }
    

    include "view/footer.php";

?>