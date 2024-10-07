<div class="main">
    <br>
    <h1 style="text-align: center;">Đơn Hàng</h1>
    <div style="float: right; margin-right: 340px;">
    <br>
    <table border="1" style="text-align: center;">
    <tr>
            <th>STT</th>
            <th>Mã Đơn Hàng</th>
            <th>Tong đơn Hàng</th>
            <th>Phương Thức Thanh toán</th>
            <th>Họ Tên</th>
            <th>Địa chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Huỷ Đơn Hàng</th>
        </tr>
        <?php
            //var_dump($kq);
            
        ?>
    <?php
        if (isset($kq)&&(count($kq)>0)) {
            $i=1;
            foreach ($kq as $item) {
                switch ($item['pttt']){
                         case '1':
                             $txtmess="Thanh toán khi nhận hàng";
                             break;
                         case '2':
                             $txtmess="Thanh toán chuyển khoản";
                             break;
                         case '3':
                             $txtmess="Thanh toán ví mono";
                             break;
                         case '4':
                             $txtmess="Thanh toán khi Online";
                             break;
                         default:
                             $txtmess="Chưa chọn";
                             break;
                     }
    

                echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$item['madh'].'</td>
                    <td>'.$item['tongdonhang'].'</td>
                    <td>'. $txtmess.'</td>
                    <td>'.$item['hoten'].'</td>
                    <td>'.$item['address'].'</td>
                    <td>'.$item['tel'].'</td>
                    <td><button style=" background: red; border: 0;color: white;padding: 10px;border-radius: 20px;"><a href="index.php?act=deldh&id='.$item['id'].'" style="color: white;">Xoá</a></button></td>


                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>
</div>