
/*Working with the galerie page */
// Variables
let img = document.getElementsByClassName('img-fluid');
const body = document.getElementsByTagName('body');
let button_add_link = document.getElementsByClassName('add_link');
let modal = document.getElementById("myModal");
let editorplug = document.getElementById('editor');
// Get the image and insert it inside the modal - use its "alt" text as a caption
let modalImg = document.getElementById("img01");
let captionText = document.getElementById("caption");
let button_add_video = document.getElementsByClassName('add_video');
const hidding = document.getElementsByClassName(".field_desc");
const image_article_home = document.getElementsByClassName('image_card');
let count = 1 ;




if(button_add_link[0]){

    button_add_link[0].addEventListener('click', function(e){
        count ++;
        e.preventDefault();
        let label_title = document.createElement('label');
        label_title.innerHTML = "Lien ";
        
        let input_link = document.createElement('input');
        input_link.setAttribute('type','text');
        input_link.setAttribute("name", "link_image_" + count);
        let form = document.getElementsByClassName("input_container")[0]
        form.appendChild(label_title);
        form.appendChild(input_link);
    });
}
if(button_add_video[0]){
button_add_video[0].addEventListener("click",function(e){
    count ++;
    e.preventDefault();
    let label_titre = document.createElement('label');
    label_titre.innerHTML ="Titre de la video";
    let input_titre = document.createElement('input');
    input_titre.setAttribute('type','text');
    input_titre.setAttribute('name',"title_video_"+count)

    let label_link = document.createElement('label');
    label_link.innerHTML = "Lien de la video";

    let input_link = document.createElement('input');
    input_link.setAttribute('type','text');
    input_link.setAttribute("name", "link_video_" + count);
    let form = document.getElementsByClassName("input_container")[0];
    form.appendChild(label_titre);
    form.appendChild(input_titre);
    form.appendChild(label_link);
    form.appendChild(input_link);
});
}

for (let i = 0; i < img.length; i++) {
    let galery = img[i];
    galery.onclick = function(e){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
}



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal

if(span){
span.onclick = function() {
    modal.style.display = "none";
}
}



