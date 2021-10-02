/***************************************banniere***************************************** */
var img = document.getElementsByTagName('img');
console.log(img);


mesImages = 1;


var timer = window.setInterval(changeImage, 4000);


function changeImage() {
    console.log('le timer demarre !');

    mesImages += 1;

    if (mesImages == 5){
        mesImages = 1;
    }
     img[3].src = 'asset/imgjs/' + mesImages + '.jpg';
}
/**********banniere-slider************* */
document.addEventListener("DOMContentLoaded", function(){

    var card = document.getElementsByTagName('div')[4];
    console.log(card);
    var div1 = document.getElementsByTagName('div')[5];
    console.log(div1);
    var croix = document.getElementsByTagName('img')[9];
    console.log(croix);
    
    var card1 = document.getElementsByTagName('div')[6];
    console.log(card1);
    var div2 = document.getElementsByTagName('div')[7];
    console.log(div2);
    var croix1 = document.getElementsByTagName('img')[12];
    console.log(croix1);
    
    var card2 = document.getElementsByTagName('div')[8];
    console.log(card2);
    var div3 = document.getElementsByTagName('div')[9];
    console.log(div3);
    var croix2 = document.getElementsByTagName('img')[15];
    console.log(croix2);
    
    var card3 = document.getElementsByTagName('div')[10];
    console.log(card3);
    var div4 = document.getElementsByTagName('div')[11];
    console.log(div4);
    var croix3 = document.getElementsByTagName('img')[18];
    console.log(croix3);
    
    card.addEventListener('click', affiche);
    croix.addEventListener('click', ferme);
    
    card1.addEventListener('click', affiche1);
    croix1.addEventListener('click', ferme1);
    
    card2.addEventListener('click', affiche2);
    croix2.addEventListener('click', ferme2);
    
    card3.addEventListener('click', affiche3);
    croix3.addEventListener('click', ferme3);
    
    function affiche(){
        console.log("affiche");
        div1.style.visibility = 'visible';
    }
    function ferme() {
        console.log("ferme");
        div1.style.visibility = 'hidden';
    }
    function affiche1(){
        console.log("affiche");
        div2.style.visibility = 'visible';
    }
    function ferme1() {
        console.log("ferme");
        div2.style.visibility = 'hidden';
    }
    function affiche2(){
        console.log("affiche");
        div3.style.visibility = 'visible';
    }
    function ferme2() {
        console.log("ferme");
        div3.style.visibility = 'hidden';
    }
    function affiche3(){
        console.log("affiche");
        div4.style.visibility = 'visible';
    }
    function ferme3() {
        console.log("ferme");
        div4.style.visibility = 'hidden';
    }






});