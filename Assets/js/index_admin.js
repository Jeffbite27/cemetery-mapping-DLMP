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
  $('#tbl-customer').DataTable({
    "responsive": true
  });
})
