<div class="main" >
    <h1 style="text-align: center; margin-bottom: 30px;">Sản Phẩm</h1>
    <div style="margin-left: 30px;" >
        <div>
        <h2>Thêm sản phẩm</h2>
      </div>
    <form action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data">
        <select name="iddm" id="">
            <option value="0">Chọn danh mục</option>
            <?php
                if (isset($dsdm)) {
                    foreach ($dsdm as $dm){
                        echo '<option value="'.$dm['id'].'">'.$dm['name'].'</option>';
                    }
                }
            ?>
        </select>

        <div style=" margin-top: 20px;">
         <th>Tên sản phẩm</th>
        <input type="text" name="name" id="" style=" margin-left: 70px; width: 300px; ">
        </div>
        <div style=" margin-top: 20px;">
          <th>Hinh</th>
        <input type="file" name="hinh" id=""  style="margin-left: 128px; width: 300px;">
        </div>
        <div style=" margin-top: 20px;">
          <th>Giá</th>
        <input type="text" name="price" id=""  style="margin-left: 135px; width: 300px;">
        </div>
        <div style=" margin-top: 20px;">
         <th>View</th>
        <input type="text" name="view" id=""  style="margin-left: 125px; width: 300px;">
        </div>
        <div style=" margin-top: 20px;">
        <th>bestseller</th>
        <input type="text" name="bestseller" id=""  style="margin-left: 98px; width: 300px;">
        </div>
        <div style=" margin-top: 20px;">
         <th>Thao Tác</th>
        <input type="submit" name="themmoi" value="Thêm mới"  style="margin-left: 100px;  background: indigo; border: 0;color: white;padding: 10px;border-radius: 20px;">
        </div>
    </div>
    </form>
    <br>
    <table border="1" style="float: right; margin-top: -350px;margin-right: 12%;  ">
    <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hinh</th>
            <th>Giá</th>
            <th>View</th>
            <th>Bestseller</th>
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
                    <td><a href="index.php?act=updatespfrom&id='.$item['id'].'" style=" background: indigo; border: 0;color: white;padding: 10px;border-radius: 20px;">Sửa</a>  <a href="index.php?act=delsp&id='.$item['id'].'" style=" background: red; border: 0;color: white;padding: 10px;border-radius: 20px;">Xoá</a></td>
                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>