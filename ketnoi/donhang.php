<?php
    function taodonhang($madh,$tongdonhang,$pttt,$hoten,$address,$email,$tel){
        $conn = connectdb();//kết nối csdl
        $sql = "INSERT INTO tbl_oder (madh, tongdonhang, pttt , hoten, address, email, tel)
        VALUES ('".$madh."', '".$tongdonhang."', '".$pttt."', '".$hoten."' , '".$address."' , '".$email."' ,'".$tel."')"; 
        // use exec() because no results are returned
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return $last_id;
    }
    // function addtocart($iddh,$idpro,$tensp,$img,$dongia,$soluong){
    //     $conn = connectdb();//kết nối csdl
    //     $sql = "INSERT INTO tbl_cart (iddh, idpro, tensp, img, dongia, soluong)
    //     VALUES ('".$iddh."', '".$idpro."', '".$tensp."', '".$img."' , '".$dongia."' ,'".$soluong."')";
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
    //     $last_id = $conn->lastInsertId();
    //     return $last_id;
    // }

    function getshowcart($iddh){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM cart where iddh=".$iddh);//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }

     function getoderinfo($iddh){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_oder where id=".$iddh);//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }

    function getdhall(){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_oder ");//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }

    function deldh($id){
        $conn = connectdb();
        $sql = "DELETE FROM tbl_oder WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>