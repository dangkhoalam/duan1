<?php
    $html_dm=showdm($dsdm);
    $html_dssp=showsp($dssp);

    // echo "iuyiuyuiyu - ".var_dump(get_name_dm(1));

    if($titlepage!="") $title=$titlepage;
    else $title="SẢN PHẨM";
?>
<div class="containerfull">
        <div class="bgbanner"></div>
    </div>

    <section class="containerfull" >
        <div class="container">
            <div class="category " onclick="toggleSubcategories()">
                <h1 >DANH MỤC</h1><br><br>
                <div class="subcategories">
                    <div><?=$html_dm;?>
                        
                    </div>
                        
                    </div>
                
            </div>
            <div class="boxright" style="padding-top: 50px; padding-left: 140px;">
                <h1><?=$title?></h1><br>
                <div class="containerfull mr30">
                    <?=$html_dssp;?>
                </div>
            </div>
        </div>
    </section>
    <script src="layout/css/script.js"></script>