let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

window.addEventListener('scroll', function(){
  const navbar = document.querySelector('.header');

  navbar.classList.toggle('sticky', this.window.scrollY > 50);
});

menu.onclick = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

window.onscroll = () => {
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
}