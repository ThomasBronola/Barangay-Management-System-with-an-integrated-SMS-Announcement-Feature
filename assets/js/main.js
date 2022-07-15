function redirect_Page () {
    var tID = setTimeout(function () {
        window.location.href = "../layouts/register.php";
        window.clearTimeout(tID);		// clear time out.
    }, 0);
}

function upd(){
    const element = document.getElementById("myBtn");
    element.addEventListener("click", function() {
      document.getElementById("clickUpd").click();
    });
    
}
