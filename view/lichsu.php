<!-- <div class="containerfull">
     
</div> -->

    <section class="containerfull">
        <div class="container" style="padding-bottom: 60px;">
            <div class="category " onclick="toggleSubcategories()">
                <h1>Lịch sử đặt hàng</h1><br><br>
                <div class="subcategories">
                <a href="index.php?pg=myaccount">Cập nhật thông tin</a></br>
                <a href="index.php?pg=lichsu" >Lịch sử đặt hàng</a></br>
                <a href="index.php?pg=logout">Thoát hệ thống</a>
            </div>
            </div>



            <h1 style="text-align: center; padding-top: 70px; color: red;">Lịch sử đặt hàng của khách hàng <?=$username?> </h1>

            <?php
                 if(isset($_SESSION['iddh']) &&($_SESSION['iddh']>0)){
                    $getshowcart=getshowcart($_SESSION['iddh']);
                    if ((isset($getshowcart))&&(count( $getshowcart)>0)) {
                        // echo var_dump($_SESSION['giohang']);
                        echo '<table id="donhang" border="1" style="margin-left:300px;">
                        <tr style="background-color: #1435C3;   color: #fff;">
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                           
                        </tr>';
                        $tong=0;
                        $i=0;
                        //$i=1;
                        foreach ( $getshowcart as $item) {
                            $tt=$item['soluong'] * $item['dongia'];
                            $tong+=$tt;
                            echo '  
                        <tr>
                            <td>'.($i+1).'</td>
                            <td>'.$item['img'].'</td>
                            <td><img src="./upload/'.$item['tensp'].'" width=150px></td>
                            <td>'.$item['dongia'].'đ</td>
                            <td>'.$item['soluong'].'</td>
                            <td>'.$tt.'đ</td>
                    
                        </tr>';
                        $i++;
                        } echo'<tr><td colspan="5">Tổng Đơn Hàng Là:</td><td>'.$tong.'đ</td></tr>';
                          echo '</table>';

                    }
                }else{
                    echo "giỏ hàng trống. <a href='index.php'>Tiếp túc đặt hàng</a>";
                }
            ?>
            <br>

            <?php
                 if((isset($_SESSION['iddh'])) &&($_SESSION['iddh']>0)){
                    $orderinfo=getoderinfo($_SESSION['iddh']);
                        if (count($orderinfo)>0){
                        
            ?>
                <h3 style="margin-left: 20px;">Mã Đơn Hàng :<?=$orderinfo[0]['madh'];?></h3>
                    
                    <table id="dathang" style="margin-left:425px; margin-top: 10px; ">
                    <tr>
                        <td><b>Tên người nhận : </b><?=$orderinfo[0]['hoten'];?></td>
                    </tr>

                    <tr>
                        <td><b>Địa chỉ : </b><?=$orderinfo[0]['address'];?></td>
                    </tr>
                    <tr>
                        <td><b>Email : </b><?=$orderinfo[0]['email'];?></td>
                    </tr>
                    <tr>
                        <td><b>Số điện thoại: </b><?=$orderinfo[0]['tel'];?></td>

                    </tr>
                    <tr class="pttt">
                        <td><b>Phương Thức Thanh Toán:</b>
                           <?php
                                 switch ($orderinfo[0]['pttt']){
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
                                 echo $txtmess;
                            ?> 
                        </td> 
                    </tr>
                   
                </table>
            <div>
            <?php
                        }
                }
            ?>
            </div>
            </div>
</section>