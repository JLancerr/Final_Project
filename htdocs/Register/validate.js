function checkInput(element) {
    if (!element.checkValidity()) {
        element.classList.remove("is-valid");
        element.classList.add("is-invalid");
    } else {
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
    }
}

const password = document.getElementById("regpassword");
const confirmpassword = document.getElementById("confirmregpassword");
const passerror = document.getElementById("notmatch");

function checkPassword(element) {
    if (password.value != confirmpassword.value) {
        password.setCustomValidity("Passwords don't match!")
        confirmpassword.setCustomValidity("Passwords don't match!")
        console.log("Error");
        passerror.style.display = "block";
        password.classList.remove("is-valid");
        password.classList.add("is-invalid");
        confirmpassword.classList.remove("is-valid");
        confirmpassword.classList.add("is-invalid");
    } else if (password.value == confirmpassword.value) {
        password.setCustomValidity("")
        confirmpassword.setCustomValidity("")
        console.log("success");
        passerror.style.display = "none";
        password.classList.remove("is-invalid");
        password.classList.add("is-valid");
        confirmpassword.classList.remove("is-invalid");
        confirmpassword.classList.add("is-valid");
    }
}

function showpassword() {
    const checkBox = document.getElementById("showpassword");
    const loginPassword = document.getElementById("password");

    if (checkBox.checked == true) {
        loginPassword.type = "text";
    } else {
        loginPassword.type = "password";
}
}

function registershowpassword() {
    const password = document.getElementById("regpassword");
    const confirmpassword = document.getElementById("confirmregpassword");
    const checkBox = document.getElementById("showregpassword");

        if (checkBox.checked == true) {
            password.type = "text";
            confirmpassword.type = "text";
        } else {
            password.type = "password";
            confirmpassword.type = "password";
        }
}