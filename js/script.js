//User Name
var fullName = document.getElementById("fullName");
var fullNameError = document.getElementById("UserHelp");

// Mobile validate
var mobileNum = document.getElementById("mobileNum");
var mobileNumError = document.getElementById("numHelp");

// date of birth
var dateoB = document.getElementById("Dob");
var dateoBError = document.getElementById("DobHelp");

// Email
var email = document.getElementById("email");
var emailError = document.getElementById("emailHelp");

// password
var password = document.getElementById("pass");
var passwordError = document.getElementById("passHelp");

// password validation
var password2 = document.getElementById("passConfirm");
var password2Error = document.getElementById("passConfirmHelp");

// submit botton
var submitBtn = document.querySelector("#loginBtn");

// regex
let regexEmail = /^[a-z0-9._-]+@(gmail|yahoo).com$/;
let regexPass =
  /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])/;
let regexName = /^([\w]{3,})+\s+([\w]{3,})+\s+([\w]{3,})+\s+([\w]{3,})+$/i;
let regexMobile = /^[0-9]{14}$/gm;

function validation(e) {
  // full name validation
  var validUser = false;
  if (fullName.value === "" || !regexName.test(fullName.value)) {
    fullNameError.innerHTML = "You have to fill your quad name! ";
    fullNameError.style.color = "red";
    fullName.onkeydown = function () {
      fullNameError.innerHTML = "";
    };
  } else validUser = true;

  //Mobile Number Validation
  var validNumber = false;

  if (!regexMobile.test(mobileNum.value)) {
    mobileNumError.innerHTML = "The mobile number should be 14 digits! ";
    mobileNumError.style.color = "red";
  } else {
    validNumber = true;
    mobileNumError.innerHTML = "";
  }
  // Age validation
   var validAge = false;
   var date = new Date();
   var currentYear = date.getFullYear();
   var age = currentYear - (dateoB.value.slice(0, 4));

   if(dateoB.value  == ""){
    dateoBError.innerHTML = "You have to enter you birthday";
    dateoBError.style.color = "red";
  } else if (age < 16 ){
    dateoBError.innerHTML = "Your age under allowed Ages :(";
    dateoBError.style.color = "red";
  } else {
    validAge = true;
    dateoBError.innerHTML = "";
  }
 
   
  // email validation
  var validEmail = false;
  if (!regexEmail.test(email.value)) {
    emailError.innerHTML = "Invalid Email !";
    emailError.style.color = "red";
  } else {
    emailError.innerHTML = "";
    validEmail = true;
  }

  // Passwords validation
  var validPass = false;
  if (!password.value.match(regexPass)) {
    passwordError.innerHTML = "Invalid Password !";
    passwordError.style.color = "red";
    password.onkeydown = function () {
      passwordError.innerHTML = " ";
    };
  } else if (password.value !== password2.value || password2.value === "") {
    password2Error.innerHTML = "The two passwords don't match !";
    password2Error.style.color = "red";
    password2.onkeydown = function () {
      password2Error.innerHTML = "";
    };
  } else validPass = true;

  if (
    validUser === false ||
    validNumber === false ||
    validEmail === false ||
    validPass === false || validAge === flase
  ) {
    e.preventDefault();
  } else {
    e.defaultPrevented = false;
  }
}
