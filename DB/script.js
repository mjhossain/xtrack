var errorsArr = []
var password_success = 0

function validateForm(){
    var name = document.getElementById("name")
    var email = document.getElementById("email")
    var password = document.getElementById("password")
    var conf_password = document.getElementById("conf-password")
    
    var special_char = "^[a-zA-Z ]+$"
    var is_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
    var name_err = document.getElementById("name-err")
    var email_err = document.getElementById("email-err")
    var pass_err = document.getElementById("pass-err")
    var con_pass_err = document.getElementById("con-pass-err")
    var errors = ["Please fill out this field"]
    
    if(name.value == ""){ //check if name is empty
        name_err.innerHTML = errors[0]
        name_err.style.display = "block"
        name.style.borderColor = "red"
        errorsArr[0] = errors[0]
    }else if(!name.value.match(special_char)){ //check if name contains unwanted characters
        name_err.innerHTML = "Your name must include only letters and spaces"
        name_err.style.display = "block"
        name.style.borderColor = "red"
        errorsArr[0] = "Your name must include only letters and spaces"
    }else if(email.value == ""){ //check if email is empty
        email_err.innerHTML = errors[0]
        email_err.style.display = "block"   
        email.style.borderColor = "red"
        errorsArr[0] = errors[0]
    }else if(!is_email.test(email.value)){ //check whether email is valid or not
        email_err.innerHTML = "Please enter a valid email address"
        email_err.style.display = "block"
        email.style.borderColor = "red"
        errorsArr[0] = "Please enter a valid email address"
    }else if(password.value == ""){ //check if email is empty
        pass_err.innerHTML = errors[0] 
        pass_err.style.display = "block"
        password.style.borderColor = "red"
        errorsArr[0] = errors[0]
    }else if(password.value !== conf_password.value){
        con_pass_err.innerHTML = "Passwords don't match!"
        con_pass_err.style.display = "block"
        conf_password.style.borderColor = "red"
        errorsArr[0] = "Passwords don't match!"
    }
//    alert(errorsArr.length)
}

function removeErrors(){
    var name = document.getElementById("name")
    var email = document.getElementById("email")
    
    var name_err = document.getElementById("name-err")
    var email_err = document.getElementById("email-err")
    
    var conf_password = document.getElementById("conf-password")
    var con_pass_err = document.getElementById("con-pass-err")
    
    if(name.value != ""){ //check if name is empty
        name_err.innerHTML = ""
        name_err.style.display = "none"
        name.style.borderColor = "#dfdfdf"
        errorsArr.pop()
    }
    
    if(email.value != ""){ //check if name is empty
        email_err.innerHTML = ""
        email_err.style.display = "none"
        email.style.borderColor = "#dfdfdf"
        errorsArr.pop()
    }
    
    if(conf_password.value != ""){ //check if name is empty
        con_pass_err.innerHTML = ""
        con_pass_err.style.display = "none"
        conf_password.style.borderColor = "#dfdfdf"
        errorsArr.pop()
    }
}

function passwordCheck(){
    var password_success_count = 0
    var password = document.getElementById("password").value
    var password_input = document.getElementById("password")
    var conf_password = document.getElementById("conf-password").value
    var con_pass_err = document.getElementById("con-pass-err")
    
    var char_long = document.getElementById("has-char")
    var low = document.getElementById("has-lowerc")
    var up = document.getElementById("has-upperc")
    var num = document.getElementById("has-num")
    var passwordlist = document.getElementById("passwordlist")
    var pass_err = document.getElementById("pass-err")
    var number = /[0-9]/
    var low_case = /[a-z]/
    var upp_case = /[A-Z]/
    
    var errors = ["Please fill out this field"]
    
    pass_err.innerHTML = "" 
    pass_err.style.display = "none"
    password_input.style.borderColor = "#dfdfdf"
    
    if(password.length >= 8){
        char_long.classList.add("valid")
        password_success_count+=1
    }else{
        char_long.classList.remove("valid")
        password_success_count-=1
    }
    
    if(password.match(low_case)){
        low.classList.add("valid")
        password_success_count+=1
    }else{
        low.classList.remove("valid")
        password_success_count-=1
    }
    
    if(password.match(upp_case)){
        up.classList.add("valid")
        password_success_count+=1
    }else{
        up.classList.remove("valid")
        password_success_count-=1
    }
    
    if(password.match(number)){
        num.classList.add("valid")
        password_success_count+=1
    }else{
        num.classList.remove("valid")
        password_success_count-=1
    }
    
    if(password_success_count == 4){
        password_success = password_success_count
        passwordlist.style.display="none"
    }else{
        passwordlist.style.display="block"
    }
}

function isValid(){
    if(password_success == 4 && errorsArr.length == 0){
        //if js form validation is successful execute the following        
        document.getElementById("sign-up-form").removeAttribute("onsubmit");
    }
}