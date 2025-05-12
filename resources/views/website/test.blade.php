<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>FunBook</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
   </head>
   <body>
        <nav class="navbar navbar-expand-lg funbook-navbar TransparentNav">
         <div class="container">
            <a class="navbar-brand" href="index.php">
               <!-- <h2 class="company-logo">FunBook</h2> -->
               <img src="./images/fun-book-logo.png" alt="company logo">
            </a>
            <div class="navbar-text">
               <div class="offcanvas offcanvas-end menu-bg" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                  <div class="offcanvas-header">
                     <h5 class="offcanvas-title" id="offcanvasRightLabel">  <img src="./images/fun-book-logo.png" alt="company logo"></h5>
                     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="gallery.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Contact</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="top-signin">
               <a data-bs-toggle="modal" data-bs-target="#signinsocilamedia">Sign In <i class="fa-regular fa-user"></i></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <span class="navbar-toggler-icon"></span>
            </button>
         </div>
         </div>
      </nav><!-- model start -->
<div class="modal fade modal-section" id="signinsocilamedia" tabindex="-1" aria-labelledby="signinsocilamediaLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <div class="model-headline">
               <h2 class="modal-title fs-5" id="signinsocilamediaLabel">Get Started</h2>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
       
              <a href="#">
              <div class="register-modal">
                  <div class="row">
                     <div class="col-2">
                        <div class="social-icon-modal">
                           <img src="./images/google.png" alt="social media icon">
                        </div>
                     </div>
                     <div class="col-10">
                        <div class="content-modal">
                           Continue with google
                        </div>
                     </div>
                  </div>
               </div>
              </a>
           
          
             <a href="#">
             <div class="register-modal">
                  <div class="row">
                     <div class="col-2">
                        <div class="social-icon-modal">
                           <img src="./images/apple.png" alt="social media icon">
                        </div>
                     </div>
                     <div class="col-10">
                        <div class="content-modal">
                           Continue with google
                        </div>
                     </div>
                  </div>
               </div>
             </a>
           
              <a href="#">
              <div class="register-modal">
                  <div class="row">
                     <div class="col-2">
                        <div class="social-icon-modal">
                           <img src="./images/gmail.png" alt="social media icon">
                        </div>
                     </div>
                     <div class="col-10">
                        <div class="content-modal">
                           Continue with google
                        </div>
                     </div>
                  </div>
               </div>
              </a>
           
            <div class="or-model">
            OR
         </div>
       
            <form action="#">
               <div class="row">
                  <div class="col-12">
                     <div class="mb-3">
                        <input  class="form-control" id="" type="text" placeholder="Continue with phone number ">
                     </div>
                     <div class="mb-3">
                     <!-- <button class="funBookBtn" data-bs-toggle="modal" data-bs-target="#otpsocilamedia">Submit</button> -->
                     <button class="verifyOtp" data-bs-toggle="modal" data-bs-target="#otpsocilamedia">Submit</button>
                     </div>
                  </div>
               </div>
            </form>
     <div class="term-condition">
     I agree to the <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy</a>
     </div>
         </div>
        
      </div>
   </div>
</div>

<!-- model end --><div class="modal fade modal-section" id="otpsocilamedia" tabindex="-1" aria-labelledby="otpsocilamediaLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h2 class="modal-title fs-5" id="otpsocilamediaLabel" data-bs-toggle="modal" data-bs-target="#signinsocilamedia"><i class="fa-solid fa-angle-left"></i></h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            
               <div class="opt-modal">
                  <div class="otp-mobile">
                     <h2>Verify your Mobile Number</h2>
                  </div>
                  <div class="sent-num">
                     Enter OTP sent to +91565675678
                  </div>
              
          
        <div class="otp-box">
         <ul>
            <li>
               <input type="text"/>
            </li>
            <li>
               <input type="text"/>
            </li>
            <li>
               <input type="text"/>
            </li>
            <li>
               <input type="text"/>
            </li>
            <li>
               <input type="text"/>
            </li>
            <li>
               <input type="text"/>
            </li>
         </ul>
         </div>
        </div>
          
            <div class="term-condition">
           <p>
            Expert OTP in 26 seconds
           </p>
      <button class="verifyOtp colorDisable" class="btn-close" data-bs-dismiss="modal">Continue</button>
            </div>
         </div>
      </div>
   </div>
