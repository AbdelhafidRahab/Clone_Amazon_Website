const partOne = document.querySelectorAll(".part-one");
const partTwo = document.querySelectorAll(".part-two");
const submitBtn = document.getElementById("submitBtn");

let flag = false;

function isValidEmail(email) {
  // Regular expression to validate email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

submitBtn.onclick = (e)=> {
  const emailValue = document.getElementById("email").value;
  if (emailValue != "" && isValidEmail(emailValue)) {
    if (!flag) {
      e.preventDefault();
      partOne.forEach((ele)=> {
        ele.classList.add('hidden');
      });
      partTwo.forEach((ele)=> {
        ele.classList.remove('hidden');
      });
      flag = true;
      submitBtn.innerText = "Sign in";
      document.getElementById("email-value-in-part-two").innerText = emailValue;
    }
  }
}
