<?php
    
?>
<div class="containerfull">
        <!-- <div class="bgbanner">ĐĂNG NHẬP</div> -->
    </div>

    <section class="containerfull">
        <div class="container">
             <div class="category " onclick="toggleSubcategories()">
                <h1>TRANG ĐĂNG NHẬP</h1><br><br>
                 <div class="subcategories">
                <a href="#">Cập nhật thông tin</a></br>
                <a href="#">Lịch sử mua hàng</a></br>
                <a href="#">Thoát </a>
             </div>
            </div>
            <div class="login-container" style="padding-top: 80px; padding-bottom: 50px;">
                <h1>ĐĂNG NHẬP</h1><br>
               
                  <h2 style="color:red">
                  <?php
                           if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){
                              echo $_SESSION['tb_dangnhap'];
                              unset($_SESSION['tb_dangnhap']);
                           } 
                           
                  ?>
                  </h2>
                <form action="index.php?pg=login" method="post">
                     <div class="form-group">
                        <div class="username"><!-- col25 -->
                           <label for="username">Tên đăng nhập</label>
                        </div>
                        <div class="username"><!-- col75 -->
                           <input type="text" id="username" name="username" placeholder="Nhập tên đi">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="password">
                           <label for="password">Mật khẩu</label>
                        </div>
                        <div class="form-group">
                           <input type="password" id="password" name="password" placeholder="Nhập mật khẩu..">
                        </div>
                     </div>
                     
                     
                     
                     <br>
                     <div class="form-group">
                        
                        <input type="submit" name="dangnhap" value="Đăng nhập">
                     </div>
                     </form>
                    
                </div>
            </div>


        </div>
    </section>