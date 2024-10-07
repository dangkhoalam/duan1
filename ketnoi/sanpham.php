<?php
require_once 'pdo.php';


function get_dssp_new($limi){
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function get_dssp_best($limi){
    $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function get_dssp_view($limi){
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit ".$limi;
    return pdo_query($sql);
}

function get_dssp($kyw,$iddm,$limi){
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($iddm>0){
        $sql .=" AND iddm=".$iddm;
    }
    if($kyw!=""){
        $sql .=" AND name like '%".$kyw."%'";
    }

    $sql .= " ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}

function get_sanphamchitiet($id){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql,$id);
}

function get_dssp_lienquan($iddm,$id,$limi){
    $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY id DESC limit ".$limi;
    return pdo_query($sql,$iddm,$id);
}

function get_iddm($id){
    $sql = "SELECT iddm FROM sanpham WHERE id=?";
    return pdo_query_value($sql,$id);
}

function showsp($dssp){
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        if($bestseller==1){
            $best='<div class="best"></div>';
        }else{
            $best='';
        }
        $html_dssp.='<div class="box25 mr15">
                            '.$best.'
                            <a href="index.php?pg=sanphamchitiet&id='.$id.'">
                                <img src="./upload/'.$sp['img'].'" alt="">
                            </a>
                            <span class="price">'.$price.'đ</span>
                            <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="name" value="'.$name.'">
                                <input type="hidden" name="img" value="'.$img.'">
                                <input type="hidden" name="price" value="'.$price.'">
                                <input type="hidden" name="soluong" value="1">
                                <button type="submit" name="addcart" style="margin-bottom: 70px;">Đặt hàng</button>
                            </form>
                            
                        </div>';
    }
    return $html_dssp;
}







// function hang_hoa_select_by_id($ma_hh){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_one($sql, $ma_hh);
// }

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }
// 
        // function deldm($id){
    //     $conn = connectdb();
    //     $sql = "DELETE FROM tbl_danhmuc WHERE id=".$id;
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
    // }
    function insert_sanpham($iddm,$tensp,$price,$view,$img,$bestseller){
        $conn = connectdb();//kết nối csdl
        $sql = "INSERT INTO sanpham (iddm, name, price, view, img, bestseller)
        VALUES ('$iddm', '$tensp', '$price', '$view' , '$img' , '$bestseller')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    // function getall_sanpham(){
    //     $conn = connectdb();//kết nối csdl
    //     $stmt = $conn->prepare("SELECT * FROM tbl_sampham");//thực thi câu lệnh sql
    //     $stmt->execute();
    //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $kq=$stmt->fetchAll();
    //     return $kq;
    //   }

    function getall_sp(){
        $conn = connectdb();//kết nối csdl
        $sql = "SELECT * FROM sanpham";
        $stmt = $conn->prepare($sql);//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
      }
     function getall_sp2(){
        $conn = connectdb();//kết nối csdl
        $sql = "SELECT * FROM sanpham where iddm=1";
        $stmt = $conn->prepare($sql);//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
      }

    function chitet($id){
        $sql="SELECT * FROM tbl_sampham where 1";
        if ($id>0) $sql.=" AND id=".$id;
        $conn = connectdb();//kết nối csdl
        $stmt = $conn->prepare($sql);//thực thi câu lệnh sql
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function delsp($id){
        $conn = connectdb();
        $sql = "DELETE FROM sanpham WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }

     function getonesp($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM sanpham where id=".$id);//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }

    function updatesp($id, $name, $img, $price, $view, $bestseller, $iddm){
        $conn = connectdb();
        if ($img=="") {
            $sql = "UPDATE sanpham SET name ='".$name."' , price ='".$price."' , iddm ='".$iddm."', view ='".$view."', bestseller ='".$bestseller."'  WHERE id=".$id;
        }
        else {
            $sql = "UPDATE sanpham SET name ='".$name."' , price ='".$price."' , iddm ='".$iddm."', img ='".$img."', view ='".$view."', bestseller ='".$bestseller."'  WHERE id=".$id;
        }

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }
?>