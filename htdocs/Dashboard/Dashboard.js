let products = document.getElementsByClassName("product");
let payments = document.getElementsByClassName("payment");
let currentchosenpayment = null;
let currentChosen = null;

for (let i = 0; i < products.length; i++) {
    let product = products[i];
    let innerDiv = product.querySelector("div");

    product.addEventListener("mouseover", () => {
        if (innerDiv !== currentChosen) {
            innerDiv.style.backgroundColor = "rgb(198, 196, 196)";
        }
    });

    product.addEventListener("mouseout", () => {
        if (innerDiv !== currentChosen) {
            innerDiv.style.backgroundColor = "white";
        }
    });

    product.addEventListener("click", () => {
        if (currentChosen && currentChosen !== innerDiv) {
            currentChosen.style.backgroundColor = "white";
        }
        currentChosen = innerDiv;
        innerDiv.style.backgroundColor = "rgb(198, 196, 196)";
    });
}

for (let i = 0; i < payments.length; i++) {
    let payment = payments[i];
    let innerDiv = payment.querySelector("div");

    payment.addEventListener("mouseover", () => {
        if (innerDiv !== currentchosenpayment) {
            innerDiv.style.backgroundColor = "rgb(198, 196, 196)";
        }
    });

    payment.addEventListener("mouseout", () => {
        if (innerDiv !== currentchosenpayment) {
            innerDiv.style.backgroundColor = "white";
        }
    });

    payment.addEventListener("click", () => {
        if (currentchosenpayment && currentchosenpayment !== innerDiv) {
            currentchosenpayment.style.backgroundColor = "white";
        }
        currentchosenpayment = innerDiv;
        innerDiv.style.backgroundColor = "rgb(198, 196, 196)";
    });
}
