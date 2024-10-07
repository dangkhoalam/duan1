<?php
	function themlh($gioithieu, $sdt, $email, $diachi){
        $conn = connectdb();
        $sql = "INSERT INTO lienhe (gioithieu, sdt, email, diachi) VALUES ('".$gioithieu."','".$sdt."','".$email."','".$diachi."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function updatelh($id ,$gioithieu, $sdt, $email, $diachi){
        $conn = connectdb();
        $sql = "UPDATE lienhe SET gioithieu ='".$gioithieu."' , sdt ='".$sdt."' , email ='".$email."', diachi ='".$diachi."'  WHERE id=".$id;

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }

    function getonelh($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM lienhe where id=".$id);//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }

    function dellh($id){
        $conn = connectdb();
        $sql = "DELETE FROM lienhe WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }

    function getall_lh(){
        $conn = connectdb();//kết nối csdl
        $stmt = $conn->prepare("SELECT * FROM lienhe");//thực thi câu lệnh sql
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
      }


    
?>