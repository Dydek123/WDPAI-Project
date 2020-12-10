const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links-mobile-only');
const links = document.querySelectorAll('.nav-links-item');

let changeIcon = false;

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle("open");
    links.forEach(link =>{
        link.classList.toggle('fade');
    })

    if (!changeIcon){
        hamburger.classList.add("close");
        changeIcon = true;
    }
    else{
        hamburger.classList.remove("close");
        changeIcon = false;
    }
});

window.onscroll = function(){
    scrollFunction();
}

function scrollFunction() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300){
        document.getElementById("main-topnav").style.backgroundColor =  'rgba(18,35,46,1)';
    } else {
        document.getElementById("main-topnav").style.backgroundColor =  'rgba(18,35,46,0.8)';
    }
}

function dropDownFunction(x,y) {
    let name = document.querySelector(".span1")
    let listElements = document.querySelector('.nested');
    listElements.classList.toggle("expand");
    name.classList.toggle("bold");
}
