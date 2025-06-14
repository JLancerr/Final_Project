// Function for section switching
function showTab(tabId) {
    var tabs = document.getElementsByTagName("section");
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
    }
    document.getElementById(tabId).style.display = "block";
}


window.addEventListener('load', function() {
    showTab('profile');
});

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}






