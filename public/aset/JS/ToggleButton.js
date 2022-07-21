let sidebarToggle = document.querySelector(".sidebarToggle");


sidebarToggle.addEventListener("click", function(){
    document.getElementById("sidebarToggle").classList.toggle("active");
    document.querySelector("body").classList.toggle("active");
})