<div class="main" style="text-align: center;">
    <h1>Liên Hệ</h1>
   <!--  <form action="index.php?act=addlh" method="post" >

       <div style=" margin-top: 20px;">
         <th>Tên sản phẩm</th>
        <input type="text" name="gioithieu" id="" style=" margin-left: 70px; width: 300px; ">
        </div>
        <div style=" margin-top: 20px;">
          <th>Hinh</th>
        <input type="text" name="sdt" id=""  style="margin-left: 128px; width: 300px;">
        </div>
        <div style=" margin-top: 20px;">
          <th>Giá</th>
        <input type="text" name="email" id=""  style="margin-left: 135px; width: 300px;">
        </div>
        <div style=" margin-top: 20px;">
         <th>View</th>
        <input type="text" name="diachi" id=""  style="margin-left: 125px; width: 300px;">
        </div>
        <input type="submit" name="themmoi" value="Thêm mới" style=" background: indigo; border: 0;color: white;padding: 10px;border-radius: 20px;">
    </form> -->
      <div style="float: right; margin-right: 180px;">
    <br>
    <table border="1" style="text-align: center;margin-left: 280px;">
    <tr>
            <th>STT</th>
            <th>Giới thiệu</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Thao tác</th>
        </tr>
        <?php
            //var_dump($kq);
            
        ?>
    <?php
        if (isset($kq)&&(count($kq)>0)) {
            $i=1;
            foreach ($kq as $lh) {
                echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$lh['gioithieu'].'</td>
                    <td>'.$lh['sdt'].'</td>
                    <td>'.$lh['email'].'</td>
                    <td>'.$lh['diachi'].'</td>
                    <td><button style=" background: indigo; border: 0;color: white;padding: 10px;border-radius: 20px;"><a href="index.php?act=updatelhfrom&id='.$lh['id'].'" style="color: white;" >Sửa</a></button>  <button style=" background: red; border: 0;color: white;padding: 10px;border-radius: 20px;"><a href="index.php?act=dellh&id='.$lh['id'].'" style="color: white;">Xoá</a></button></td>
                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>
</div>