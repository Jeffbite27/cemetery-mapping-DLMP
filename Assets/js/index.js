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
//USER MAP
$(document).ready(function(){
  $("#search").keyup(function(){
    var search = $(this).val();
    if(search==""){
      $("#tbl-deceased-persons").html("<tr><td colspan=4 class=text-center>Search to generate data</td></tr>");
    }else{
      $.ajax({
        url: "queries/find-deceased-persons.php",
        method: "post",
        data: {search:search},
        success:function(data){
          $("#tbl-deceased-persons").html(data);
        }
      })
    }
    
  });
  // $("#tbl-find-map").DataTable({
  //   responsive: true,
  //  });
})

$(".btn-reset-view-location").click(function(){
    $(".lot_info").html("");
  })
$(".btn-reset-view-map").click(function(){
    $(".lot_info").html("");
    $(".rdo-occupied").prop("checked", false);
    $(".rdo-owned").prop("checked", false);
})
$(".btn-view-location").click(function () {
    var sector = $(this).attr("data-sector");
    var site_name = $(this).attr("data-site");
    var block_name = $(this).attr("data-block");
    var lot_name = $(this).attr("data-lot");
    $.ajax({
      url: "queries/view-location.php",
      method: "post",
      data: {
        sector: sector,
        site_name: site_name,
        block_name: block_name,
        lot_name: lot_name,
      },
      success: function (data) {
        $(".lot_info").html(data);
      },
    });
});
$(".rdo-occupied").click(function () {
    var site_name = $(this).attr("data-site");
    var sector = $(this).attr("data-sector");

    $.ajax({
      url: "queries/occupied-lots.php",
      method: "post",
      data: { site_name: site_name, sector: sector },
      success: function (data) {
        $(".lot_info").html(data);
      },
    });
});
$(".rdo-owned").click(function () {
    var site_name = $(this).attr("data-site");
    var sector = $(this).attr("data-sector");

    $.ajax({
      url: "queries/owned-lots.php",
      method: "post",
      data: { site_name: site_name, sector: sector },
      success: function (data) {
        $(".lot_info").html(data);
      },
    });
});

// DEFAULT HIDE
$("#sectorMap").hide();
$("#miniMap2").hide();

// SWTICH MAP TOGGLE
$("#switchMap").click(function(){
  $("#miniMap").toggle();
  $("#sectorMap").toggle();
  $("#miniMap2").toggle();
  $("#sectorMap2").toggle();
})

  






