// Function for media queries
const mediaQuery = window.matchMedia('(max-width: 600px)');
const navigationBar = document.getElementById("navbar");
const navbarButton = document.getElementsByClassName("navButton");
const nameplate = document.getElementById("nameplate");
const profilestatus = document.getElementById("profile-status");
const responsiveNameplate = document.getElementById("responsive-nameplate");
const responsiveStatus = document.getElementById("responsive-status");
const fileform = document.getElementById("filesubmit");
const profileform = document.getElementById("editprof");


function handleMediaQueryChange(event) {
  if (event.matches) {
    console.log("Screen size is 600px or lower!");
    navigationBar.classList.add("offcanvas", "offcanvas-start");
    for (let i = 0; i < navbarButton.length; i++) {
        navbarButton[i].style.display = "block";
    }
    nameplate.style.display = "none";
    profilestatus.style.display = "none";
    responsiveNameplate.style.display = "block";
    responsiveStatus.style.display = "block";
  } else {
    console.log("Screen size is larger than 600px!");
  }
}

mediaQuery.addEventListener("change", handleMediaQueryChange);

// Initial check
handleMediaQueryChange(mediaQuery);

// Function for submitting activities
function submit() {
  fileform.submit();
}

// More Advanced function to show profile picture
const fileInput = document.getElementById('profilepic');
const imagePreview = document.getElementById('previewimg2');

fileInput.addEventListener('change', function (event) {
    if (this.files && this.files[0]) {
        const fileSelected = this.files[0];
        if (fileSelected.type.startsWith('image/')) {
            // document.getElementById("picError").style.display = "none";
            let reader = new FileReader();
            reader.onload = (event) => { imagePreview.src = event.target.result; }
            reader.readAsDataURL(fileSelected);
        } else {
            imagePreview.src = "images/default.jpg";
            // document.getElementById("picError").style.display = "block";
        }
    }
});



