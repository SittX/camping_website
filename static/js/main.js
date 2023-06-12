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


// Slider actions
const carousel = document.querySelector(".carousel");
firstImage = carousel.querySelectorAll("img")[0];
arrowIcons = document.querySelectorAll(".wrapper i");

let 