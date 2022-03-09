var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    effect: "fade",
    speed: 2000,
    autoplay: {
      delay: 10000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });


  var contentCard = document.querySelectorAll('.content-card');
  var buttonload = document.querySelector('.loadmorebtn');
  var buttonless = document.querySelector('.loadlessbtn');

  var currentback;
  var current = 3;
  buttonload.addEventListener('click', function(){
      
      for(var i = current; i < current + 3; i++){
        if(contentCard[i]){
          contentCard[i].style.display='block';
        }
      }
      current+=3;
      currentback = current;

      if(current<=contentCard.length){
        buttonload.style.display='block';
        buttonless.style.display='none';
      }

      if(current>=contentCard.length){
        buttonload.style.display='none';
        buttonless.style.display='block';
      }

  })

 

  buttonless.addEventListener('click', function(){

    for(var i = currentback; i >= currentback -3 ; i--){
      if(contentCard[i]){
        contentCard[i].style.display='none';
      }
    }
    current-=3;

    
    if(current<=contentCard.length){
      buttonload.style.display='block';
      buttonless.style.display='none';
    }
  })



  // ---------------------------------LOG IN----------------------------------------------
 $(document).on('submit', '.login-form', function(e){
  e.preventDefault();

  $.post("queries/login.php", $(this).serialize(), function(data){
    $("#notif").html(data);
    window.history.replaceState( null, null, window.location.href );
  })
 });