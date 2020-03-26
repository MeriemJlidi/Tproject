flexFont = function () {
    var aTags = document.getElementsByTagName("a");
    for(var i = 0; i < aTags.length; i++) {
        var relFontsize = aTags[i].offsetWidth*0.05;
        aTags[i].style.fontSize = relFontsize+'px';
    }
};

window.onload = function(event) {
    flexFont();
};
window.onresize = function(event) {
    flexFont();
};
