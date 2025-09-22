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

// JS UNTUK RATING
document.querySelectorAll('[id^="rating-"]').forEach(rating => {
            const stars = rating.querySelectorAll('.star');
            const ratingValue = rating.querySelector('.rating-value');

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    let value = star.getAttribute('data-value');
                    ratingValue.textContent = value;

                    stars.forEach(s => {
                        s.classList.remove('text-yellow-400');
                        s.classList.add('text-gray-300');
                    });

                    for (let i = 0; i < value; i++) {
                        stars[i].classList.add('text-yellow-400');
                        stars[i].classList.remove('text-gray-300');
                    }
                });
            });
        });


// love buton
const loveBtn = document.getElementById('love-btn');
const loveIcon = document.getElementById('love-icon');

loveBtn.addEventListener('click', () => {
  if(loveIcon.classList.contains('fill-current')){
    // jika sudah aktif, reset
    loveIcon.classList.remove('fill-current', 'text-red-700');
    loveIcon.classList.add('text-gray-400');
  } else {
    // aktifkan
    loveIcon.classList.add('fill-current', 'text-red-700');
    loveIcon.classList.remove('text-gray-400');
  }
});

     




