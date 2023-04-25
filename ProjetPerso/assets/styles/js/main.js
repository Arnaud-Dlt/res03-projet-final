
window.addEventListener("DOMContentLoaded",function(){
    
    openAndCloseAsideMenu();
})

/**
 *  Function qui permettra d'ouvrir et fermer le menu aside en cliquant sur le boutton
 */
function openAndCloseAsideMenu(){
    let sideMenuBtn = document.querySelector('.sideMenu-btn');
    let asideMenu = document.querySelector('.sideMenu');
    let sideMenuMobileBtn = document.querySelector('.sideMenuMobile-btn');
    let asideMenuMobile = document.querySelector('.sideMenuMobile');

    sideMenuBtn.addEventListener('click', function(){
        sideMenuBtn.classList.toggle('active');
        asideMenu.classList.toggle('active');
    })

    sideMenuMobileBtn.addEventListener('click', function(){
        sideMenuMobileBtn.classList.toggle('active');
        asideMenuMobile.classList.toggle('active');
    })
    
}

export { openAndCloseAsideMenu };