"use strict";

// Kör koden när hela sidan har laddats
document.addEventListener('DOMContentLoaded', () => {
    // Hämta element
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const mobileMenu = document.querySelector(".mobile-menu");
    const overlay = document.querySelector(".mobile-menu-overlay");
    const video = document.querySelector(".hero-video");
    const videoControl = document.querySelector("#video-control");
    const headerPuff = document.getElementById("header-puff");
    const headerContainer = document.querySelector(".header-container");

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
    if (video) {
        // Visa play/pause-knappen
        videoControl.style.display = "flex";

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
    } else if (videoControl) {
        // Dölj play/pause-knappen om videon inte finns
        videoControl.style.display = "none";
    }

    // Kontrollera om header-puffen och header-container finns
    if (headerPuff && headerContainer) {
        const puffHeight = headerPuff.offsetHeight; // Hämta höjden på puffen
        headerContainer.style.top = `${puffHeight}px`; // Flytta ner header-container med puffens höjd

        let originalTop = 0; // Sätt ursprungspositionen till 0 för toppositionen

        // Kontrollera om hamburgermenyn finns
        if (hamburgerMenu) {
            originalTop = parseFloat(getComputedStyle(hamburgerMenu).top); // Hämta nuvarande värdet på toppositionen
            hamburgerMenu.style.top = `${originalTop + puffHeight}px`; // Flytta ner hamburgermenyn med puffens höjd
        }

        // Skapa en animation för texten i puffen
        const animatedText = document.getElementById("animated-text"); // Hämta elementet som ska animeras
        const textWidth = animatedText.offsetWidth; // Textens bredd
        const viewportWidth = window.innerWidth; // Skärmens bredd
        const totalDistance = textWidth + viewportWidth; // Totalt avstånd som texten ska röra sig
        const speed = 100; // Hastighet i px per sekund 
        const duration = totalDistance / speed; // Varaktighet i sekunder

        // Skapa animationen och lägg till den i stylesheeten på elementet
        const styleSheet = document.styleSheets[0]; // Hämta stylesheeten
        // Lägg till en ny regel för keyframes
        styleSheet.insertRule(`
                @keyframes slide-in-out {
                    0% {
                        transform: translateX(${viewportWidth}px);
                    }
                    100% {
                        transform: translateX(-${textWidth}px);
                    }
                }
            `, styleSheet.cssRules.length);

        animatedText.style.animation = `slide-in-out ${duration}s linear infinite`;

        // Funktion för att uppdatera positionen på header-container
        const updateHeaderPosition = () => {
            const puffHeight = headerPuff.offsetHeight; // Hämta höjden på puffen
            headerContainer.style.top = `${puffHeight}px`; // Flytta ner header-container med puffens höjd

            // Kontrollera om hamburgermenyn finns och flytta ner den
            if (hamburgerMenu) {
                hamburgerMenu.style.top = `${puffHeight + originalTop}px`;
            }
        };

        // Lägg till eventlyssnare vid scroll
        window.addEventListener("scroll", () => {

            // Hämta aktuell scrollposition
            const currentScrollPosition = window.scrollY;

            // Kontrollera om skrollningen har passerat 100px
            if (currentScrollPosition > 100) {
                // Kontrollera om puffen är synlig och dölj den isåfall
                if (!headerPuff.classList.contains("hidden")) {
                    headerPuff.classList.add("hidden");
                    headerContainer.classList.add("no-puff"); // Flytta upp header-container
                    headerContainer.style.top = "0";
                    // Kontrollera om hamburgermenyn finns och flytta upp den
                    if (hamburgerMenu) {
                        hamburgerMenu.style.top = "0.8rem";
                    }
                }
                // Annars om skrollningen är mindre än 100px och puffen är dold, visa puffen
            } else {
                if (headerPuff.classList.contains("hidden")) {
                    headerPuff.classList.remove("hidden");
                    headerContainer.classList.remove("no-puff");
                    updateHeaderPosition(); // Anropa funktionen för att uppdatera positionen
                }
            }
        });

    } else {
        // Om puffen inte finns, återställ till standardvärden
        headerContainer.style.top = "0"

        // Kontrollera om hamburgermenyn finns
        if (hamburgerMenu) {
            hamburgerMenu.style.top = "0.8rem"; // Återställ till standardvärde
        }
    }
});