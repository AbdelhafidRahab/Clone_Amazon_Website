const newPassword = document.getElementById("new_password");
const reEnterPassword = document.getElementById("re-enter_password");
const reEnterPasswordError = document.getElementById("re-enter_password_error");
const submitBtn = document.getElementById("submitBtn");

reEnterPassword.oninput = ()=> {
  if (!(newPassword.value === reEnterPassword.value)) {
    reEnterPasswordError.innerText = "Password does not match";
  }else {
    reEnterPasswordError.innerText = "";
  }
}

submitBtn.onclick = (e)=> {
  if (!(newPassword.value === reEnterPassword.value)) {
    e.preventDefault();
  }
}