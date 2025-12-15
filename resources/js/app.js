import './bootstrap';
import * as bootstrap from 'bootstrap';

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