let  btn=document.querySelector('.header-second-user--active');
let el=document.querySelector('.header-second-user--active-login--list');

if(window.innerWidth<1025){
    btn.addEventListener('click',()=>{
        console.log('cli');
        el.classList.toggle('header-second-user--active-login--list--burger');
    });
}