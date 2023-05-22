function checkContactForm() {
    let contactForm = document.querySelector('#contactForm');

    contactForm.addEventListener('submit', function(e) {

        let contactFirstname = document.querySelector('#contactFirstname').value.trim();
        let contactLastname = document.querySelector('#contactLastname').value.trim();
        let contactEmail = document.querySelector('#contactEmail').value.trim();
        let contactMessage = document.querySelector('#contactMessage').value.trim();

        if (contactFirstname.length < 2) {
            alert('Votre prénom doit faire au moins 2 caractères.');
            e.preventDefault();
            return;
        }
        
        if (contactLastname.length < 2) {
            alert('Votre nom doit faire au moins 2 caractères.');
            e.preventDefault();
            return;
        }

        if (contactEmail === '') {
            alert('Veuillez renseigner votre email.');
            e.preventDefault();
            return;
        }

        if (contactMessage.length < 15) {
            alert('Votre message doit faire au moins 15 caractères.');
            e.preventDefault();
            return;
        }

        // Si toutes les vérifications sont ok, on peut soumettre le formulaire
        alert('Votre message a bien été envoyé !');
        contactForm.submit();
    });

}

export {checkContactForm};

