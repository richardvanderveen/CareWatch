var mail = document.getElementById("email")
  , confirm_mail = document.getElementById("email2");

function validatemail(){
  if(mail.value != confirm_mail.value) {
    confirm_mail.setCustomValidity("Mails Don't Match");
  } else {
    confirm_mail.setCustomValidity('');
  }
}

mail.onchange = validatemail;
confirm_mail.onkeyup = validatemail;
