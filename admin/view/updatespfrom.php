<div class="main">
    <h2 style="margin-left: 30px;">Cập Nhật Sản Phẩm</h2>
    <form action="index.php?act=sampham_update" method="post" enctype="multipart/form-data" style="margin-left: 30px;">
        <select name="iddm" id="">
            <option value="0">Chọn danh mục</option>
            <?php
                $iddmcur=$spct[0]['iddm'];
                if (isset($dsdm)) {
                    foreach ($dsdm as $dm){
                        if ($dm['id']==$iddmcur) 
                        echo '<option value="'.$dm['id'].'" selected>'.$dm['name'].'</option>';
                        
                        else echo '<option value="'.$dm['id'].'">'.$dm['name'].'</option>';
                    }
                    
                }

            ?>
        </select>
        <div>Tên Sản Phẩm
        <input type="text" name="name" style=" margin-left: 70px; width: 300px; " id="" value="<?=$spct[0]['name']?>"></div>
        <div>Hình
        <input type="file" name="hinh" id="" style=" margin-left: 130px; width: 300px; "></div>
        <img src="<?=$spct[0]['img']?>" alt="" width="100px">
        <div>Giá
        <input type="text" name="price" style=" margin-left: 130px; width: 300px; " id="" value="<?=$spct[0]['price']?>"></div>
        <div>Lượt xem
        <input type="text" name="view" id="" style=" margin-left: 90px; width: 300px; "  value="<?=$spct[0]['view']?>"></div>
        <div>
        <div>Giảm giá
        <input type="text" name="bestseller" id="" style=" margin-left: 95px; width: 300px; " value="<?=$spct[0]['bestseller']?>"></div>
        <div>
        <input type="hidden" name="id" value="<?=$spct[0]['id']?>">
        <input type="submit" name="capnhat" value="Cập nhật" style=" margin-top:20px ;  background: indigo; border: 0;color: white;padding: 10px;border-radius: 20px;"></div>
    </form>
    <br>
    <table border="1" style="float: right; margin-top: -300px;margin-right: 80px; ">
    <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hinh</th>
            <th>Giá</th>
            <th>Chi Tiết</th>
            <th>Thao Tác</th>
        </tr>
        <?php
            //var_dump($kq);
            
        ?>
    <?php
        if (isset($kq)&&(count($kq)>0)) {
            $i=1;
            foreach ($kq as $item) {
                echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$item['name'].'</td>
                    <td><img src="'.$item['img'].'" width="300px"></td>
                    <td>'.$item['price'].'</td>
                    <td>'.$item['view'].'</td>
                    <td>'.$item['bestseller'].'</td>
                    <td><a href="index.php?act=updatespfrom&id='.$item['id'].'">Sửa</a>  <a href="index.php?act=delsp&id='.$item['id'].'">Xoá</a></td>
                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>