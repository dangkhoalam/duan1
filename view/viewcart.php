<?php
   $html_cart=viewcart();
?>
<div class="containerfull">
        <div class="bgbanner" style="text-align: center; margin-left: -12px;"><h2>GIỎ HÀNG</h2></div>
    </div>

    <section class="containerfull" >
        <div class="container" >
            <div class="">
                <h3 style="color: red;">ĐƠN HÀNG</h3>
            <table style="margin-left: 250px; background-color: #d9c8ae;">
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
               <?=$html_cart;?>
            </table>

            <a href="index.php?pg=viewcart&del=1"><button style="width: 200px; margin-top: 10px;margin-bottom: 10px; ">Xoá rỗng</button></a></a>
            <div class="total">
                <a href="index.php?pg=sanpham.php"><button style="width: 200px; ">Tiếp tục đặt hàng</button></a>
            </div>
            
        </div>
        </div>
        <div style=" margin-top: 80px; text-align: center;">

            <h3 style="color: red;">ĐẶT HÀNG</h3>
            <div class="total">
                <h3><h3>Tổng thanh toán: <?=$thanhtoan?>k</h3></h3>
            </div>
            <!-- <div class="coupon">
               <form action="index.php?pg=viewcart&voucher=1" method="post">
                  <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
                  <input type="text" name="mavoucher" placeholder="Nhập voucher">
                  <button type="submit">Áp mã</button>
                </form>
            </div> -->
            <h3>Thông Tin Đặt Hàng</h3>
    <form action="index.php?pg=thanhtoan" method="post" style="margin-left: 580px;margin-right: 585px; background-color: #d9c8ae;"  >
        <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
        <table id="dathang" style="width: 350px;">
        <tr>
            <td ><input style="width: 300px;" type="text" name="hoten" placeholder="Nhập họ và tên"></td>
        </tr>

        <tr>
            <td><input style="width: 300px;" type="text" name="address" placeholder="Nhập địa chỉ"></td>
        </tr>
        <tr>
            <td><input style="width: 300px;" type="text" name="email" placeholder="Nhập email"></td>

        </tr>
        <tr>
            <td><input style="width: 300px;" type="text" name="tel" placeholder="Nhập số điện thoại"></td>

        </tr>
        <tr class="pttt">
            <td>Phương Thức Thanh Toán<br>
            <input type="radio" name="pttt" value="1">Thanh toán khi nhận hàng<br>
            <input type="radio" name="pttt" value="2">Thanh toán chuyển khoản<br>
            <input type="radio" name="pttt" value="3">Thanh toán ví mono<br>
            <input type="radio" name="pttt" value="4">Thanh toán vnpay<br>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Thanh Toán" name="thanhtoan"></td>
        </tr>
        </table>
    </form>
            


        </div>
    </section>