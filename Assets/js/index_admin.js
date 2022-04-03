
var tooltipTriggerList = [].slice.call(document.querySelectorAll("[data-bs-toggle='tooltip']"))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});

const tabs = document.querySelectorAll(".tabs");
const contents = document.querySelectorAll(".content");


tabs.forEach((tab, index)=>{
  tab.addEventListener("click",()=>{
    tabs.forEach((tab) => tab.classList.remove("active"));


    tab.classList.add("active");

    contents.forEach((c) => c.classList.remove("active")); 
    contents[index].classList.add("active");
  })
})

// ----------------------------CUSTOMER PAGE-------------------------------------
$(document).ready( function () {
  $("#tbl-customer").DataTable({
    "responsive": true
  });
})
  $(".customer-site").load("queries/customer-site.php");

$(".customer-site").change(function(){
  var id=$(this).attr("data-id");
  $(".customer-sector").prop("disabled", false);
  $(".customer-sector").focus();
  $("#customer-lawn-type-"+id).val("");
})
function customer_block(){
  $(".customer-block").one('click', function(){
    var id=$(this).attr("data-id");
    var site_id = $("#customer-site-"+id).val();
    var sector = $("#customer-sector-"+id).val();
    $.ajax({
      url: "queries/customer-block.php",
      method: "post",
      data: {site_id:site_id, sector:sector},
      success: function(data){
        $("#customer-block-"+id).append(data);
      }
    })
  })
}
$(".customer-sector").change(function(){
  var id=$(this).attr("data-id");
  customer_block();
  $(".customer-block").prop("disabled", false);
  $(".customer-block").focus();
  $(".customer-block").html("<option value='' selected disabled>Select Block</option>");
  $("#customer-lawn-type-"+id).val("");
})
function customer_lot(){
  $(".customer-lot").one('click', function(){
    var id=$(this).attr("data-id");
    var site_id = $("#customer-site-"+id).val();
    var block = $("#customer-block-"+id).val();
    $.ajax({
      url: "queries/customer-lot.php",
      method: "post",
      data: {site_id:site_id, block:block},
      success: function(data){
        $("#customer-lot-"+id).append(data);
      }
    })
  })
}
$(".customer-block").change(function(){
  var id=$(this).attr("data-id");
  customer_lot();
  $(".customer-lot").prop("disabled", false);
  $(".customer-lot").focus();
  $(".customer-lot").html("<option value='' selected disabled>Select Lot</option>");
  $("#customer-lawn-type-"+id).val("");
})
$(".customer-lot").change(function(){
  $(".owner-deed-sale").focus();
  var id=$(this).attr("data-id");
  var lot_id=$(this).val();
  var site_id=$("#customer-site-"+id).val();
  var block_id=$("#customer-block-"+id).val();
  $.ajax({
    url: "queries/customer-lawn-type.php",
    method: "post",
    data: {lot_id:lot_id},
    success: function(data){
      $("#customer-lawn-type-"+id).val(data);
    }
  })
  $.ajax({
    url: "queries/lot-check.php",
    method: "post",
    data: {site_id:site_id, block_id:block_id, lot_id:lot_id},
    success: function(data){
      $("#lot-warning-"+id).html(data);
    }
  })
})

