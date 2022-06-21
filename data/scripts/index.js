console.log("Website Loaded!");

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

let toggle = true;
const origGradient = "linear-gradient(160deg, rgba(160,197,166,1) 15%, rgba(71,113,103,1) 85%)";
const darkGradient = "linear-gradient(160deg, rgb(55, 80, 95) 15%, rgb(54, 54, 73) 85%)";

function toggleBgColor() {
    let background = document.querySelector(".background");
    if (toggle) {
        background.style.background = darkGradient;
        toggle = false;
    } else {
        background.style.background = origGradient;
        toggle = true;
    }
}
