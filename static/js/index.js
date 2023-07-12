// Hamburger menu
const hamburgerBtn = document.getElementById("hamburger-menu");
const navMenu = document.querySelector(".nav");

hamburgerBtn.addEventListener("click", () => {
    navMenu.classList.toggle("show");
});


// Search input filtering
const searchInput = document.getElementById("search__input");
const campsites = document.querySelectorAll("#campsite-card-container .card--pitchTypes");

searchInput.addEventListener("input", () => {
    let inputValue = searchInput.value.toLowerCase();
    campsites.forEach(campsite => {
        const locationValue = campsite.getAttribute("data-campsite-location").toLowerCase();
        if (locationValue.includes(inputValue)) {
            campsite.style.display = "block";
            console.log(locationValue);
        } else {
            campsite.style.display = "none";
        }
    });
});

console.log("Loaded");
// Modal
const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('modal-bg')

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
        closeModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal')
        closeModal(modal)
    })
})
function openModal(modal) {
    if (modal == null) return;
    modal.classList.add('active');
    detailModalOverlay.classList.add('active');
}

function closeModal(modal) {
    if (modal == null) return;
    modal.classList.remove('active');
    detailModalOverlay.classList.remove('active');
}

// Detailed view image selector
let currentImageId = "img-0";
function smallImageClicked(imgId) {
    let showcaseImage = document.getElementById("showcase-image");
    let previewImage = document.getElementById(imgId);
    showcaseImage.src = previewImage.src;
    let newElement = imgId;
    previewImage.className = "detail-img active";
    let currentOnActiveEl = document.getElementById(currentImageId);
    currentOnActiveEl.className = "non";
    // currentActiveId = newElement;
}

// Accept Cookie section
const cookieBanner = document.getElementById("cookie-banner");
const cookieAcceptBtn = document.getElementById("cookie-accept-btn");
const cookieDeclineBtn = document.getElementById("cookie-decline-btn");

cookieAcceptBtn.addEventListener("click",()=>{
    console.log("Accept btn clicked");
   cookieBanner.classList.add("close-btn");
});

cookieDeclineBtn.addEventListener("click",()=>{
    console.log("Decline btn clicked");
    cookieBanner.classList.add("close-btn");
});

// Account
const accountBtn = document.getElementById("account-container-btn");
const accountContainer = document.getElementById("account-container-wrapper");
let btnClicked = false;

accountBtn.addEventListener("click",()=>{
    if(!btnClicked){
        console.log("Button clicked");
        accountContainer.classList.add("active");
    }else{
        accountContainer.classList.remove("active");
    }
    btnClicked = !btnClicked;
})