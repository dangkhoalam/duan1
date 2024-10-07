<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function danhmuc_insert($ten_danhmuc){
//     $sql = "INSERT INTO danhmuc(ten_danhmuc) VALUES(?)";
//     pdo_execute($sql, $ten_danhmuc);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function danhmuc_update($ma_danhmuc, $ten_danhmuc){
//     $sql = "UPDATE danhmuc SET ten_danhmuc=? WHERE ma_danhmuc=?";
//     pdo_execute($sql, $ten_danhmuc, $ma_danhmuc);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function danhmuc_delete($ma_danhmuc){
//     $sql = "DELETE FROM danhmuc WHERE ma_danhmuc=?";
//     if(is_array($ma_danhmuc)){
//         foreach ($ma_danhmuc as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_danhmuc);
//     }
// }
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all(){
    $sql = "SELECT * FROM danhmuc ORDER BY stt DESC";
    return pdo_query($sql);
}
function showdm($dsdm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link='index.php?pg=sanpham&iddm='.$id;
        $html_dm.='<a href="'.$link.'">'.$name.'</a>' .'</br>';
    }
    return $html_dm;
}
function get_name_dm($id){
    $sql = "SELECT name FROM danhmuc WHERE id=".$id;
    $kq=pdo_query_one($sql);
    return $kq["name"];
}

// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_select_by_id($ma_danhmuc){
//     $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_one($sql, $ma_danhmuc);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }
    function themdm($name){
        $conn = connectdb();
        $sql = "INSERT INTO danhmuc (name) VALUES ('".$name."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function updatedm($id,$name){
        $conn = connectdb();
        $sql = "UPDATE danhmuc SET name='".$name."' WHERE id=".$id;

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }
    function getonedm($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM danhmuc where id=".$id);//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }

    function deldm($id){
        $conn = connectdb();
        $sql = "DELETE FROM danhmuc WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function getall_dm(){
        $conn = connectdb();//kết nối csdl
        $stmt = $conn->prepare("SELECT * FROM danhmuc");//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
      }
?>