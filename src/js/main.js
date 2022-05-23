
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


function appendRowInput(text,text2,text3){
   
    let input_form = document.createElement("input");

    let input_title  = document.createElement("input");


    let input_description = document.createElement("input");

    let div = document.createElement("div");

    let div1 = document.createElement("div");
    let div2 = document.createElement("div");
    let div3 = document.createElement("div");

    div1.setAttribute("class", "col-lg-3");
    div2.setAttribute("class", "col-lg-2");
    div3.setAttribute("class", "col-lg-2");

    div.setAttribute("class", "form-row aling-item-center mt-3");


    input_form.setAttribute("type", "text");
    input_form.setAttribute("class", "form-control");
    input_form.setAttribute("placeholder", text)
    input_form.setAttribute("name", "link_image_" + count)

    input_title.setAttribute("type","text");
    input_title.setAttribute("class", "form-control");
    input_title.setAttribute("placeholder", text2)
    input_form.setAttribute("name", "title_image_" + count)


    input_description.setAttribute("type", "text");
    input_description.setAttribute("class", "form-control");
    input_description.setAttribute("placeholder", text3);
    input_form.setAttribute("name", "desc_image_" + count)


    div1.appendChild(input_form);

    div2.appendChild(input_title);

    div3.appendChild(input_description);

    div.appendChild(div1);
    div.appendChild(div2);
    div.appendChild(div3);
    let form = document.getElementById("form_image_add");
    let group_button = document.getElementById("btn-group-add-image")
    form.insertBefore(div,group_button );
}


if(button_add_link[0]){

    button_add_link[0].addEventListener('click', function(e){
        count ++;
        e.preventDefault();
        appendRowInput("Image", "Titre de l'image","Description de l'image");
})
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

