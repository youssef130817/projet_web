console.log('JavaScript file loaded');
var adresse = document.querySelector('#adresse');
var cnss = document.querySelector('#cnss');
var img = document.querySelector('#img');
//var adregex = ;
//var cnssregex = ;
//var imgregex = ;
const form =document.querySelector(".new form"),
lgnbtn=form.querySelector(".button button"),
errorText=form.querySelector(".error-txt"),
successText=form.querySelector(".success-txt");
form.onsubmit =(e)=>{
    e.preventDefault();
}
lgnbtn.onclick = ()=>{
    //let isValidAdresse = adregex.test(adresse.value);
    //let isValidcnss = cnssregex.test(cnss.value);
    //let isValidimg = imgregex.test(img.value);
    /*if (!isValidAdresse ) 
    {    
        errorText.textContent = 'veuillez entrer un adresse valid !!';
        errorText.style.display = 'block';
        
    }else if(!isValidcnss)
    {
        errorText.textContent = 'veuillez entrer un cnss valid !!';
        errorText.style.display = 'block';
    }
    else if(!isValidimg)
    {
        errorText.textContent = 'veuillez selctioner une image valide !!';
        errorText.style.display = 'block';
    }
    else{*/
            //ajax
        let xhr =new XMLHttpRequest();
        xhr.open("POST","employetrait.php",true);
        xhr.onload =()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200)
                {
                    let data =xhr.response;
                    if(data =="employée ajouté avec succès")
                    {
                        successText.textContent =data;
                        errorText.style.display ="none";
                        successText.style.display ="block";
                    }else
                    {
                        errorText.textContent =data;
                        successText.style.display ="none";
                        errorText.style.display ="block";
                    }
                }
            }
        }
        let formData =new FormData(form);
        xhr.send(formData);
    }
    //}
 
