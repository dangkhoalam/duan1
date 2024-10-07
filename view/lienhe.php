

<?php
            foreach ($lienhe as $lh) {

                echo '
             
                       		<h1 style="padding:30px;">Giới thiệu</h1>
                        	<h3 style="padding: 50px 60px 100px 30px; text-align: center;" >'.$lh['gioithieu'].'</h3>
                          	<br>
                          	<br>
                          	<p style="padding-left: 30px;">Số Điện thoại :<a href="#"> '.$lh['sdt'].'</p></a>
                            <p  style="padding-left: 30px;">Email :<a href="#"> '.$lh['email'].'</p></a>
							<p style="padding-left: 30px;">Địa chỉ : '.$lh['diachi'].' </p>

                           
                       
                        
                       
               
                       ';
            }
           ?>