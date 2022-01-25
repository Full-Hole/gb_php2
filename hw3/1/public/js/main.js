
"use strict"
//let x = document.getElementsByClassName('gallery-item');
let viewport = document.querySelector('.viewport');
//let lWidth = window.screen.width
// document.addEventListener('.gallery-item');
 let imgList = document.querySelectorAll(".gallery-img");

viewport.src=imgList[0].src;
 imgList.forEach(img => img.addEventListener('mouseover', switchImg))
//console.log(x);


function switchImg(event){
    viewport.src=event.target.src;
}

viewport.addEventListener('click', fullview);

function fullview(event){
    let gallery_viewport = event.path[2];
    let viewport_wraper = event.path[1];
    gallery_viewport.classList.toggle("gallery-viewport-fullscreen");
    viewport_wraper.classList.toggle("vieport-wrapper");
    viewport_wraper.classList.toggle("vieport-wrapper-fullscreen");

    //console.log(gallery_viewport);
}

