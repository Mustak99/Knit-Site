
function checkFirstName() {
    var name = document.getElementById("firstname").value;
    var msg = document.getElementById("errormsg1");
    var regx = /^[a-zA-Z]{1,30}$/;

    if (name == "") {
        msg.innerHTML = "First Name field is empty";
        return false;
    }
    else {
        if (regx.test(name)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in First Name field";
            return false;
        }
    }
}


function checkMiddleName() {
    var name = document.getElementById("middlename").value;
    var msg = document.getElementById("errormsg3");
    var regx = /^[a-zA-Z]{1,30}$/;

    if (name == "") {
        msg.innerHTML = "Middle Name field is empty";
        return false;
    }
    else {
        if (regx.test(name)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Middle Name field";
            return false;
        }
    }
}


function checkLastName() {
    var name = document.getElementById("lastname").value;
    var msg = document.getElementById("errormsg5");
    var regx = /^[a-zA-Z]{1,30}$/;

    if (name == "") {
        msg.innerHTML = "Last Name field is empty";
        return false;
    }
    else {
        if (regx.test(name)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Last Name field";
            return false;
        }
    }
}



function emailValid() {
    var email = document.getElementById("useremail").value;
    var msg = document.getElementById("errormsg2");
    var regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (email == "") {
        msg.innerHTML = "Email Id field is empty";
        return false;
    }
    else {
        if (regx.test(email)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Email Id field";
            return false;
        }
    }
}



function checkPhoneNo() {
    var phone = document.getElementById("phoneno").value;
    var msg = document.getElementById("errormsg6");
    var regx = /^[6-9][0-9]{9}$/;

    if (phone == "") {
        msg.innerHTML = "Phone Number field is empty";
        return false;
    }
    else {
        if (regx.test(phone)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Phone Number field";
            return false;
        }
    }
}



function checkUsername() {
    var usetn = document.getElementById("userName").value;
    var msg = document.getElementById("errormsg7");
    var regx = /^[A-Za-z0-9_]{8,15}$/;

    if (usetn == "") {
        msg.innerHTML = "Username field is empty";
        return false;
    }
    else {
        if (regx.test(usetn)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Username field";
            return false;
        }
    }
}






function checkPassword() {
    var pwd = document.getElementById("userpassword").value;
    var msg = document.getElementById("errormsg8");
    var regx = /^[A-Za-z0-9_]{8,12}$/;

    if (pwd == "") {
        msg.innerHTML = "Password field is empty";
        return false;
    }
    else {
        if (regx.test(pwd)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Password field";
            return false;
        }
    }
}



function checkConfPassword() {
    var pwd = document.getElementById("confPassword").value;
    var pwd2 = document.getElementById("userpassword").value;
    var msg = document.getElementById("errormsg9");
    var regx = /^[A-Za-z0-9_]{8,12}$/;

    if (pwd == "") {
        msg.innerHTML = "Confirm Password field is empty";
        return false;
    }
    else {
        if (pwd == pwd2) {
            return true;
        }
        else {
            msg.innerHTML = "Passwords does not match";
            return false;
        }
    }
}




function checkPincode() {
    var pincode = document.getElementById("pincode").value;
    var msg = document.getElementById("errormsg10");
    var regx = /^[0-9]{6}$/;

    if (pincode == "") {
        msg.innerHTML = "Pincode field is empty";
        return false;
    }
    else {
        if (regx.test(pincode)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Pincode field";
            return false;
        }
    }
}


function checkAddress() {
    var address = document.getElementById("address").value;
    var msg = document.getElementById("errormsg11");
    var regx = /^[A-Za-z0-9 /,-]{1,50}$/;

    if (address == "") {
        msg.innerHTML = "Address field is empty";
        return false;
    }
    else {
        if (regx.test(address)) {
            return true;
        }
        else {
            msg.innerHTML = "Invalid value in Address field";
            return false;
        }
    }
}



function formValidForm() {
    var fname = checkFirstName();
    var mname = checkMiddleName();
    var lname = checkLastName();
    var phoneno =checkPhoneNo();
    var uname = checkUsername();
    var email = emailValid();
    var pwd = checkPassword();
    var cpwd = checkConfPassword();
    var pincode = checkPincode();
    var address = checkAddress();


    if (fname && mname && lname && phoneno && uname && email && pwd && cpwd && pincode && address) {
        return true;
    }
    else {
        return false;
    }

}



function formUpdateValidForm() {
    var fname = checkFirstName();

    if (fname) {
        return true;
    }
    else {
        return false;
    }

}