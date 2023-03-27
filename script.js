
document.getElementById("login-link").addEventListener("click", function() {
  document.getElementById("login-sidebar").style.display = "block";
  document.getElementById("login-content").style.display = "block";
  document.getElementById("registration-sidebar").style.display = "none";
  document.getElementById("registration-content").style.display = "none";
});

// Show Registration Sidebar and Content
document.getElementById("registration-link").addEventListener("click", function() {
  document.getElementById("registration-sidebar").style.display = "block";
  document.getElementById("registration-content").style.display = "block";
  document.getElementById("login-sidebar").style.display = "none";
  document.getElementById("login-content").style.display = "none";
});

function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = none;
  }
}
// function confirmSubmit(){
//     if(confirm ("Are you sure you want to submitthis data")){
//         return true;
//     }else{
//         return false;
//     }
// }
function submitConfirmation() {
    if (confirm("Are you sure you want to submit this form?")) {
      // If user clicks "OK", submit the form
      document.forms[0].submit();
    } else {
      // If user clicks "Cancel", do nothing
      return false;
    }
}





var fullnameError = document.getElementById('fullname-error');
var usernameError = document.getElementById('username-error');
var emailError = document.getElementById('email-error');
var contactError = document.getElementById('contact-error');
var locationError = document.getElementById('location-error');
var passwordError = document.getElementById('password-error');
var cpasswordError = document.getElementById('cpassword-error');
var submitError = document.getElementById('submit-error');

function validatefName(){
    var fullname = document.getElementById('fname').value;

    if(fullname.length == 0){
        fullnameError.innerHTML = 'Fullname is required';
        return false;
    }
    if(!fullname.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)){
        fullnameError.innerHTML = 'write full name';
        return false;
    }
    fullnameError.innerHTML = 'valid';
    return true;
    
}

function validateuName(){
    var username = document.getElementById('uname').value;

    if(username.length == 0){
        usernameError.innerHTML = 'username is required';
        return false;
    }
    if(!username.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)){
        usernameError.innerHTML = 'write username';
        return false;
    }
    usernameError.innerHTML = 'valid';
    return true;

}

function validateEmail(){
    var emailadd = document.getElementById('email').value;

    if(emailadd.length == 0){
        emailError.innerHTML = 'email is required';
        return false;
    }
    if(!emailadd.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        emailError.innerHTML = 'email is invalid';
        return false;
    }
    emailError.innerHTML = 'valid';
    return true;

}

function validateContact(){
    var contactno = document.getElementById('contact').value;

    if(contactno.length == 0){
        contactError.innerHTML = 'Contact number is requird';
        return false;
    }
    if(contactno.length !== 10){
        contactError.innerHTML = 'Contact number should be 10 digits';
        return false;
    }
    if(!contactno.match(/^[0-9]{10}$/)){
        contactError.innerHTML = 'Contact number should be in digits only';
        return false;
    }
    contactError.innerHTML = 'valid';
    return true;


}

function validateLocation(){
    var loc = document.getElementById('location').value;

    if(loc.length == 0){
        locationError.innerHTML = 'location is required';
        return false;
    }
    if(!loc.match(/^[a-zA-Z0-9\s,.'-]{3,}$/)){
        locationError.innerHTML = 'write a valid location';
        return false;
    }
    locationError.innerHTML = 'valid';
    return true;

}

function validatePassword(){
    var password = document.getElementById('pwd').value;

    if(password.length == 0){
        passwordError.innerHTML = 'Password is required';
        return false;
    }
    if(!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)){
        passwordError.innerHTML = 'password must contain one uppercase, one lowercase, special character and one numeric digit and between 8-15 Characters';
        return false;
    }
    passwordError.innerHTML = 'valid';
    return true;

}

function validatecPassword(){
    
    var cpassword = document.getElementById('cpwd').value;
    var password = document.getElementById('pwd').value;

    if(cpassword.length == 0){
        cpasswordError.innerHTML = 'Confirm Password is required';
        return false;
    }
    if(cpassword != password){
        cpasswordError.innerHTML = 'Password and confirm password must be same';
        return false;
    }
    cpasswordError.innerHTML = 'valid';
    return true;
}

function validateForm(){
    if(!validatefName() || !validateuName() || !validateEmail() || !validateContact() || !validateLocation()
      || !validatePassword() || !validatecPassword() || !validateCustomer()){
        submitError.style.display = 'block';
        submitError.innerHTML = 'please input your details';
        setTimeout(function(){submitError.style.display = 'none';}, 3000)
        return false;
      }
      console.log();
}
const form = document.querySelector('form');
const submitBtn = form.querySelector('.submitBtn');

submitBtn.addEventListener('click', function(e){
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
        }
    }
    const formData = new FormData(form);
    xhr.send(formData);

    
});
