console.log('JavaScript file loaded');
//déclaration des variables et obtentions des éléments html 
const form =document.querySelector(".login form"),
lgnbtn=form.querySelector(".button input"),
errorText=form.querySelector(".error-txt");

//déclaration des variables et obtentions des éléments html 
var enter = document.querySelector('.Entrer');
var errmessage = document.querySelector('.error');
var user = document.querySelector('#user');
var pass = document.querySelector('#pass');

//définition des expressions régulières pour l'email et le mot de pass
var Eregex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]{2,})$/;
var Pregex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9\W]).{8,}$/;

//rester sur la page après soumettre le formulaire
form.onsubmit =(e)=>{
    e.preventDefault();
}

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

//ajouter un événement lors du click sur le boutton login
lgnbtn.onclick = ()=>{
    let isValidE = Eregex.test(user.value);
    let isValidP = Pregex.test(pass.value);

    if (!isValidE ) 
    {    
        errorText.textContent = 'veuillez entrer un email valide !!';
        errorText.style.display = 'block';
        
    }else if(!isValidP) 
    {
        errorText.textContent = 'veuillez entrer un mot de passe valide !!';
        errorText.style.display = 'block';
    }

    else {
        //passer à la page php qui contient le traitement php en utilison ajax
        let xhr =new XMLHttpRequest();
        xhr.open("POST","login.php",true);//ouvrir la page php
        xhr.onload =()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200)
                {
                    let data =xhr.response;//récupérer la sortie du traitement du fichier php
                    if(data =="ces informations n'est relatives à aucun compte !!")//si les informations d'authentifications sont erronés
                    {
                        errorText.textContent =data; //afficher message d'erreur
                        errorText.style.display ="block";
                    }else //si les informations d'authentifications sont correctes
                        location.href= data; //redériger vers la page souhaitée
                }
            }
        }
        let formData =new FormData(form);//récupérer les informations remplies dans la formulaire
        xhr.send(formData); //envoyer les informations remplis au fichier de traitement php 
    }
  
}

/*

//ajouter un evenemnt pour boutton entrer pour vérifier l'email et le mot de passe 
enter.addEventListener('click', function(event) 
{

})
*/


