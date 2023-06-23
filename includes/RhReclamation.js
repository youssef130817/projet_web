console.log('loaded');
const form =document.querySelector(".rec"),
lgnbtn=form.querySelector(".rec .submit");
//rester sur la page après soumettre le formulaire
/*form.onsubmit =(e)=>{
    e.preventDefault();
}*/
function transferer(event,id,rowNum) {
    event.preventDefault();
    let pElement = document.querySelector('#err-' + rowNum);
    let pElement2 = document.querySelector('#ok-' + rowNum);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "TrnsfererReclamation.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                    if(data == "réclamation transférée")
                    {
                        pElement.style.display ="none";
                        pElement2.textContent = data;
                        pElement2.style.display ="block";
                    }
                    else
                    {
                        pElement2.style.display ="none";
                        pElement.textContent = data;
                        pElement.style.display ="block";
                    }
                    
                }
            }
        }
        let formData = new FormData(form);
        formData.append('id', id);
        xhr.send(formData);
    }  