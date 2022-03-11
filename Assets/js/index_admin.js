
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
  }else{
    $("#sector-lot").prop("disabled", true);
  }
})
$("#sector-lot").change(function(){
  mouseClick();
  if($(this).val()!=""){
    $("#block-lot").prop("disabled", false);
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

