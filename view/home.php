<?php
    $html_dssp_new=showsp($dssp_new);
    $html_dssp_best=showsp($dssp_best);
    $html_dssp_view=showsp($dssp_view);
    
    // $dsspmoi="";
    // foreach ($dssp as $sp) {
    //     extract($sp);
    //     if ($bestseller==1) {
    //         $best='<div class="best"></div>';
    //     }else{
    //         $best='';
    //     }
    //     $dsspmoi.='<div class="box25 mr15">
    //                             '.$best.'
    //     <img src="layout/images/'.$img.'" alt="">
    //                     <span class="price">'.$price.'</span>
    //                     <button>Đặt hàng</button>

    //     </div>';
    // }
?>
<!-- <div class="containerfull">

        <img src="layout/images/357 copy.jpg" alt="">
    </div>
 -->

<!-- <div class="banner-container">
        <div class="banner active"><img src="layout/images/357 copy.jpg" alt=""></div>
        <div class="banner"><img src="layout/images/hinhvuontra" alt=""></div>
        <div class="banner"><img src="layout/images/357 copy.jpg" alt=""></div>

</div> -->
 <!-- <style>
        .banner-container {
            position: relative;
            width: 100%;
            max-width: 1500px;
            margin: auto;
            overflow: hidden;
        }

        .banner {

            width: 100%;
            height: 600px; /* Điều chỉnh chiều cao của banner theo nhu cầu của bạn */
            display: none;
            justify-content: center;
            align-items: center;
            background-color: #3498db;
            color: #fff;
            font-size: 24px;
        }

        .banner.active {
            display: flex;
        }

        .banner:nth-child(1) {
            background-color: #e74c3c;
        }

        .banner:nth-child(2) {
            background-color: #2ecc71;
        }

        .banner:nth-child(3) {
            background-color: #f39c12;
        }
    </style>

    <div class="banner-container">
        <div class="banner active"><img src="layout/images/Untitled-1.jpg" alt=""></div>
        <div class="banner"><img src="layout/images/hinhvuontra.jpg" alt=""></div>
        <div class="banner"><img src="layout/images/357 copy.jpg" alt=""></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var banners = document.querySelectorAll('.banner');
            
            function showBanner(index) {
                banners.forEach(function (banner, i) {
                    banner.classList.toggle('active', i === index);
                });
            }

            document.querySelector('.banner-container').addEventListener('click', function () {
                var activeBanner = document.querySelector('.banner.active');
                var currentIndex = Array.from(banners).indexOf(activeBanner);
                var nextIndex = (currentIndex + 1) % banners.length;

                showBanner(nextIndex);
            });
        });
    </script>
 -->





  <div class="banner-container">
    <div class="banner" id="banner1"><img src="layout/images/Untitled-1.jpg" alt=""></div>
    <div class="banner" id="banner2"><img src="layout/images/Untitled31.jpg" alt=""></div>
    <div class="banner" id="banner3"><img src="layout/images/Untitled-2.jpg" alt=""></div>
  </div>



 <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
    }

    .banner-container {
    position: relative;
  
    margin: auto;
    overflow: hidden;

    display: flex;
    flex-direction: column;
     align-items: center;
     max-height: 100%;

     
    }

    .banner {
    width: 1500px;
    max-width: 100%;
        height: 400px; /* Điều chỉnh chiều cao của banner theo nhu cầu của bạn */
      background-color: #3498db;
      color: #fff;
      text-align: center;
      line-height: 100px;
      font-size: 20px;
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.5s, transform 0.5s;
      margin-bottom: 10px;
    }

    .banner:hover {
      cursor: pointer;
    }

    /* Keyframes for the animation */
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Apply animation to individual banners */
    #banner1 {
      animation: fadeInUp 0.5s ease 0.5s forwards;
    }

    #banner2 {
      animation: fadeInUp 0.5s ease 1s forwards;
    }

    #banner3 {
      animation: fadeInUp 0.5s ease 1.5s forwards;
    }
  </style>




  


    <section class="containerfull">
        <div class="container">
            <h1>SẢN PHẨM HOT</h1><br>
            <div class="row">
                <div class="box50 mr15" style="padding-top: 20px; ">
<!-- banner nhỏ-->

                    <style>
    .slideshow-container {
      border: 10px solid #F0F0F0;
      position: relative;
      transform: rotate(-2deg);
      max-width: 450px;
      margin: auto;
    }

    .mySlides {
      display: none;
      animation: fade 3s infinite;
    }

    @keyframes fade {
      from {
        opacity: 0.4;
      }
      to {
        opacity: 1;
      }
    }
  </style>
 

  <div class="slideshow-container">
    <div class="mySlides">
      <img src="layout/images/hinhvuontra.jpg" alt="Slide 1">
    </div>
    <div class="mySlides">
      <img src="layout/images/caffe.jpg" alt="Slide 2">
    </div>
    <div class="mySlides">
      <img src="layout/images/thiet-ke-noi-that-quan-cafe.jpeg" alt="Slide 3">
    </div>
  </div>

  <script>
    let slideIndex = 0;

    function showSlides() {
      let slides = document.getElementsByClassName("mySlides");
      for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }
      slides[slideIndex - 1].style.display = "block";
      setTimeout(showSlides, 3000);
    }

    showSlides();
  </script>


 </div>






                    <!-- <img src="layout/images/hinhvuontra.jpg" alt="" style=" transform: rotate(-3deg); border: 10px solid #ffff;  "> -->  
                <?=$html_dssp_best?>
            </div>
            
            <div class="containerfull mr30">
                <h1>SẢN PHẨM MỚI</h1><br>
                <?=$html_dssp_new;?>
            </div>
            
            <div class="containerfull mr30">
                <h1>SẢN PHẨM NHIỀU NGƯỜI XEM</h1><br>
                <?=$html_dssp_view?>
            </div>

        </div>

        </div>
    </section>



    <!-- <section class="containerfull bg1 padd50">
        <div class="container">
            <h1>DANH MỤC SẢN PHẨM HOT</h1>
            <div class="row">
                <h2>Cà phê</h2>
            </div>
          
            <div class="row">
                <div class="box25 mr15">
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
            
            </div>
            <div class="row">
                <h2>Trà</h2>
            </div>
            <div class="row">
                <div class="box25 mr15">
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp3.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp4.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
            </div>

        </div>
    </section> -->