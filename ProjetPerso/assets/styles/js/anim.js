export {HoverZoom};
export {FadeInDown};

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


// Ajouter une animation au titre "Prochains matchs"
function FadeInDown() {
    // Récupération de l'élément à animer
    const title = document.querySelectorAll('.appear');
    
    for(let i=0; i< title.length;i++){
        // Ajout de la classe "animate__animated" pour activer les animations CSS
        title[i].classList.add('animate__animated');
    
        // Ajout de la classe "animate__fadeInDown" pour l'animation fade in down
        title[i].classList.add('animate__fadeInDown');
    }
}