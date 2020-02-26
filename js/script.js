//alert("Connected");
function validateRegister(){
    if (document.regForm.names.value=="") {
        document.regForm.names.focus();
        document.getElementById("messageNames").innerHTML = "Fill out Names";
        return false;
    }else{
        document.getElementById("messageNames").innerHTML = "";        
    }
    if (document.regForm.emails.value=="") {
        document.regForm.emails.focus();
        document.getElementById("messageEmails").innerHTML = "Fill out Email";
        return false;
    }else{
        document.getElementById("messageEmails").innerHTML = "";        
    }
    if (document.regForm.dob.value=="") {
        document.regForm.dob.focus();
        document.getElementById("messageDob").innerHTML = "Date of birth is required";
    }else{
        document.getElementById("messageDob").innerHTML = "";        
    }
    if (document.regForm.passwords.value=="") {
        document.regForm.passwords.focus();
        document.getElementById("messagePassword").innerHTML = "Password are required";
    }else{
        document.getElementById("messagePassword").innerHTML = "";        
    }
    if (document.regForm.usernames.value=="") {
        document.regForm.usernames.focus();
        document.getElementById("messageUsername").innerHTML = "Fill out username";
    }else{
        document.getElementById("messageUsername").innerHTML = "";        
    }
    
    return true;
}