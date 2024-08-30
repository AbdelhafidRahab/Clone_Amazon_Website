const total = document.getElementById('totalInCart');
total.innerText = JSON.parse(localStorage.getItem("totalInCart"));


let isProcessing = false;

// Creating the form data object
let data = {
  payment_intent: null,
};

// Simulating props as a plain JavaScript object
const props = {
  intent: { /* object data */ },
  order: { /* object data */ }
};

const client_secret = document.getElementById('client_secret').value;

// This is your test publishable API key.
var stripe = Stripe("");

var elements = stripe.elements();
var style = {
  base: {
    color: "#32325d",
    fontFamily: 'Arial, sans-serif',
    fontSmoothing: "antialiased",
    fontSize: "16px",
    "::placeholder": {
      color: "#32325d"
    }
  },
  invalid: {
    fontFamily: 'Arial, sans-serif',
    color: "#fa755a",
    iconColor: "#fa755a"
  }
};

var card = elements.create("card", { style: style });
// Stripe injects an iframe into the DOM
card.mount("#card-element");

card.on("loaderror", function (event) {
  // Listen for load errors, handling any errors using your own observability tooling.
});

card.on("change", function (event) {
  // Disable the Pay button if there are no card details in the Element
  document.querySelector("button").disabled = event.empty;
  document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
});

var form = document.getElementById("payment-form");
form.addEventListener("submit", function(event) {
  event.preventDefault();
  // Complete payment when the submit button is clicked
  payWithCard(stripe, card, client_secret);
});

setTimeout(() => {
  setTimeout
}, 10);






// Calls stripe.confirmCardPayment
// If the card requires authentication Stripe shows a pop-up modal to
// prompt the user to enter authentication details without leaving your page.
var payWithCard = (stripe, card, clientSecret)=> {
  loading(true);
  stripe
    .confirmCardPayment(clientSecret, {
      payment_method: {
        card: card
      }
    })
    .then(function(result) {
      if (result.error) {
        // Show error to your customer
        showError(result.error.message);
      } else {
        // The payment succeeded!
        orderComplete(result.paymentIntent.id);
      }
    });
};

/* ------- UI helpers ------- */

// Shows a success message when the payment is complete
var orderComplete = (paymentIntentId)=> {
  data.payment_intent = paymentIntentId;

  fetch('/checkout/update', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify(data)
  })
  .then(response  => {
    if (response.ok) {
      window.location.href = "/checkout_success";
    } else {
      console.error('Failed to store data.');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
  console.log('succecss');
};

// Show the customer the error from Stripe if their card fails to charge
var showError = (errorMsgText)=> {
  loading(false);
  var errorMsg = document.querySelector("#card-error");
  errorMsg.textContent = errorMsgText;
  setTimeout(function() {
    errorMsg.textContent = "";
  }, 4000);
};

// Show a spinner on payment submission
var loading = (isLoading)=> {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("button").disabled = true;
    document.getElementById('is-proccessing').classList.remove('hidden');
    document.getElementById('button-text').classList.add('hidden');
  } else {
    document.querySelector("button").disabled = false;
    document.getElementById('is-proccessing').classList.add('hidden');
    document.getElementById('button-text').classList.remove('hidden');
  }
};

const totalWithoutDot = ()=> {
  let num = JSON.parse(localStorage.getItem("totalInCart"));
  return Number(num.split('.').join(''));
}


let cartItems = JSON.parse(localStorage.getItem("cart"));
const itemsContainer = document.getElementById('items_container');
const cartSize = cartItems.length;

if (cartSize != 0) {
  itemsContainer.firstElementChild.remove();

  cartItems.forEach(item => {
    item = JSON.parse(item);

    let htmlItem = `
      <div class="w-[1200px] mx-auto">
        <div class="flex items-center py-1">

          <img width="60" src="${item.images}" class="rounded-md">

          <div class="ml-4">

            <div class="text-lg font-medium">${item.title}</div>

            <div class="font-medium text-red-700">$${item.price}</div>

          </div>

        </div>
      </div>
    `;

    itemsContainer.insertAdjacentHTML('beforeend', htmlItem);
  });

}
