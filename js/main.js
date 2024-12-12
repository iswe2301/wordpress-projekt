"use strict";

// Kör koden när hela sidan har laddats
document.addEventListener('DOMContentLoaded', () => {
    // Hämta element
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const mobileMenu = document.querySelector(".mobile-menu");
    const overlay = document.querySelector(".mobile-menu-overlay");
    const video = document.querySelector(".hero-video");
    const videoControl = document.querySelector("#video-control");

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

    // Kontrollera om videoelementet finns
    if (videoControl) {

        // Hämta ikonen i knappen
        const icon = videoControl.querySelector("i");

        // Lägg till eventlyssnare vid klick på play/pause-knappen
        videoControl.addEventListener("click", () => {
            // Om videon är pausad, spela upp videon, byt ikon till paus-ikonen och ändra aria-label
            if (video.paused) {
                video.play();
                icon.classList.remove("fa-play");
                icon.classList.add("fa-pause");
                video.setAttribute("aria-label", "Pausa video");
                // Annars pausa videon, byt ikon till play-ikonen och ändra aria-label
            } else {
                video.pause();
                icon.classList.remove("fa-pause");
                icon.classList.add("fa-play");
                video.setAttribute("aria-label", "Spela video");
            }
        });
    }
});