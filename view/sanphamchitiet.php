<?php
   $html_dm=showdm($dsdm);
   $html_sp_lienquan=showsp($dssp_lienquan);
   extract($spchitiet);
?>
<div class="containerfull">
        <!-- <div class="bgbanner">SẢN PHẨM</div> -->
    </div>

    <section class="containerfull">
        <div class="container">
           <div class="container">
              <div class="category " onclick="toggleSubcategories()">
                <h1 >SẢN PHẨM CHI TIẾT</h1><br><br>
                 <div class="subcategories" >
                <?=$html_dm?>
            </div>
        </div>
        
               
                <div class="containerfull mr30">
                    <div class="col6 imgchitiet">
                        <img src="./upload/<?=$img?>" alt="">
                    </div>
                    <div class="col6 textchitiet">
                        <h1><?=$name?></h1>
                        <h2><?=$price?>đ</h2>
                        
                        
                        <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="name" value="<?=$name?>">
                                <input type="hidden" name="img" value="<?=$img?>">
                                <input type="hidden" name="price" value="<?=$price?>">
                                <input type="number" name="soluong" id="" min="1" value="1" max="10">
                                <button type="submit" name="addcart">Đặt hàng</button>
                            </form>
                    </div>
                    
                </div>
                <div class="cmt">
                        <iframe src="binhluan.php?idsp=<?=$_GET['id']?>" width="100%" height="300px" frameborder="0"></iframe>
                    </div>
                <hr>
                <h1>SẢN PHẨM LIÊN QUAN</h1>
                <div class="containerfull mr30">
                    <?=$html_sp_lienquan;?>
                    
                </div>
           


        </div>
    </section>