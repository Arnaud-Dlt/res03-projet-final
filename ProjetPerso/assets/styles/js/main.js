window.addEventListener("DOMContentLoaded",function(){
    HoverZoom();
});


function HoverZoom(){
    let hoverZoom = document.getElementsByClassName("hoverZoom");
    
    for(let i=0; i< hoverZoom.length;i++){
        hoverZoom[i].addEventListener("mouseenter", function(){
        hoverZoom[i].style.transform = "scale(1.03)";
    });
    hoverZoom[i].addEventListener("mouseleave", function(){
        hoverZoom[i].style.transform = "scale(1)";
    });
    }
}