var checkbox = document.querySelector("input[name=checkbox]");

checkbox.addEventListener('change', function() {
    const checkBox = document.getElementById("showpassword");
    const loginPassword = document.getElementById("password");
    if (this.checked) {
        loginPassword.type = "text";
    } else {
        loginPassword.type = "password";
    }
});