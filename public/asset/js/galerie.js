document.addEventListener("DOMContentLoaded", function(){

 var image = document.getElementsByTagName('div')[4];
 console.log(image);
 var image2 = document.getElementsByTagName('div')[5];
 console.log(image2);
 var image3 = document.getElementsByTagName('div')[6];
 console.log(image3);
 var image4 = document.getElementsByTagName('div')[7];
 console.log(image4);
 var image5 = document.getElementsByTagName('div')[8];
 console.log(image5);
 var image6 = document.getElementsByTagName('div')[9];
 console.log(image6);
 var image7 = document.getElementsByTagName('div')[10];
 console.log(image7);
 var image8 = document.getElementsByTagName('div')[11];
 console.log(image8);
 var image9 = document.getElementsByTagName('div')[12];
 console.log(image9);
 var image10 = document.getElementsByTagName('div')[13];
 console.log(image10);
 var image11 = document.getElementsByTagName('div')[14];
 console.log(image11);
 var image12 = document.getElementsByTagName('div')[15];
 console.log(image12);
 var image1 = document.getElementsByTagName('img');
 console.log(image1);
 var suiv = document.getElementsByTagName('img')[5];
 console.log(suiv);
 var preced = document.getElementsByTagName('img')[3];
 console.log(preced);
 var croix = document.getElementsByTagName('img')[6];
 console.log(croix);
 var div = document.getElementsByTagName('div')[3];
 console.log(div);

 var numImg = 1;

 
 suiv.addEventListener('click', suivImg);
 preced.addEventListener('click', precedImg);
 image.addEventListener('click', ouvreImg);
 image2.addEventListener('click', ouvreImg);
 image3.addEventListener('click', ouvreImg);
 image4.addEventListener('click', ouvreImg);
 image5.addEventListener('click', ouvreImg);
 image6.addEventListener('click', ouvreImg);
 image7.addEventListener('click', ouvreImg);
 image8.addEventListener('click', ouvreImg);
 image9.addEventListener('click', ouvreImg);
 image10.addEventListener('click', ouvreImg);
 image11.addEventListener('click', ouvreImg);
 image12.addEventListener('click', ouvreImg);

 croix.addEventListener('click', fermeImg);

 
 
 function suivImg(){
     console.log('demarre');
     numImg += 1;
     if(numImg == 13){
         numImg = 1;
     }
     image1[4].src= '../asset/imgjsGal/' + numImg + '.jpg';
 }
 function precedImg(){
     console.log('demarre');
     numImg = numImg-1;
     if (numImg == 0){
         numImg = 12;
     }
     image1[4].src= '../asset/imgjsGal/' + numImg + '.jpg';

}
 
 function ouvreImg() {
    console.log('ouvre');

    div.style.visibility = 'visible';

}

 function fermeImg() {
     console.log('ferme');

     div.style.visibility = 'hidden';

 }

});