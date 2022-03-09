const primarynav = document.querySelector('.primary-nav');
const navtoggle = document.querySelector('.nav-toggle');

navtoggle.addEventListener('click', ()=>{
    const visibility = primarynav.getAttribute("data-visible");

    if (visibility === "false"){
        primarynav.setAttribute("data-visible", true);
        navtoggle.setAttribute("aria-expanded", true);
    }
    else if (visibility === "true"){
        primarynav.setAttribute("data-visible", false);
        navtoggle.setAttribute("aria-expanded", false);
    }


});

window.addEventListener("scroll", function(){
    var nav = document.querySelector(".primary-header")
    nav.classList.toggle("sticky", window.scrollY > 0);
});









