function changeView(page) {

    buttons = document.getElementsByClassName("nav-button");
    //console.log(buttons);
    buttons = Array.from(buttons);

    buttons.forEach(element => {
        ///console.log(element);
        variabel = element.getAttribute("data-active")
        //console.log(variabel);
        if (variabel == "true") {
            id = element.getAttribute("id");
            document.getElementById(id).setAttribute("data-active", "false");
        }
    });

    pages = document.getElementsByClassName("content-page");
    //console.log(buttons);
    pages = Array.from(pages);

    pages.forEach(element => {
        ///console.log(element);
        variabel = element.getAttribute("data-active")
        //console.log(variabel);
        if (variabel == "true") {
            id = element.getAttribute("id");
            document.getElementById(id).setAttribute("data-active", "false");
        }
    });


    button = document.getElementById(page+"-button");
    showPage = document.getElementById(page+"-page");
    
    button.setAttribute("data-active", "true");
    showPage.setAttribute("data-active", "true");
}

function checkURL() {
    URL = window.location.hash;
    if (URL != "") {
        URL = URL.substr(1);
        changeView(URL);
    } else {
        changeView("home");
    }

}

//document.onload = checkURL();
document.addEventListener("DOMContentLoaded", function(event) { 
    checkURL()
  });