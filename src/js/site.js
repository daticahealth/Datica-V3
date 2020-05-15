import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

var tooltips = document.querySelectorAll('[data-tooltip="true"]');

if (tooltips.length > 0) {
    for (var i = 0; i < tooltips.length; i++) {
        var tooltipElement = tooltips[i];

        tippy(tooltipElement, {
            content: tooltipElement.getAttribute('data-tooltip-text'),
        });
    }
}
