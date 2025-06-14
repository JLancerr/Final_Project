function redirect() {
    window.location.href = "../Login Page/login.php";
}

function check(element) {
    if (!element.checkValidity()) {
        element.classList.remove("is-valid");
        element.classList.add("is-invalid");
    } else {
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
    }
}

function checkPass(element) {
    let password = document.getElementById("password");
    let confirm = document.getElementById("confirm");
    if ((element.value !== password.value || element.value !== confirm.value) || !(element.checkValidity())) {
        password.classList.remove("is-valid");
        password.classList.add("is-invalid");
        confirm.classList.remove("is-valid");
        confirm.classList.add("is-invalid");
    } else {
        password.classList.remove("is-invalid");
        password.classList.add("is-valid");
        confirm.classList.remove("is-invalid");
        confirm.classList.add("is-valid");
    }
}