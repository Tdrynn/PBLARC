import './bootstrap';
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

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

// Hide / Unhide Password
document.addEventListener("DOMContentLoaded", function () {

    function toggle(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            input.type = "password";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        }
    }

    document.getElementById("togglePassword").addEventListener("click", function () {
        toggle("password", "iconPassword");
    });

    document.getElementById("toggleConfirm").addEventListener("click", function () {
        toggle("confirmPassword", "iconConfirm");
    });

});

// + / - Button Add Ons
document.querySelectorAll('.plus-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const input = document.getElementById(btn.dataset.target);
        input.value = parseInt(input.value) + 1;
        input.dispatchEvent(new Event('change'));
    });
});

document.querySelectorAll('.minus-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const input = document.getElementById(btn.dataset.target);
        if (input.value > 0) {
            input.value = parseInt(input.value) - 1;
            input.dispatchEvent(new Event('change'));
        }
    });
}); 