
<?php
   function viewcart(){
      $html_cart='';
      $i=1;
      foreach ($_SESSION['giohang'] as $sp) {
         extract($sp);
         $tt=(Int)$price*(Int)$soluong;
         $html_cart.='
                        <tr>
                        <td>'.$i.'</td>
                        <td><img src="./upload/'.$img.'" alt="" style="width:100px"></td>
                        <td>'.$name.'</td>
                        <td>'.$price.'đ</td>
                        <td>'.$soluong.'</td>
                        <td>'.$tt.'</td>
                        <td><a href="index.php?pg=delcart&i='.$i.'">Xóa</a></td>
                  </tr>
                        ';
         $i++;
      }
      return $html_cart;
   }
   function get_tongdonhang(){
      $tong=0;
      foreach ($_SESSION['giohang'] as $sp) {
         extract($sp);
         $tt=(Int)$price*(Int)$soluong;
         $tong+=$tt;
      }
      return $tong;
   }  

?>
   
 