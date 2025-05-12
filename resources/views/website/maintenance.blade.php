
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
      <section class="underconstruction">
         <div class="container">
            <div class="error-404">
               <div class="row">
                  <div class="col-lg-7">
                     <div class="left-404">
                        <h3>COMING <span>SOON</span></h3>
                        <p class="page-size">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ea voluptatum magnam optio culpa maxime ipsa illo accusamus  temporibus quia.</p>
                        <div class="construction-time">
                           <div id="countdown">
                              <ul>
                                 <li><span id="days"></span>days</li>
                                 <li><span id="hours"></span>Hours</li>
                                 <li><span id="minutes"></span>Minutes</li>
                                 <li><span id="seconds"></span>Seconds</li>
                              </ul>
                           </div>
                        </div>
                        <a href="contact.php">Contact Us</a>
                     </div>
                  </div>
                  <div class="col-lg-5 d-none d-lg-block">
                     <div class="right-404">
                        <img src="./images/under-img.webp" alt="under-img image">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
         (function () {
           const second = 1000,
                 minute = second * 60,
                 hour = minute * 60,
                 day = hour * 24;
         
           //I'm adding this section so I don't have to keep updating this pen every year :-)
           //remove this if you don't need it
           let today = new Date(),
               dd = String(today.getDate()).padStart(2, "0"),
               mm = String(today.getMonth() + 1).padStart(2, "0"),
               yyyy = today.getFullYear(),
               nextYear = yyyy + 1,
               dayMonth = "09/30/",
               birthday = dayMonth + yyyy;
           
           today = mm + "/" + dd + "/" + yyyy;
           if (today > birthday) {
             birthday = dayMonth + nextYear;
           }
           //end
           
           const countDown = new Date(birthday).getTime(),
               x = setInterval(function() {    
         
                 const now = new Date().getTime(),
                       distance = countDown - now;
         
                 document.getElementById("days").innerText = Math.floor(distance / (day)),
                   document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                   document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                   document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
         
                 //do something later when date is reached
                 if (distance < 0) {
                   document.getElementById("headline").innerText = "It's my birthday!";
                   document.getElementById("countdown").style.display = "none";
                 
                   clearInterval(x);
                 }
                 //seconds
               }, 0)
           }());
         
               
      </script>
</body>
</html>