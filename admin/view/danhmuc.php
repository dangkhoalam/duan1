<!-- trang này có chức năng để làm thêm sửa xoá seach .... -->
<div class="main" style="text-align: center;">
    <h1>Danh mục</h1>
    <form action="index.php?act=adddm" method="post">
        <input type="text" name="tendm" id="">
        <input type="submit" name="themmoi" value="Thêm mới" style=" background: indigo; border: 0;color: white;padding: 10px;border-radius: 20px;">
    </form>
      <div style="float: right; margin-right: 570px;">
    <br>
    <table border="1">
    <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Ưu tiên</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
        </tr>
        <?php
            //var_dump($kq);
            
        ?>
    <?php
        if (isset($kq)&&(count($kq)>0)) {
            $i=1;
            foreach ($kq as $dm) {
                echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$dm['name'].'</td>
                    <td>'.$dm['home'].'</td>
                    <td>'.$dm['stt'].'</td>
                    <td><button style=" background: indigo; border: 0;color: white;padding: 10px;border-radius: 20px;"><a href="index.php?act=updatedmfrom&id='.$dm['id'].'" style="color: white;" >Sửa</a></button>  <button style=" background: red; border: 0;color: white;padding: 10px;border-radius: 20px;"><a href="index.php?act=deldm&id='.$dm['id'].'" style="color: white;">Xoá</a></button></td>
                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>
</div>