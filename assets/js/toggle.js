var toggleValue = document.getElementById("lang-toggle-value");
var toggleHandler = document.getElementById("lang-toggle-handler");
var toggleContainer = document.getElementById("lang-toggle-container");
var translateTitle = document.getElementById("toggle-titel");
var translateParagraph = document.getElementById("toggle-paragraph");

var toggled = false;
var loopAnimation = true;

window.addEventListener("load", () => {
    setInterval(function() {
        if (loopAnimation == true) {
            if(toggled == false) {
                toggleHandler.style.left = 53.75 + "%";
                toggleValue.classList.add("orange-text");
                toggleValue.classList.remove("pink-text");
                toggleValue.innerHTML = "Hello";
                translateTitle.innerHTML ="Title";
                translateParagraph.innerHTML ="Text to translate";
        
                toggled = true;
            } else {
                toggleHandler.style.left = 0 + "px";
                toggleValue.classList.remove("orange-text");
                toggleValue.classList.add("pink-text");
                toggleValue.innerHTML = "Hej";
                translateTitle.innerHTML ="Titel";
                translateParagraph.innerHTML ="Tekst der oversættes";
        
                toggled = false;
            }
        }
    }, 2000);
    
});

toggleContainer.addEventListener("click", () => {
    console.log("click");
    if(toggled == false) {
        loopAnimation = false;
        toggleHandler.style.left = 53.75 + "%";
        toggleValue.classList.add("orange-text");
        toggleValue.classList.remove("pink-text");
        toggleValue.innerHTML = "Hello";
        translateTitle.innerHTML ="Title";
        translateParagraph.innerHTML ="Text to translate";

        toggled = true;
    } else {
        loopAnimation = false;
        toggleHandler.style.left = 0 + "px";
        toggleValue.classList.remove("orange-text");
        toggleValue.classList.add("pink-text");
        toggleValue.innerHTML = "Hej";
        translateTitle.innerHTML ="Titel";
        translateParagraph.innerHTML ="Tekst der oversættes";

        toggled = false;
    }
    
});