</div>
      <section class="sliderCarousel">
         <div class="container-fluid">
            <div class="owl-carousel owl-theme owlSlider" id="sliderImage">
               <div class="item">
                  <div class="slider-img">
                     <img src="./images/slider-image-2.webp" alt="slider-image.webp" class="d-none d-md-block">
                     <img src="./images/big-offers11.webp" alt="slider-image.webp" class="d-block d-md-none">
                  </div>
               </div>
               <div class="item">
                  <div class="slider-img">
                     <img src="./images/slider-image-2.webp" alt="slider-image.webp" class="d-none d-md-block">
                     <img src="./images/big-offers11.webp" alt="slider-image.webp" class="d-block d-md-none">
                  </div>
               </div>
               <div class="item">
                  <div class="slider-img">
                     <img src="./images/slider-image-2.webp" alt="slider-image.webp" class="d-none d-md-block">
                     <img src="./images/big-offers11.webp" alt="slider-image.webp" class="d-block d-md-none">
                  </div>
               </div>
            </div>
         </div>
      </section>
     
      <section class="myBussiness-section">
         <div class="container">
            <div class="headline">
               <h2>Waterparks</h2>
            </div>
            <div class="owl-carousel owl-theme" id="outer-mybussiness">
               <div class="item">
                  <a href="details.php">
                     <div class="bussiness-card">
                        <div class="bussiness-img">
                           <img src="./images/bussiness-1.webp" alt="bussiness image">
                           <div class="overlay-img">
                              <img src="./images/bussiness-2.webp" alt="bussiness image">
                           </div>
                           <div class="bussiness-heart">
                              <i class="fa-regular fa-heart"></i>
                           </div>
                        </div>
                        <div class="bussiness-card-content">
                           <ul>
                              <li>
                                 Entire cabin
                              </li>
                              <li>
                                 <i class="fa-solid fa-bed"></i> 3 beds
                              </li>
                           </ul>
                           <h6>
                              Ship And Castle Hotel
                           </h6>
                           <ul class="mybus-loc">
                              <li>
                                 <i class="fa-solid fa-location-dot"></i>
                              </li>
                              <li>
                                 Crest Line Park
                              </li>
                           </ul>
                           <ul class="bussiness-rating">
                              <li>
                                 <strong>$154</strong> <span>/night</span>
                              </li>
                              <li>
                                 <i class="fa-solid fa-star"></i> 3.4 (340)
                              </li>
                           </ul>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="item">
                  <a href="details.php">
                     <div class="bussiness-card">
                        <div class="bussiness-img">
                           <img src="./images/bussiness-4.webp" alt="bussiness image">
                           <div class="overlay-img">
                              <img src="./images/bussiness-2.webp" alt="bussiness image">
                           </div>
                           <div class="bussiness-heart">
                              <i class="fa-regular fa-heart"></i>
                           </div>
                        </div>
                        <div class="bussiness-card-content">
                           <ul>
                              <li>
                                 Entire cabin
                              </li>
                              <li>
                                 <i class="fa-solid fa-bed"></i> 3 beds
                              </li>
                           </ul>
                           <h6>
                              Ship And Castle Hotel
                           </h6>
                           <ul class="mybus-loc">
                              <li>
                                 <i class="fa-solid fa-location-dot"></i>
                              </li>
                              <li>
                                 Crest Line Park
                              </li>
                           </ul>
                           <ul class="bussiness-rating">
                              <li>
                                 <strong>$154</strong> <span>/night</span>
                              </li>
                              <li>
                                 <i class="fa-solid fa-star"></i> 3.4 (340)
                              </li>
                           </ul>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="item">
                  <a href="details.php">
                     <div class="bussiness-card">
                        <div class="bussiness-img">
                           <img src="./images/bussiness-2.webp" alt="bussiness image">
                           <div class="overlay-img">
                              <img src="./images/bussiness-3.webp" alt="bussiness image">
                           </div>
                           <div class="bussiness-heart">
                              <i class="fa-regular fa-heart"></i>
                           </div>
                        </div>
                        <div class="bussiness-card-content">
                           <ul>
                              <li>
                                 Entire cabin
                              </li>
                              <li>
                                 <i class="fa-solid fa-bed"></i> 3 beds
                              </li>
                           </ul>
                           <h6>
                              Ship And Castle Hotel
                           </h6>
                           <ul class="mybus-loc">
                              <li>
                                 <i class="fa-solid fa-location-dot"></i>
                              </li>
                              <li>
                                 Crest Line Park
                              </li>
                           </ul>
                           <ul class="bussiness-rating">
                              <li>
                                 <strong>$154</strong> <span>/night</span>
                              </li>
                              <li>
                                 <i class="fa-solid fa-star"></i> 3.4 (340)
                              </li>
                           </ul>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="item">
                  <a href="details.php">
                     <div class="bussiness-card">
                        <div class="bussiness-img">
                           <img src="./images/bussiness-3.webp" alt="bussiness image">
                           <div class="overlay-img">
                              <img src="./images/bussiness-2.webp" alt="bussiness image">
                           </div>
                           <div class="bussiness-heart">
                              <i class="fa-regular fa-heart"></i>
                           </div>
                        </div>
                        <div class="bussiness-card-content">
                           <ul>
                              <li>
                                 Entire cabin
                              </li>
                              <li>
                                 <i class="fa-solid fa-bed"></i> 3 beds
                              </li>
                           </ul>
                           <h6>
                              Ship And Castle Hotel
                           </h6>
                           <ul class="mybus-loc">
                              <li>
                                 <i class="fa-solid fa-location-dot"></i>
                              </li>
                              <li>
                                 Crest Line Park
                              </li>
                           </ul>
                           <ul class="bussiness-rating">
                              <li>
                                 <strong>$154</strong> <span>/night</span>
                              </li>
                              <li>
                                 <i class="fa-solid fa-star"></i> 3.4 (340)
                              </li>
                           </ul>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="item">
                  <a href="details.php">
                     <div class="bussiness-card">
                        <div class="bussiness-img">
                           <img src="./images/bussiness-4.webp" alt="bussiness image">
                           <div class="overlay-img">
                              <img src="./images/bussiness-2.webp" alt="bussiness image">
                           </div>
                           <div class="bussiness-heart">
                              <i class="fa-regular fa-heart"></i>
                           </div>
                        </div>
                        <div class="bussiness-card-content">
                           <ul>
                              <li>
                                 Entire cabin
                              </li>
                              <li>
                                 <i class="fa-solid fa-bed"></i> 3 beds
                              </li>
                           </ul>
                           <h6>
                              Ship And Castle Hotel
                           </h6>
                           <ul class="mybus-loc">
                              <li>
                                 <i class="fa-solid fa-location-dot"></i>
                              </li>
                              <li>
                                 Crest Line Park
                              </li>
                           </ul>
                           <ul class="bussiness-rating">
                              <li>
                                 <strong>$154</strong> <span>/night</span>
                              </li>
                              <li>
                                 <i class="fa-solid fa-star"></i> 3.4 (340)
                              </li>
                           </ul>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <section class="offer-section">
         <div class="container">
            <div class="offer-banner">
               <img src="./images/offers-banner.webp" alt="">
            </div>
            <div class="offer-content">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today-tab-pane" type="button" role="tab" aria-controls="today-tab-pane" aria-selected="true">Today's Best Offers</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="exclusive-tab" data-bs-toggle="tab" data-bs-target="#exclusive-tab-pane" type="button" role="tab" aria-controls="exclusive-tab-pane" aria-selected="false">CD Exclusive</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="people-tab" data-bs-toggle="tab" data-bs-target="#people-tab-pane" type="button" role="tab" aria-controls="people-tab-pane" aria-selected="false">Pople are currently using</button>
                  </li>
               </ul>
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="today-tab-pane" role="tabpanel" aria-labelledby="today-tab" tabindex="0">
                     <div class="offer-slider">
                        <div class="owl-carousel owl-theme" id="bestoffer">
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/amazon.png" alt="amazon logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/myntra.png" alt="myntra logo">
                                 <h3>60% Off On Brand</h3>
                                 <h5>Upto 7% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/flipcart.png" alt="flipcart logo">
                                 <h3>60% Off On Watch</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/jio.png" alt="jio logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/myntra.png" alt="myntra logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="exclusive-tab-pane" role="tabpanel" aria-labelledby="exclusive-tab" tabindex="0">
                     <div class="offer-slider">
                        <div class="owl-carousel owl-theme" id="cd-exclusive">
                           <div class="item">
                              <div class="offer-card">
                                 <div class="inner-offer">
                                    <img src="./images/amazon.png" alt="amazon logo">
                                    <h3>60% Off On Beauty</h3>
                                    <h5>Flat 3.6% voucher Rewards</h5>
                                    <div class="get-deal">
                                       <a href="#">Get Deal</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/myntra.png" alt="myntra logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Upto 7% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/flipcart.png" alt="flipcart logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/jio.png" alt="jio logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/myntra.png" alt="myntra logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="people-tab-pane" role="tabpanel" aria-labelledby="people-tab" tabindex="0">
                     <div class="offer-slider">
                        <div class="owl-carousel owl-theme" id="popleoffer">
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/amazon.png" alt="amazon logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/myntra.png" alt="myntra logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Upto 7% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/flipcart.png" alt="flipcart logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/jio.png" alt="jio logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item">
                              <div class="offer-card">
                                 <img src="./images/myntra.png" alt="myntra logo">
                                 <h3>60% Off On Beauty</h3>
                                 <h5>Flat 3.6% voucher Rewards</h5>
                                 <div class="get-deal">
                                    <a href="#">Get Deal</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="big-offer">
         <div class="container">
            <div class="owl-carousel owl-theme" id="bigOffer">
               <div class="item">
                  <div class="big-offer-img">
                     <img src="./images/big-offers11.webp" alt="">
                  </div>
               </div>
               <div class="item">
                  <div class="big-offer-img">
                     <img src="./images/big-offers22.webp" alt="">
                  </div>
               </div>
               <div class="item">
                  <div class="big-offer-img">
                     <img src="./images/big-offers11.webp" alt="">
                  </div>
               </div>
               <div class="item">
                  <div class="big-offer-img">
                     <img src="./images/big-offers22.webp" alt="">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="testimonial">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <article>
                        <div class="headline">
                           <h2>Testimonials</h2>
                        </div>
                        <p class="testimonial-intro">Here’s what people who have worked with us have to say!</p>
                     </article>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="owl-carousel owl-theme" id="testimonial">
                        <div class="item">
                           <div class="testi-item-wrap">
                              <div class="testi-item-img">
                                 <img src="./images/user-1.jpg" alt="testimonial image">
                              </div>
                              <h3 class="testi-person">Vinay Parekh</h3>
                              <h5 class="testi-designation">Businessman</h5>
                              <p class="testi-statement">I’m so glad I found Interior Design! They took all the stress out of the remodel and made it easy. The team is fantastic, and they made the whole experience positive and pleasant.</p>
                              <div class="testi-media">
                                 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/GIEVUgsQaIg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="testi-item-wrap">
                              <div class="testi-item-img">
                                 <img src="./images/user2.jpg" alt="testimonial image">
                              </div>
                              <h3 class="testi-person">Aman Verma</h3>
                              <h5 class="testi-designation">Businessman</h5>
                              <p class="testi-statement">I’m so glad I found Interior Design! They took all the stress out of the remodel and made it easy. The team is fantastic, and they made the whole experience positive and pleasant.</p>
                              <div class="testi-media">
                                 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/Jl8_ysqQD-4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="testi-item-wrap">
                              <div class="testi-item-img">
                                 <img src="./images/user3.jpg" alt="testimonial image">
                              </div>
                              <h3 class="testi-person">Vinay Parekh</h3>
                              <h5 class="testi-designation">Businessman</h5>
                              <p class="testi-statement">I’m so glad I found Interior Design! They took all the stress out of the remodel and made it easy. The team is fantastic, and they made the whole experience positive and pleasant.</p>
                              <div class="testi-media">
                                 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/OsdK-n-juZA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="testi-item-wrap">
                              <div class="testi-item-img">
                                 <img src="./images/user4.jpg" alt="testimonial image">
                              </div>
                              <h3 class="testi-person">Aman Verma</h3>
                              <h5 class="testi-designation">Businessman</h5>
                              <p class="testi-statement">I’m so glad I found Interior Design! They took all the stress out of the remodel and made it easy. The team is fantastic, and they made the whole experience positive and pleasant.</p>
                              <div class="testi-media">
                                 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/_oyJIepE-20" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="testi-item-wrap">
                              <div class="testi-item-img">
                                 <img src="./images/user2.jpg" alt="testimonial image">
                              </div>
                              <h3 class="testi-person">Vinay Parekh</h3>
                              <h5 class="testi-designation">Businessman</h5>
                              <p class="testi-statement">I’m so glad I found Interior Design! They took all the stress out of the remodel and made it easy. The team is fantastic, and they made the whole experience positive and pleasant.</p>
                              <div class="testi-media">
                                 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/OsdK-n-juZA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="testi-item-wrap">
                              <div class="testi-item-img">
                                 <img src="./images/user3.jpg" alt="testimonial image">
                              </div>
                              <h3 class="testi-person">Aman Verma</h3>
                              <h5 class="testi-designation">Businessman</h5>
                              <p class="testi-statement">I’m so glad I found Interior Design! They took all the stress out of the remodel and made it easy. The team is fantastic, and they made the whole experience positive and pleasant.</p>
                              <div class="testi-media">
                                 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/Jl8_ysqQD-4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section><footer>
   <div class="footer-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-4">
            <div class="footer-card">
               <div class="footer-head">
                  <h4>Contact Us</h4>
               </div>
               <ul>
                  <li>
                     Address: Ranchi, Jharkhand - 834005
                  </li>
                  <li>
                     Email: <a href="#">funbook@gmail.com</a>
                  </li>
               </ul>
               <div class="row">
                  <div class="col-lg-2 col-md-1 col-2">
                     <div class="support-icon">
                        <img src="./images/support.svg" alt="support icon">
                     </div>
                  </div>
                  <div class="col-lg-10 col-md-11 col-10">
                     <ul>
                        <li>
                           call to Order
                        </li>
                        <li>
                           <a href="#">+91 879 710 5521</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-2">
            <div class="footer-card">
               <div class="footer-head">
                  <h4>Quick Links</h4>
               </div>
               <ul>
                  <li>
                     <a href="#">About Us</a>
                  </li>
                  <li>
                     <a href="#">Contact Us</a>
                  </li>
                  <li>
                     <a href="#">Shop</a>
                  </li>
                  <li>
                     <a href="#">Products</a>
                  </li>
                  <li>
                     <a href="#">Blogs</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-lg-2">
            <div class="footer-card">
               <div class="footer-head">
                  <h4>Quick Links</h4>
               </div>
               <ul>
                  <li>
                     <a href="#">Special Offer</a>
                  </li>
                  <li>
                     <a href="#">Privacy Policy</a>
                  </li>
                  <li>
                     <a href="#">Terms of Use</a>
                  </li>
                  <li>
                     <a href="#">Portfolio</a>
                  </li>
                  <li>
                     <a href="faq.php">Faq</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-lg-4 col-md-8">
            <div class="footer-card">
               <div class="footer-head">
                  <h4>Our Newsletter</h4>
               </div>
               <ul>
                  <li>
                     Subscribe to the weekly newsletter for all the latest updates and get a 10% of bill offer.
                  </li>
               </ul>
               <div class="subscribe-footer">
                  <input type="text" placeholder="Enter your email address" class="form-control subBtn"/>
                  <div class="subscribeBtn">
                     Subscribe
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <div class="copyright">
      <div class="container">
         <ul>
            <li>
            <p>Copyright © 2024 <a href="#">Tripledots Software Services Pvt. Ltd</a>. All rights reserved</p>
            </li>
            <li>
               <div class="payment-gateway">
                  <ul>
                     <li>
                        <a href="#">
                           <img src="./images/visa-card.png" alt="payment card">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img src="./images/paypal-card.png" alt="payment card">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img src="./images/express-card.png" alt="payment card">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img src="./images/discover-card.png" alt="payment card">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img src="./images/master-card.png" alt="payment card">
                        </a>
                     </li>
                  </ul>
               </div>
            </li>
         </ul>
      </div>
   </div>
</footer>
      <button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top"><i class="fa-solid fa-arrow-up"></i></button>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('js/scripts.js') }}"></script>
      <script src="{{ asset('js/wow.min.js') }}"></script> 
</html>