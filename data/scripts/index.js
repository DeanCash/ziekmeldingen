const origGradient  = "linear-gradient(90deg, rgba(160,197,166,1) 15%, rgba(71,113,103,1) 85%)";
const darkGradient  = "linear-gradient(90deg, rgb(55, 80, 95) 15%, rgb(54, 54, 73) 85%)";
const backGrounds = document.querySelectorAll("body");

backGrounds.forEach(e => {
    e.style.background = window.localStorage.backgroundColor;
})





console.log("Website Loaded!");

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

// button toggle function for the background color - saves the background color
// in the local storage so it saves across all pages
function toggleBgColor() {
    if (window.localStorage.backgroundColor) {
        backGrounds.forEach(e =>
        {
            var isDark = window.localStorage.backgroundColor == darkGradient;
            window.localStorage.backgroundColor = isDark ? origGradient : darkGradient;
            e.style.background = window.localStorage.backgroundColor;
        })

    } else {
        window.localStorage.backgroundColor = origGradient;
        backGrounds.forEach(e => {
            e.style.background = window.localStorage.backgroundColor;
        })
    }
}
