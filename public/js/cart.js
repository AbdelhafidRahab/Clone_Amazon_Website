const cartEmpty = document.getElementById('cartEmpty');
const itemsContainer = document.getElementById('itemsContainer');
const proceedToCheckout = document.getElementById('proceedToCheckout');
const totalInCartElements = document.querySelectorAll('.totalInCart');
const cartSizeElements = document.querySelectorAll('.cartSize');

let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
const cartSize = cartItems.length;

let totalInCart = 0.00;

if (cartSize != 0) {
  cartEmpty.classList.add("hidden");

  itemsContainer.firstElementChild.remove();

  cartItems.forEach(item => {
    item = JSON.parse(item);
    totalInCart += item.price;

    let htmlItem = `
      <div class="flex border-b">

        <img src="${item.images}" class="h-[180px] my-4">

        <div class="flex justify-between mb-4">
          
          <div class="pl-8 py-10 relative">

            <div class="text-gray-900 pb-2 -mt-4 font-bold text-[18px]">${item.title}</div>

            <span>${item.description.substring(0, 180)}...</span>

            <div class="text-teal-600 py-2">In Stock</div>

            <div id="${item.id}" class="deleteItem text-teal-600 absolute bottom-0 mb-4 flex items-center">
              <div class="text-sm hover:underline cursor-pointer">
                delete
              </div>
            </div>

          </div>

          <div class="py-10 justify-end">
            <div class="font-bold pl-20">$${item.price}</div>
          </div>

        </div>

      </div>
    `;

    itemsContainer.insertAdjacentHTML('beforeend', htmlItem);
  });

  localStorage.setItem("totalInCart", JSON.stringify(totalInCart.toFixed(2)));

  document.querySelectorAll('.deleteItem').forEach((ele) => {
    ele.onclick = () => {

      totalInCart -= Number(ele.parentElement.parentElement.lastElementChild.firstElementChild.innerText.slice(1)).toFixed(2);
      totalInCart = Number(totalInCart.toFixed(2));
      totalInCartElements.forEach((ele) => {
        ele.innerText = totalInCart.toFixed(2); 
      });
      localStorage.setItem("totalInCart", JSON.stringify(totalInCart.toFixed(2)));
  

      cartItems.forEach((elem) => {
        elem = JSON.parse(elem);
        if (Number(elem.id) == Number(ele.id)) {
          cartItems = cartItems.filter((elemn) => {
            elemn = JSON.parse(elemn);
            return Number(elemn.id) !== Number(ele.id);
          });
        }
      });
      localStorage.setItem("cart", JSON.stringify(cartItems));
  

      const cartSize = cartItems.length;
      cartSizeElements.forEach((ele) => {
        ele.innerText = cartSize;
      });


      document.getElementById("cartItemsCount").innerText = cartSize;
  
      
      ele.parentElement.parentElement.parentElement.remove();


      if (totalInCart.toFixed(2) == '0.00') {
        proceedToCheckout.removeAttribute('href');
        proceedToCheckout.classList.add('bg-gray-400');
        proceedToCheckout.classList.remove('bg-yellow-400','hover:bg-yellow-500');
        cartEmpty.classList.remove("hidden");
      }

    };
  });
  

}

totalInCartElements.forEach((ele)=> {
  ele.innerText = totalInCart.toFixed(2);
});

cartSizeElements.forEach((ele)=> {
  ele.innerText = cartSize;
});

if (totalInCart == 0.00) {
  proceedToCheckout.removeAttribute('href');
  proceedToCheckout.classList.add('bg-gray-400');
}else {
  proceedToCheckout.classList.add('bg-yellow-400','hover:bg-yellow-500');
}


proceedToCheckout.onclick = (e)=> {
  if (totalInCart != 0.00 && proceedToCheckout.pathname.slice(1) == 'checkout') {
    e.preventDefault();
    const data = {
      total: totalWithoutDot(),
      total_decimal: Number(totalInCart.toFixed(2)), 
      items: JSON.parse(localStorage.getItem("cart"))
    };
    
    // Make a POST request
    fetch('/checkout', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify(data)
    })
    .then(response  => {
      if (response.ok) {
        window.location.href = "/checkout";
      } else {
        console.error('Failed to store data.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
}


const totalWithoutDot = ()=> {
  let num = String(totalInCart);
  return Number(num.split('.').join(''));
}