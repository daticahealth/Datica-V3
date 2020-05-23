import tippy, { sticky } from 'tippy.js';
import 'tippy.js/dist/tippy.css';

/**
 * Tooltips (used in the Leadership page)
 */

var tooltips = document.querySelectorAll('[data-tooltip="true"]');

if (tooltips.length > 0) {
    for (var i = 0; i < tooltips.length; i++) {
        var tooltipElement = tooltips[i];

        tippy(tooltipElement, {
            content: tooltipElement.getAttribute('data-tooltip-text'),
        });
    }
}

/**
 * Sticky Nav
 */

// We use this function to check if an element is in the viewport
function isInView(element) {
    // https://gist.github.com/davidtheclark/5515733
    var rect = element.getBoundingClientRect();

    var width = (window.innerWidth || document.documentElement.clientWidth);
    var height = (window.innerHeight || document.documentElement.clientHeight);
    
    const horInView = (rect.left <= width) && ((rect.left + rect.width) >= 0);
    const vertInView = (rect.top <= height) && ((rect.top + rect.height) >= 0);

    return (horInView && vertInView);
}

var stickyNav = document.getElementById('stickyNav');

if (stickyNav) {
    document.addEventListener('scroll', function () {
        if (window.innerWidth > 992 && ! isInView(document.getElementById('main-navbar'))) {
            // Get the navbar items
            var navItems = stickyNav.getElementsByClassName('menu-item--link');

            // Stick the navbar
            stickyNav.classList.add('is-stuck');

            // And now.. let's remove the is-active class from every nav item
            for (var i = 0; i < navItems.length; i++) {
                var item = navItems[i];
                item.classList.remove('is-active');
            }

            // And set the active item to well... active
            for (var i = 0; i < navItems.length; i++) {
                var item = navItems[i];
                var sectionId = item.getAttribute('href').replace('#', '');

                if (isInView(document.getElementById(sectionId))) {
                    item.classList.add('is-active');
                    break;
                }
            }
        } else {
            stickyNav.classList.remove('is-stuck');
        }
    });
}