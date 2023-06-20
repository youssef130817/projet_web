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
       
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "RHacceptAbsence.php", true);
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
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "RhRefuserAbsence.php", true);
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
