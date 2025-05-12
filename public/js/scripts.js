
$('#sliderImage').owlCarousel({
  loop:true,
  items:1,
  margin:10,
  nav:true,
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:true,
 dots:false,


})

$('#sliderDetails').owlCarousel({
  loop:true,
  items:1,
  margin:10,
  nav:true,
 autoplay:true,
 autoplayTimeout:3000,
 autoplayHoverPause:true,
 dots:false,


})
$('#outer-mybussiness').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  dots:true,
  responsive:{
      0:{
          items:1
      },
      376:{
        items:2
    },
      768:{
          items:3
      },
      992:{
        items:3
    },
      1200:{
        items:4
    },
     
  }
})
let mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
  mybutton.style.display = "block";
} else {
  mybutton.style.display = "none";
}
}
function topFunction() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}
$('#bestoffer').owlCarousel({
loop:true,
margin:20,
dots:false,
nav:true,
responsive:{
    0:{
        items:1
    },
    600:{
      items:2
  },
    768:{
        items:3
    },
    1200:{
        items:4
    }
}
})
$('#cd-exclusive').owlCarousel({
loop:true,
margin:20,
dots:false,
nav:true,
responsive:{
    0:{
        items:1
    },
    600:{
        items:3
    },
    1000:{
        items:4
    }
}
})
$('#popleoffer').owlCarousel({
loop:true,
margin:20,
dots:false,
nav:true,
responsive:{
    0:{
        items:1
    },
    600:{
        items:3
    },
    1000:{
        items:4
    }
}
})
$('#bigOffer').owlCarousel({
loop:true,
margin:20,
nav:true,
autoplay:true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
responsive:{
    0:{
        items:2
    },
    600:{
        items:3
    },
    1000:{
        items:4
    }
    
}
})
$('#testimonial').owlCarousel({
  loop: true,
  center: true,
  items: 3,
  margin: 10,
  nav:true,
  autoplay:true,
 autoplayTimeout:1000,
 autoplayHoverPause:true,
  responsive: {
    0: {
      items: 1
    },
    768: {
      items: 2
    },
    992: {
      items: 3
    },
    1200: {
      items: 3
    }
  }
});
$('#testimonial-right').owlCarousel({
items:3,
loop:true,
margin:10,
dots:false,
nav:false,
ltr:true,
autoplay:true,
smartSpeed: 8000,
animateIn: 'linear',
animateOut: 'linear',
responsive: {
  0: {
    items: 1
  },
  768: {
    items: 2
  },
  992: {
    items: 3
  },
  1200: {
    items: 3
  }
}
});
$('#testimonial-left').owlCarousel({
items:3,
// loop:true,
margin:10,
dots:false,
nav:false,
rtl:true, 
loop: true,
autoplay: true,
smartSpeed: 8000,
animateIn: 'linear',
animateOut: 'linear',
responsive: {
  0: {
    items: 1
  },
  768: {
    items: 2
  },
  992: {
    items: 3
  },
  1200: {
    items: 3
  }
}
});
// number
$(function() {
$('[data-decrease]').click(decrease);
$('[data-increase]').click(increase);
$('[data-value]').change(valueChange);
});

function decrease() {
var value = $(this).parent().find('[data-value]').val();
if(value > 1) {
  value--;
  $(this).parent().find('[data-value]').val(value);
}
}

function increase() {
var value = $(this).parent().find('[data-value]').val();
if(value < 100) {
  value++;
  $(this).parent().find('[data-value]').val(value);
}
}

function valueChange() {
var value = $(this).val();
if(value == undefined || isNaN(value) == true || value <= 0) {
  $(this).val(1);
} else if(value >= 101) {
  $(this).val(100);
}
}

function toggleNotifications() {
  var notificationList = document.getElementById("notificationList");
  notificationList.style.display = notificationList.style.display === "block" ? "none" : "block";
}

// // Close notification list when clicking outside
// document.addEventListener("click", function(event) {
//   var notificationList = document.getElementById("notificationList");
//   var button = document.querySelector(".notification-btn");

//   if (!button.contains(event.target) && !notificationList.contains(event.target)) {
//       notificationList.style.display = "none";
//   }
// });

$('#subscriptions').owlCarousel({
loop:true,
margin:10,
nav:false,
responsive:{
    0:{
        items:1
    },
    600:{
        items:2
    },
    1000:{
        items:3
    }
}
})


document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".addToFavorite-btn").forEach(button => {
      button.addEventListener("click", function () {
          let parkId = this.getAttribute("data-park");

          fetch(`${favoriteToggleUrl}/${parkId}`, {
              method: "POST",
              headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-TOKEN": csrfToken
              },
              body: JSON.stringify({ park_id: parkId }) // Sending data properly
          })
          .then(response => response.json())
          .then(data => {
              alert(data.message);
              location.reload();
          })
          .catch(error => console.error("Error:", error));
      });
  });

  document.querySelectorAll(".removeFavorite-btn").forEach(button => {
    button.addEventListener("click", function () {
        let parkId = this.getAttribute("data-park");

        if (confirm('Are you sure you want to remove this from favorites?')) {
            fetch(`${favoriteRemoveUrl}/${parkId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ park_id: parkId }) // Sending data properly
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload();
            })
            .catch(error => console.error("Error:", error));
        }
    });
});

});

