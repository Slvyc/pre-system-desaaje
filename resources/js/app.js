import './bootstrap';
import 'tw-elements';

// contoh inisialisasi komponen tertentu (opsional)
import { Tooltip, initTWE } from "tw-elements";
initTWE({ Tooltip });


// HAMBURGER
document.addEventListener("DOMContentLoaded", function () {
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    const overlay = document.getElementById("overlay");
    const closeBtn = document.getElementById("closeBtn");

    // buka menu
    hamburgerBtn.addEventListener("click", () => {
        mobileMenu.classList.remove("hidden");
        overlay.classList.remove("hidden");
        setTimeout(() => {
            mobileMenu.classList.remove("translate-x-full");
            mobileMenu.classList.add("translate-x-0");
            overlay.classList.add("opacity-100");
        }, 10);
    });

    // fungsi tutup
    function closeMenu() {
        mobileMenu.classList.remove("translate-x-0");
        mobileMenu.classList.add("translate-x-full");
        overlay.classList.remove("opacity-100");

        setTimeout(() => {
            mobileMenu.classList.add("hidden");
            overlay.classList.add("hidden");
        }, 300);
    }

    // tombol close & klik overlay
    closeBtn.addEventListener("click", closeMenu);
    overlay.addEventListener("click", closeMenu);
});




