//side menu
const menuBtn = document.getElementById('menu-btn');
const sideMenu = document.getElementById('side-menu');
const closeBtn = document.getElementById('close-btn');
const sideMenuWrapper = document.getElementById('side-menu-wrapper');

menuBtn.addEventListener('click', () => {
  sideMenuWrapper.classList.remove('hidden');
  setTimeout(() => {
    sideMenuWrapper.classList.remove('opacity-0');
    sideMenu.classList.remove('-translate-x-full');
  }, 10);
});

[closeBtn,sideMenuWrapper].forEach((ele)=> {
  ele.addEventListener('click', () => {
    sideMenu.classList.add('-translate-x-full');
    sideMenuWrapper.classList.add('opacity-0');
    setTimeout(() => {
      sideMenuWrapper.classList.add('hidden');
    }, 300);
  });
});

sideMenu.addEventListener('click', function (event) {
  event.stopPropagation();
});




//drop down menu
const hoverBtns = document.querySelectorAll('.hover-btn');
const dropdawnMenuOverlay = document.querySelector(".dropdawn-menu-overlay");

hoverBtns.forEach((ele)=> {
  ele.addEventListener('mouseenter', function () {

    dropdawnMenuOverlay.classList.remove('hidden');
    ele.lastElementChild.classList.remove('hidden');

    setTimeout(() => {
      dropdawnMenuOverlay.classList.remove('opacity-0');
      ele.lastElementChild.classList.remove('opacity-0');
    }, 10);

  });
  ele.addEventListener('mouseleave', function () {
    setTimeout(function () {
      ele.lastElementChild.classList.add('hidden');
      dropdawnMenuOverlay.classList.add('hidden');

      ele.lastElementChild.classList.add('opacity-0');
      dropdawnMenuOverlay.classList.add('opacity-0');
    }, 200); // Delay for hiding
  });
});





// cart
const cartItemsCount = document.getElementById("cartItemsCount");
let cart = JSON.parse(localStorage.getItem("cart")) || [];

cartItemsCount.innerText = cart.length;