$(".btn-reset-owner").click(function(){
  var id=$(this).attr("data-id");
  $(".customer-sector").prop("disabled", true);
  $(".customer-block").prop("disabled", true);
  $(".customer-lot").prop("disabled", true);
  $(".lot-warning").html("");
})
$(".close-owner-lot").click(function(){
  $(".customer-sector").prop("disabled", true);
  $(".customer-block").prop("disabled", true);
  $(".customer-lot").prop("disabled", true);
  $(".lot-warning").html("");
})
// ----------------------------BLOCK AND LOT PAGE-------------------------------------
$(document).ready( function () {
  $("button.block-setup[data-bs-toggle='tab']").on('shown.bs.tab', function (e) {
    $($.fn.dataTable.tables(true)).DataTable()
       .columns.adjust()
       .responsive.recalc();
  });
  $("#tbl-site-info").DataTable({
    "responsive": true
  })
  $("#tbl-block-info").DataTable({
    "responsive": true
  })
  $("#tbl-lot-info").DataTable({
    "responsive": true
  })
})
$("#site-lot").change(function(){
  if($(this).val()!=""){
    $("#sector-lot").prop("disabled", false);
    $("#sector-lot").focus();
  }else{
    $("#sector-lot").prop("disabled", true);
  }
})
$("#sector-lot").change(function(){
  mouseClick();
  if($(this).val()!=""){
    $("#block-lot").prop("disabled", false);
    $("#block-lot").focus();
    $("#block-lot").html("<option value='' selected disabled>Select Block</option>");
  }else{
    $("#block-lot").prop("disabled", true);
  }
})
$("#btn-reset-lot").click(function(){
  $("#block-lot").prop("disabled", true);
  $("#sector-lot").prop("disabled", true);
})
function mouseClick(){
  $(document).one('click', '#block-lot', function(e){
    e.preventDefault();
    var site_id=$("#site-lot").val();
    var sector=$("#sector-lot").val();
    $.ajax({
      url: "queries/block-select.php",
      method: "post",
      data: {site_id:site_id, sector:sector},
      success:function(data){
        $("#block-lot").append(data);
      }
    })
  })
}
$(document).ready(function(){
  $('#myTab button[id="sites-tab"]').tab('show');
  $('button.block-setup[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(this).attr('id'));
  });

  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('#myTab button[id="' + activeTab + '"]').tab('show');
  }
})
// ----------------------------INTERNMENT PAGE-------------------------------------
$(document).ready(function(){
  $("button.internments[data-bs-toggle='tab']").on('shown.bs.tab', function (e) {
    $($.fn.dataTable.tables(true)).DataTable()
       .columns.adjust()
       .responsive.recalc();
  });
  $("#tbl-lot-owners").DataTable({
    "responsive": true
  })
  $("#tbl-deads").DataTable({
    "responsive": true
  })
  $('button.internments[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('internmentTab', $(this).attr('id'));
  });
  var internment = localStorage.getItem('internmentTab');
  if(internment=="internment-setup"){
    $("#internment-setup").tab('show');
  }else if(internment=="internment-table"){
    $("#internment-table").tab('show');
  }else{
    $("#internment-setup").tab('show');
  }
  $(".edit-customer-site").one("click", function(){
    var lot_owner_id=$(this).attr("data-id");
    $.ajax({
      url: "queries/lot-owner-site.php",
      method: "post",
      data: {lot_owner_id:lot_owner_id},
      success:function(data){
        $("#edit-customer-site-"+lot_owner_id).html(data);
      }
    })
  })
  $(".edit-customer-sector").click(function(e){
    e.preventDefault();
    lot_owner_block();
  })
  function lot_owner_block(){
    $(".edit-customer-block").one("click", function(){
      var lot_owner_id=$(this).attr("data-id");
      var sector=$("#edit-customer-sector-"+lot_owner_id).val();
      var site_id=$("#edit-customer-site-"+lot_owner_id).val();
      $.ajax({
        url: "queries/lot-owner-block.php",
        method: "post",
        data: {lot_owner_id:lot_owner_id, sector:sector, site_id:site_id},
        success:function(data){
          $("#edit-customer-block-"+lot_owner_id).html(data);
        }
      })
    })
  }
  $(".edit-customer-block").click(function(e){
    e.preventDefault();
    lot_owner_lot();
  });
  function lot_owner_lot(){
    $(".edit-customer-lot").one("click", function(){
      var lot_owner_id=$(this).attr("data-id");
      var sector=$("#edit-customer-sector-"+lot_owner_id).val();
      var site_id=$("#edit-customer-site-"+lot_owner_id).val();
      var block_id=$("#edit-customer-block-"+lot_owner_id).val();
      $.ajax({
        url: "queries/lot-owner-lot.php",
        method: "post",
        data: {lot_owner_id:lot_owner_id, sector:sector, site_id:site_id, block_id:block_id},
        success:function(data){
          $("#edit-customer-lot-"+lot_owner_id).html(data);
        }
      })
    })
  }
  $(".edit-customer-lot").change(function(e){
    e.preventDefault();
    var lot_owner_id=$(this).attr("data-id");
    var lot_id=$("#edit-customer-lot-"+lot_owner_id).val();
    $.ajax({
      url: "queries/lot-owner-lawn-type.php",
      method: "post",
      data: {lot_owner_id:lot_owner_id, lot_id:lot_id},
      success:function(data){
        $("#edit-customer-lawn-type-"+lot_owner_id).val(data);
      }
    })
  })
  
})
// ----------------------------GRAVE MAP PAGE-------------------------------------
$(document).ready(function(){
  $("button.grave-maps[data-bs-toggle='tab']").on('shown.bs.tab', function (e) {
    $($.fn.dataTable.tables(true)).DataTable()
       .columns.adjust()
       .responsive.recalc();
  });
  $("#tbl-find-map").DataTable({
    "responsive": true
  })
  $('button.grave-maps[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('gravemapTab', $(this).attr('id'));
  });
  var grave_map = localStorage.getItem('gravemapTab');
  if(grave_map=="find-grave-btn"){
    $("#find-grave-btn").tab('show');
  }else if(grave_map=="view-map-btn"){
    $("#view-map-btn").tab('show');
  }else{
    $("#find-grave-btn").tab('show');
  }
  
  $(".btn-sectors, .btn-view-location").click(function(){
    var sector=$(this).attr("data-sector");
    var site_name=$(this).attr("data-site");
    $.ajax({
      url: "queries/map-select-lots.php",
      method: "post",
      data: {sector:sector, site_name:site_name},
      success:function(data){
        $(".lot_info").html(data);
      }
    })
  })
})