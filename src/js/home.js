const animation = () => {
    let window_height = innerHeight * 0.8;
    const space = document.getElementsByClassName("col-lg-6");
    
    Array.from(space,children => { 
        const distance = children.getBoundingClientRect();
        if(distance.top < window_height + 50 ){
            children.style.opacity = 1;
            children.style.transform = "translateY(0)";
        }
    })
}
document.addEventListener("scroll", animation);
