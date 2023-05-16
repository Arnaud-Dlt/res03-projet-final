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

// export class Contact {
//     firstName;
//     lastName;
//     email;
//     object;
//     message;

//     constructor(firstName = "", lastName = "", email = "", object = "", message = "") {
//         this.firstName = firstName;
//         this.lastName = lastName;
//         this.email = email;
//         this.object = object;
//         this.message = message;
//     }

//     get firstName () {
//       return this.firstName;
//     }

//     set firstName (firstName) {
//         this.firstName = firstName;
//     }

//     get lastName () {
//         return this.lastName;
//     }

//     set lastName (lastName) {
//         this.lastName = lastName;
//     }

//     get email () {
//         return this.email;
//     }

//     set email (email) {
//         this.email = email;
//     }

//     get object () {
//         return this.object;
//     }

//     set object (object) {
//         this.object = object;
//     }

//     get message () {
//         return this.message;
//     }

//     set message (message) {
//         this.message = message;
//     }

//     validate() {
//         if(this.checkFirstName() === true &&
//         this.checkLastName() === true &&
//         this.checkEmail() === true &&
//         this.checkObject() === true &&
//         this.checkMessage() === true)
//         {
//             return true;
//         }
//         else
//         {
//             return false;
//         }
//     }


//     checkFirstName() {
//         if (this.contactFirstname.length > 2) {
//             return true;
//         }
//         else {
//             return false;
//         }
//     }

//     checkLastName() {
//         if (this.contactLastname.length > 2) {
//             return true;
//         }
//         else {
//             return false;
//         }
//     }

//     checkEmail() {
//         if (this.contactEmail !== '') {
//             return true;
//         }
//         else {
//             return false;
//         }
//     }
    
//     checkObject() {
//         if (this.contactObject.length > 15) {
//             return true;
//         }
//         else {
//             return false;
//         }
//     }
    
//     checkMessage() {
//         if (this.contactMessage.length > 15) {
//             return true;
//         }
//         else {
//             return false;
//         }
//     }
// }