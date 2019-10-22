// var observer = lozad('.lozad', {
//     loaded: function(el) {
//         el.classList.add('loaded');
//     }
// });
var observer = lozad('.lozad', {
    loaded: function(el) {
        el.classList.add('loaded');
    }
});
observer.observe();
