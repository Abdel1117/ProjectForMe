
/*Working with the galerie page */
// Variables
const img = document.getElementsByClassName('img-fluid');
const body = document.getElementsByTagName('body');
const button_add_link = document.getElementsByClassName('add_link');
const modal = document.getElementById("myModal");
const editorplug = document.getElementById('editor');
// Get the image and insert it inside the modal - use its "alt" text as a caption
const modalImg = document.getElementById("img01");
const captionText = document.getElementById("caption");
const button_add_video = document.getElementsByClassName('add_video');
const hidding = document.getElementsByClassName(".field_desc");
const image_article_home = document.getElementsByClassName('image_card');
const boutton_news = document.getElementById("previous_page");

let count = 1 ;




for (let i = 0; i < img.length; i++) {
    let galery = img[i];
    galery.onclick = function(e){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.style.bottom = 20 + "px";
        captionText.innerHTML = this.alt;
        
    }
}


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closes")[0];

// When the user clicks on <span> (x), close the modal
try {
 
span.onclick = function() {
    modal.style.display = "none";
}   
} catch (error) {
    console.log(error)   
}

function confirmAlert(msg, url, id){
    if(msg === undefined){
        msg = "Voullez vous supprimez ce contenu";
    }
    let result = window.confirm(msg);
        if(result === true){
            window.location.href= url + id;
        }
}

