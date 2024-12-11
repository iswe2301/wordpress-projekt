"use strict";

// Kör koden när hela sidan har laddats
document.addEventListener('DOMContentLoaded', () => {
    // Hämta element
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const mobileMenu = document.querySelector(".mobile-menu");
    const overlay = document.querySelector(".mobile-menu-overlay");

    // Lägg till eventlyssnare vid klick på hamburgarmenyn
    hamburgerMenu.addEventListener("click", () => {
        // Lägg till klassen "open" till hamburgermenyn och mobilmenyn
        const isOpen = mobileMenu.classList.contains("open");

        // Om klassen "open" finns, ta bort den, annars lägg till den
        mobileMenu.classList.toggle("open", !isOpen);
        overlay.classList.toggle("open", !isOpen);
        hamburgerMenu.classList.toggle("open", !isOpen);
    });

    // Lägg till eventlyssnare vid klick på overlayen
    overlay.addEventListener("click", () => {
        // Ta bort klassen "open" från hamburgermenyn och mobilmenyn
        mobileMenu.classList.remove("open");
        overlay.classList.remove("open");
        hamburgerMenu.classList.remove("open");
    });

    // Lägg till eventlyssnare vid klick på länkar i mobilmenyn
    document.querySelectorAll(".mobile-menu a").forEach(link => {
        link.addEventListener("click", () => {
            // Ta bort klassen "open" från hamburgermenyn och mobilmenyn
            mobileMenu.classList.remove("open");
            overlay.classList.remove("open");
            hamburgerMenu.classList.remove("open");
        });
    });
});