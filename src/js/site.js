import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

var tooltips = document.querySelectorAll('[data-tooltip="true"]');

for (var i in tooltips) {
    var element = tooltips[i];

    tippy(element, {
        content: element.getAttribute('data-tooltip-text'),
    })
} 