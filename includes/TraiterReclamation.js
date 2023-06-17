const form =document.querySelector(".rec form");
function traiter(event,id) {
    console.log('JavaScript file loaded');
    
    let comment = document.querySelector('.cmt');
    let pElement = document.querySelector('.err');
    let pElement2 = document.querySelector('.ok');
        if (comment.value === '') {
            event.preventDefault();
            pElement.textContent = "il faut mettre une reponse !!";
            pElement.style.display ="block";
        } else {
            event.preventDefault();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "actualiser.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                            if(data == "Traitée")
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
        } 