//NavBar

const navs = document.querySelector(".navs");
const navMenu = document.querySelector(".nav-menu")

navs.addEventListener("click", () => {
    navs.classList.toggle("active");
    navMenu.classList.toggle("active");
});

//Visibilidade de senha

let btn = document.querySelector('.eye1');
btn.addEventListener('click', function() {
    let input = document.querySelector('.password');
    if(input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
    } else {
        input.setAttribute('type', 'password');
    }
});
      

let btn2 = document.querySelector('.eye2');
btn2.addEventListener('click', function() {
    let input = document.querySelector('.confirm_password');
    if(input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
    } else {
        input.setAttribute('type', 'password');
    }
});
      
