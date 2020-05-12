// Nav Toggle
var toggle = document.getElementById('nav-toggle');
var target = document.getElementById('nav-target');

function toggleNav() {
    toggle.toggleAttribute('aria-expanded');

    toggle.classList.toggle('is-toggled');
    target.classList.toggle('is-active');
}