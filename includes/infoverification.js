console.log('JavaScript file loaded');
//déclaration des variables et obtentions des éléments html 
var enter = document.querySelector('.Entrer');
var errmessage = document.querySelector('.error');
var user = document.querySelector('#user');
var pass = document.querySelector('#pass');

//définition des expressions régulières pour l'email et le mot de pass
var Eregex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]{2,})$/;
var Pregex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9\W]).{8,}$/;

//ajouter un evenemnt pour le champ de l'eamil à chaque caractère saisie
user.addEventListener('keyup', function() {
    var isValidE = Eregex.test(user.value);
    if (isValidE)
        user.style.border = '1px solid green';
    else
        user.style.border = '1px solid red';
})

//ajouter un evenemnt pour le champ de mot de passe à chaque caractère saisie
pass.addEventListener('keyup', function() {
    var isValidP = Pregex.test(pass.value);
    if (isValidP)
        pass.style.border = '1px solid green';
    else
        pass.style.border = '1px solid red';
})

//ajouter un evenemnt pour boutton entrer pour vérifier l'email et le mot de passe 
enter.addEventListener('click', function(event) 
{
    let isValidE = Eregex.test(user.value);
    let isValidP = Pregex.test(pass.value);

    if (!isValidE || !isValidP) 
    {    
        // event.preventDefault();
        errmessage.style.display = 'block';
        errmessage.textContent = 'veuillez remplir les champs avec des informations valides !!';
    } 
    else errmessage.style.display = 'none';
})