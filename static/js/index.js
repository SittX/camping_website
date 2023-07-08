// Hamburger menu
const hamburgerBtn = document.getElementById("hamburger-menu");
const navMenu = document.querySelector(".nav");

hamburgerBtn.addEventListener("click", ()=>{
    navMenu.classList.toggle("show");
});


// Search input filtering
const searchInput = document.getElementById("search__input");
const campsites = document.querySelectorAll("#campsite-card-container .card--pitchTypes");
console.log(searchInput);
console.log(campsites);
// function inputFilter(){
//     let inputValue = searchInput.value.toLowerCase();
//
//     campsites.forEach(campsite => {
//         const locationValue = campsite.getAttribute("data-campsite-location").toLowerCase();
//         if (locationValue.includes(inputValue)) {
//             campsite.style.display = "block";
//             console.log(locationValue);
//         } else {
//             campsite.style.display = "none";
//         }
//     })
// }
searchInput.addEventListener("input",()=>{
    let inputValue = searchInput.value.toLowerCase();
    campsites.forEach(campsite => {
        const locationValue = campsite.getAttribute("data-campsite-location").toLowerCase();
        if (locationValue.includes(inputValue)) {
            campsite.style.display = "block";
            console.log(locationValue);
        } else {
            campsite.style.display = "none";
        }
    })
});

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


// Details modal
const reviewModalBtn = document.getElementById("review_modal_btn");
const bookingModalBtn = document.getElementById("booking_modal_btn");
const detailModalOverlay = document.getElementById('details-modal-bg');

reviewModalBtn.addEventListener("click",()=>{
    console.log("Review modal btn clicked");
    const reviewModal = document.getElementById("review-modal");
    reviewModal.classList.add("active");
});

bookingModalBtn.addEventListener("click",()=>{
    console.log("Booking modal btn clicked");
    const bookingModal = document.getElementById("booking-modal");
    bookingModal.classList.add("active");
})

detailModalOverlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active');
    modals.forEach(modal => {
        closeModal(modal);
    });
});





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
