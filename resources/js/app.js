import './bootstrap';
import 'tw-elements';

// contoh inisialisasi komponen tertentu (opsional)
import { Tooltip, initTWE } from "tw-elements";
initTWE({ Tooltip });


// HAMBURGER
   document.addEventListener("DOMContentLoaded", function () {
        const hamburgerBtn = document.getElementById("hamburgerBtn");
        const mobileMenu = document.getElementById("mobileMenu");
        const closeBtn = document.getElementById("closeBtn");

        if (!hamburgerBtn || !mobileMenu || !closeBtn) {
            console.warn("Hamburger or menu element not found!");
            return;
        }

        hamburgerBtn.addEventListener("click", () => {
            mobileMenu.classList.remove("hidden");
        });

        closeBtn.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
        });

        document.addEventListener("click", (e) => {
            const isClickInside = mobileMenu.contains(e.target) || hamburgerBtn.contains(e.target);
            if (!isClickInside) {
                mobileMenu.classList.add("hidden");
            }
        });
    });

