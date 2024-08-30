const password = document.getElementById("password");
const reEnterPassword = document.getElementById("re-enter_password");
const reEnterPasswordError = document.getElementById("re-enter_password_error");
const submitBtn = document.getElementById("submitBtn");

reEnterPassword.oninput = ()=> {
  if (!(password.value === reEnterPassword.value)) {
    reEnterPasswordError.innerText = "Password does not match";
  }else {
    reEnterPasswordError.innerText = "";
  }
}


submitBtn.onclick = (e)=> {
  if (!(password.value === reEnterPassword.value)) {
    e.preventDefault();
  }
}