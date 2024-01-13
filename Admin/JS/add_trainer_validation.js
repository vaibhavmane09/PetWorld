
function trainerValidate() {
    var namepattern = /^[A-Za-z\s]+$/;
    var numberpattern = /^[0-9]+$/;
    var emailpattern = /^[A-Za-z0-9._]{3,}@[A_Za-z]{3,}[.]{1}[A-Za-z.]{2,6}/;

    /* To check a password between 8 to 15 characters, which should contain at 
    least one lowercase letter, one uppercase letter,
    one numeric digit, and one special character, */
    var passpattern = /^(?=.*[0-9])(?=.*[- ?!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9- ?!@#$%^&*]{6,20}$/;
    /*var dateString = document.getElementById('dob').value;
   var myDate = new Date(dateString);
   var today = new Date();*/


    var tname = document.getElementById('tname').value;
    var email = document.getElementById('email').value;
    var mobno = document.getElementById('mobno').value;
    var speciality = document.getElementById('speciality').value;
    var experience = document.getElementById('experience').value;
    var address = document.getElementById('address').value;
    var pwd = document.getElementById('pwd').value;


    //first name validation code*/
    if (tname == "" || tname.length < 3 || tname.length > 15) {
        alert("Please provide a valid first name");
        document.myForm.tname.focus();
        document.myForm.tname.style.border = "solid 3px red";
        return false;
    }
    if (!tname.match(namepattern)) {
        alert("Please provide your firstname");
        document.myForm.tname.focus();
        document.myForm.tname.style.border = "solid 3px red";
        return false;
    }
    else {
        document.myForm.tname.focus();
        document.myForm.tname.style.border = "1px solid";
    }
    //fisrt name validation code ends here

    //email validation code 
    if (email == "") {
        alert("Please valid email");
        document.myForm.email.focus();
        document.myForm.email.style.border = "solid 3px red";
        return false;
    }
    if (!email.match(emailpattern)) {
        alert("Invalid email format, Missing '@' symbol, or Invalid domain name. ");
        document.myForm.email.focus();
        document.myForm.email.style.border = "solid 3px red";
        return false;
    }
    else {
        document.myForm.email.focus();
        document.myForm.email.style.border = "1px solid";
    }

    //email validation code end here

    //mobile number validation code 
    if (mobno == "" || mobno.length < 10 || mobno.length > 10) {
        alert("Please provide valid mobile number");
        document.myForm.mobno.focus();
        document.myForm.mobno.style.border = "solid 3px red";
        return false;
    }
    if (!mobno.match(numberpattern)) {
        alert("Mobile number must be 10 digit Number only");
        document.myForm.mobno.focus();
        document.myForm.mobno.style.border = "solid 3px red";
        return false;
    }
    else {
        document.myForm.mobno.focus();
        document.myForm.mobno.style.border = "1px solid";
    }
    //mobile number validation code end here

    //Speciality validation code starts here

    if (speciality == "") {
        alert("Please provide your Training Speciality");
        document.myForm.speciality.focus();
        document.myForm.speciality.style.border = "solid 3px red";
        return false;
    }
    else {
        document.myForm.speciality.focus();
        document.myForm.speciality.style.border = "1px solid";
    }

    //Speciality validation code end here

    //Work Experience validation code starts here
    if (experience == "") {
        alert("Please provide your Work Experience in Dog-Training");
        document.myForm.experience.focus();
        document.myForm.experience.style.border = "solid 3px red";
        return false;
    }
    else {
        document.myForm.experience.focus();
        document.myForm.experience.style.border = "1px solid";
    }

    //Work Experience validation code end here

    //password validation code
    if (pwd == "") {
        alert("Please provide valid password");
        document.myForm.pwd.focus();
        document.myForm.pwd.style.border = "solid 3px red";
        return false;
    }
    if (!pwd.match(passpattern)) {
        alert("Your password must be at least 8 characters long, contain at least one number, one symbole and have a mixture of uppercase and lowercase letters");
        document.myForm.pwd.focus();
        document.myForm.pwd.style.border = "solid 3px red";
        return false;
    }
    else {
        document.myForm.pwd.focus();
        document.myForm.pwd.style.border = "1px solid";
    }

    //Password validation code end.

    //Address validation code.
    if (address.trim() === "" || address.length < 5) {
        alert("Please enter your Address");
        document.myForm.address.focus();
        document.myForm.address.style.border = "solid 3px red";
        return false;
    }
    else {
        document.myForm.address.focus();
        document.myForm.address.style.border = "1px solid";
    }
    //Adddress validation code end.

    return true; //
}