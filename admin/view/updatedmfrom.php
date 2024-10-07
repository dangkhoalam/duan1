<!-- trang này có chức năng để làm thêm sửa xoá seach .... -->
<div class="main" >
    <h2>Cập Nhật Danh mục</h2>
   
    <form action="index.php?act=updatedmfrom" method="post">
        <input type="text" name="tendm" id=""  value="<?=$kqone[0]['name']?>">
        <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
        <input type="submit" name="capnhat" value="Cập Nhật">
    </form>
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
                    <td><a href="index.php?act=updatedmfrom&id='.$dm['id'].'">Sửa</a>  <a href="index.php?act=deldm&id='.$dm['id'].'">Xoá</a></td>
                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>