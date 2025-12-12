import './bootstrap';
import * as bootstrap from 'bootstrap';

const stars = document.querySelectorAll(".simple-rating .star");
const ratingInput = document.getElementById("ratingValue");

// Star Input
stars.forEach((star) => {
    star.addEventListener("click", function () {
        const value = this.dataset.value;
        ratingInput.value = value;

        stars.forEach(s => s.classList.remove("filled"));

        for (let i = 0; i < value; i++) {
            stars[i].classList.add("filled");
        }
    });
});

// Read More Review Modal
document.addEventListener("DOMContentLoaded", function () {
    const modal = new bootstrap.Modal(document.getElementById('reviewModal'));

    document.querySelectorAll(".read-more-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            document.getElementById("modalReviewName").innerText = this.dataset.name;
            document.getElementById("modalReviewRating").innerHTML =
                `${this.dataset.rating} ${this.dataset.stars}`;
            document.getElementById("modalReviewText").innerText = this.dataset.review;

            modal.show();
        });
    });
});

// + / - Button Add Ons
document.querySelectorAll('.plus-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const input = document.getElementById(this.dataset.input);
        input.value = parseInt(input.value) + 1;
    });
});

document.querySelectorAll('.minus-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const input = document.getElementById(this.dataset.input);
        input.value = Math.max(0, parseInt(input.value) - 1);
    });
});

// Payment Virtual Account
document.querySelector('[data-bs-target="#VirtualAccount]').addEventListener('click', function () {
    const icon = document.getElementById('virtualAccount');
});