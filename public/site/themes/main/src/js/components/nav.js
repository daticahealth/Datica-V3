// handles navigation toggle on mobile nav; various other nav functions
// for non-js users, might need a way to display navigation, or at footer
(function() {
    var toggler = document.querySelector('.toggle-me'); // menu toggle
    var toggleTarget = document.querySelector('.toggle-target'); // target to show/hide

    toggler.addEventListener('click', function() { // toggle() is pretty recent vanilla JS, support is strong
         toggler.toggleAttribute('aria-expanded'); // this adds the attribute for accessibilty - but not the boolean state. A starting point
         toggleTarget.classList.toggle('is-active');
         toggler.classList.toggle('is-toggled');
    });
})();

// document.querySelector("#nav-toggle")
//     .addEventListener("click", function () {
//         this.classList.toggle("active");
//         });

// if (document.querySelector(".alert-close-button")) {
//     document.querySelector(".alert-close-button")
//         .addEventListener("click", function () {
//             document.querySelector(".alert-modal").remove();
//     });
// }