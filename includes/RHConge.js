console.log('JavaScript file loaded');
//déclaration des variables et obtentions des éléments html 
const form =document.querySelector(".conge form");
function Accepter(event,id, rowNum) {
    let comment = document.querySelector('#cmt-' + rowNum);
    let pElement = document.querySelector('#err-' + rowNum);
    let st = document.querySelector('#st-' + rowNum);
    if(st.textContent  ==='Accepté')
    {
        event.preventDefault();
        pElement.textContent = "cette demande est déja accepté !!";
        pElement.style.display ="block";
    }
    else
    {
        if (comment.value === '') {
            event.preventDefault();
            pElement.textContent = "il faut mettre un commentaire !!";
            pElement.style.display ="block";
        
        } else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "RHacceptConge.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    pElement.style.display ="none";
                }
            }
        }
        let formData = new FormData(form);
        formData.append('id', id);
        xhr.send(formData);
        }  
    }
}
function Rejeter(event,id, rowNum) {
    let comment = document.querySelector('#cmt-' + rowNum);
    let pElement = document.querySelector('#err-' + rowNum);
    let st = document.querySelector('#st-' + rowNum);
    if(st.textContent  ==='Reffusé')
    {
        event.preventDefault();
        pElement.textContent = "cette demande est déja reffusé !!";
        pElement.style.display ="block";
    }
    else
    {
        if (comment.value === '') {
            // Empêcher le comportement par défaut du bouton
            event.preventDefault();
            // Afficher un message d'erreur
            pElement.textContent = "il faut mettre un commentaire !!";
            pElement.style.display ="block";
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "RHrejectConge.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        pElement.style.display ="none";
                    }
                }
            }
            let formData = new FormData(form);
            formData.append('id', id); // Ajouter l'ID à l'objet formData
            xhr.send(formData);
        }
    } 
}
