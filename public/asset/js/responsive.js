document.addEventListener("DOMContentLoaded", function(){

var menu = document.getElementsByTagName('img')[1];
console.log(menu);
var nav = document.getElementsByTagName('nav')[0];
console.log(nav);

menu.addEventListener('click', voir);

function voir() {
    console.log('je veux un burger ;)');

    if( nav.style.visibility == "visible"){
        nav.style.visibility = "hidden";
        menu.src = "asset/img/burger.png";
    }else{
        nav.style.visibility = "visible";
        menu.src = "asset/img/fermer.png";
    }
}

});