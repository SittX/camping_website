const dropdownBtn = document.querySelectorAll(".dropdown__btn");
const dropdown = document.querySelectorAll(".dropdown");
const hamburgerBtn = document.getElementById("hamburger-menu");
const navMenu = document.querySelector(".nav");
const links = document.querySelectorAll(".dropdown a");

function setAriaExpandedFalse() {
    dropdownBtn.forEach((btn) => btn.setAttribute("aria-expanded", "false"));
}

function closeDropdownMenu() {
    dropdown.forEach((drop) => {
        drop.classList.remove("active");
        drop.addEventListener("click", (e) => e.stopPropagation());
    });
}

function toggleHamburger() {
    navMenu.classList.toggle("show");
}

dropdownBtn.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        const dropdownIndex = e.currentTarget.dataset.dropdown;
        const dropdownElement = document.getElementById(dropdownIndex);

        dropdownElement.classList.toggle("active");
        dropdown.forEach((drop) => {
            if (drop.id !== btn.dataset["dropdown"]) {
                drop.classList.remove("active");
            }
        });
        e.stopPropagation();
        btn.setAttribute(
            "aria-expanded",
            btn.getAttribute("aria-expanded") === "false" ? "true" : "false"
        );
    });
});

// close dropdown menu when the dropdown links are clicked
links.forEach((link) =>
    link.addEventListener("click", () => {
        closeDropdownMenu();
        setAriaExpandedFalse();
        toggleHamburger();
    })
);

// close dropdown menu when you click on the document body
document.documentElement.addEventListener("click", () => {
    closeDropdownMenu();
    setAriaExpandedFalse();
});

// close dropdown when the escape key is pressed
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        closeDropdownMenu();
        setAriaExpandedFalse();
    }
});

// toggle hamburger menu
hamburgerBtn.addEventListener("click", toggleHamburger);


// Popup form
function closeForm() {
    let formPopupBg = document.querySelector('.popup-form__bg');
    formPopupBg.classList.remove('is-visible');
}

document.addEventListener('DOMContentLoaded',  ()=> {
    const openPopupBtn = document.getElementById('open_popup_btn');
    const popupBg = document.querySelector('.popup-form__bg');

    /* Contact Form Interactions */
    openPopupBtn.addEventListener('click', (event)=> {
        event.preventDefault();
        console.log("Open btn clicked")
        popupBg.classList.add('is-visible');
    });

    // close popup when clicking x or off popup
    popupBg.addEventListener('click', function (event) {
        let target = event.target;
        if (target.classList.contains('popup-form__bg') || target.id === 'close_popup_btn') {
            event.preventDefault();
            popupBg.classList.remove('is-visible');
        }
    });
});


const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('modal-bg')

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        console.log("Clicked");
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
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}

// Searchbox filtering
const searchboxInput = document.getElementById("searchbox-input");
const campsites = document.querySelectorAll("#campsite__container .campsite")

searchboxInput.addEventListener("input", e => {
    let inputValue = searchboxInput.value.toLowerCase();

    campsites.forEach(campsite => {
        const locationValue = campsite.getAttribute("data-campsite-location").toLowerCase();
        if (locationValue.includes(inputValue)) {
            campsite.style.display = "block";
            console.log(locationValue);
        } else {
            campsite.style.display = "none";
        }
    })

})

// Details page image preview actions
var currentImageId = "img-0";

function smallImageClicked(imgId) {
    var showcaseImage = document.getElementById("showcase-image");
    var previewImage = document.getElementById(imgId);
    showcaseImage.src = previewImage.src;
    var newEl = imgId;
    previewImage.className = "detail-img active";
    var currentOnActiveEl = document.getElementById(currentImageId);
    currentOnActiveEl.className = "non";
    currentActiveId = newEl;
}
