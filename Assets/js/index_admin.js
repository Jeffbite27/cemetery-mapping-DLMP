
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
$("#dead-relative, #dead-relative-surname").keyup(function(){
  var relative = $("#dead-relative").val();
  var relative_surname = $("#dead-relative-surname").val();
  $.ajax({
    url: "queries/relativeCheck.php",
    type: "post",
    data: {relative:relative, relative_surname:relative_surname},
    success:function(data){
      $("#relative-error").html(data);
    }
  })
})
$(document).ready( function () {
  $("#tbl-customer").DataTable({
    "responsive": true
  });
  $("#tbl-owners-info").DataTable({
    "responsive": true
  })
})
  $(".customer-site").load("queries/customer-site.php");

$(".customer-site").change(function(){
  var id=$(this).attr("data-id");
  $(".customer-sector").prop("disabled", false);
  $(".customer-sector").focus();
  $("#customer-lawn-type-"+id).val("");
})
$(".customer-sector").change(function(){
  var id=$(this).attr("data-id");
  customer_block();
  $(".customer-block").prop("disabled", false);
  $(".customer-block").focus();
  $(".customer-block").html("<option value='' selected disabled>Select Block</option>");
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
$(".customer-block").change(function(){
  var id=$(this).attr("data-id");
  customer_lot();
  $(".customer-lot").prop("disabled", false);
  $(".customer-lot").focus();
  $(".customer-lot").html("<option value='' selected disabled>Select Lot</option>");
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
// ----------------------------BLOCK AND LOT PAGE-------------------------------------
$(document).ready( function () {
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
  $("#sites-tab").addClass("active");
  $("#sites").addClass("active");
  $('button[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(this).attr('id'));
  });

  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('#myTab button[id="' + activeTab + '"]').tab('show');
  }
})