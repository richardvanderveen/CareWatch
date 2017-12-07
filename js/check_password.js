var user_password = document.getElementById("user_password")
  , confirm_password = document.getElementById("confirm_password");

function validatepassword(){
  if(user_password.value != confirm_password.value) {
    confirm_password.setCustomValidity("passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

user_password.onchange = validatepassword;
confirm_password.onkeyup = validatepassword;
