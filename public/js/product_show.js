const cartItemsCounts = document.getElementById("cartItemsCount");
const addToCartBtn = document.getElementById('addToCartBtn');
const product = addToCartBtn.firstElementChild.id;
let cartItems = JSON.parse(localStorage.getItem("cart")) || [];

if (cartItems.includes(product)) {
  addToCartBtn.classList.add("hidden");
  addToCartBtn.nextElementSibling.classList.remove("hidden");
}

addToCartBtn.onclick = ()=> {
  cartItems.push(product);
  localStorage.setItem("cart", JSON.stringify(cartItems));

  cartItemsCounts.innerText = cartItems.length;

  addToCartBtn.classList.add("hidden");
  addToCartBtn.nextElementSibling.classList.remove("hidden");
}
