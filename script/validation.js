function validateForm(formtype){
    var typeOfForm = formtype;
    
    if(typeOfForm == "register"){
        console.log("Register form validation function called");
        RegisterForm();
    }
    if(typeOfForm == "login"){
        console.log("Login form validation function called")
    }
}
function RegisterForm(){
    var fullname = $('#fullname').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var rep_password = $('#con-password').val();
    
    var errors = [];
    
    if(!fullname.match(/^[A-Za-z\s]+$/)){
        $(".nameErr").html("Name must contain only letters and spaces");
        errors.push("fullname error");
    }
    $('#fullname').on("focus", function(){
        $(".nameErr").html("");
        remove_array_element(errors, "fullname error");
    });
    
    if(phone === ""){
        $(".phoneErr").html("Phone number is required");
        errors.push("phone error");
    }
    $('#phone').on("focus", function(){
        $(".phoneErr").html("");
        remove_array_element(errors, "phone error");
    });
    
    if(!email.match(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/)){
        $(".emailErr").html("Enter a valid Email Address");
        errors.push("email error");
    }
    $('#email').on("focus", function(){
        $(".emailErr").html("");
        remove_array_element(errors, "email error");
    });
    
    if(password === ""){
        $(".passwordErr").html("Password required");
        errors.push("password error");
    }
    $('#password').on("focus", function(){
        $(".passwordErr").html("");
        remove_array_element(errors, "password error");
    });
    
    if(rep_password === "" || rep_password !== password){
        $(".conPasswordErr").html("Passwords must match");
        errors.push("confirm password error");
    }
    $('#con-password').on("focus", function(){
        $(".conPasswordErr").html("");
        remove_array_element(errors, "confirm password error");
    });
    
//    console.log(errors.length);
//    console.log(errors);
    
    if(errors.length == 0){
        document.getElementById("sign-up-form").removeAttribute("onsubmit");
        alert('validation successful!')
    }
}
