import Contact from "./contact.js";

window.addEventListener("DOMContentLoaded", function(){
   let form = document.getElementById("contactForm");

   form.addEventListener("submit", function(event){

       let contact = new Contact();

       contact.firstName = document.getElementById("contactFirstname").value;
       contact.lastName = document.getElementById("contactLastname").value;
       contact.email = document.getElementById("contactEmail").value;
       contact.object = document.getElementById("contactObject").value;
       contact.message = document.getElementById("contactMessage").value;

       if(!contact.validate())
       {
           event.preventDefault(); // empecher la soumission
           
           // afficher une erreur sur le formulaire
           alert('Les champs ne sont pas bien remplis');
           
       }
       else
       {
           alert('Votre message a bien été envoyé !'); // afficher un message de succès dans le formulaire
       }
   });

});