<div class="main" >
    <h2>Cập Nhật Liên hệ</h2>
   
    <form action="index.php?act=updatelhfrom" method="post">
        <input type="hidden" name="id"  value="<?=$kqone[0]['id']?>">
        <input type="text" name="gioithieu" id=""  value="<?=$kqone[0]['gioithieu']?>">
        <input type="text" name="sdt" id=""   value="<?=$kqone[0]['sdt']?>">
        <input type="text" name="email" id=""   value="<?=$kqone[0]['email']?>">
        <input type="text" name="diachi" id=""   value="<?=$kqone[0]['diachi']?>">
        <input type="submit" name="capnhat" value="Cập Nhật">
    </form>
    <br>
    <table border="1">
    <tr>
            <th>STT</th>
            <th>Giới thiệu</th>
            <th>Số điện thoại</th>
            <th>email</th>
            <th>Địa chỉ</th>
            <th>Hành động</th>
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
                    <td><a href="index.php?act=updatelhfrom&id='.$lh['id'].'">Sửa</a>  <a href="index.php?act=dellh&id='.$lh['id'].'">Xoá</a></td>
                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>