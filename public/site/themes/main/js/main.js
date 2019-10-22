// If this gets used, it needs a vanilla js version - AW
// $(function(){
//   $(".contact-form__field").bind("checkval",function(){
//     var label = $(this).siblings(".contact-form__label");
//     if(this.value !== ""){
//       label.addClass("contact-form__label--visible");
//     } else {
//       label.removeClass("contact-form__label--visible");
//     }
//   }).on("keyup",function(){
//     $(this).trigger("checkval");
//   }).on("focus",function(){
//   }).trigger("checkval");
// });
// var observer = lozad('.lozad', {
//     loaded: function(el) {
//         el.classList.add('loaded');
//     }
// });
var observer = lozad('.lozad', {
  loaded: function loaded(el) {
    el.classList.add('loaded');
  }
});
observer.observe(); // handles navigation toggle on mobile nav; various other nav functions
// for non-js users, might need a way to display navigation, or at footer

(function () {
  var toggler = document.querySelector('.toggle-me'); // menu toggle

  var toggleTarget = document.querySelector('.toggle-target'); // target to show/hide

  toggler.addEventListener('click', function () {
    // toggle() is pretty recent vanilla JS, support is strong
    toggler.toggleAttribute('aria-expanded'); // this adds the attribute for accessibilty - but not the boolean state. A starting point

    toggleTarget.classList.toggle('is-active');
    toggler.classList.toggle('is-toggled');
  });
})(); // document.querySelector("#nav-toggle")
//     .addEventListener("click", function () {
//         this.classList.toggle("active");
//         });
// if (document.querySelector(".alert-close-button")) {
//     document.querySelector(".alert-close-button")
//         .addEventListener("click", function () {
//             document.querySelector(".alert-modal").remove();
//     });
// }
// $(function() {
//       var siteHeaderHeight = $('.site-header').outerHeight();
//     $('.site-header').headroom({
//         offset: 300
//     });
// });
// $('a[href*="#"]')
//   // Remove links that don't actually link to anything
//   .not('[href="#"]')
//   .not('[href="#0"]')
//   .click(function(event) {
//     // On-page links
//     if (
//       location.pathname.replace(/^\//, "") ==
//         this.pathname.replace(/^\//, "") &&
//       location.hostname == this.hostname
//     ) {
//       // Figure out element to scroll to
//       var target = $(this.hash);
//       target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
//       // Does a scroll target exist?
//       if (target.length) {
//         // Only prevent default if animation is actually gonna happen
//         event.preventDefault();
//         $("html, body").animate(
//           {
//             scrollTop: target.offset().top
//           },
//           1000,
//           function() {
//             // Callback after animation
//             // Must change focus!
//             var $target = $(target);
//             $target.focus();
//             if ($target.is(":focus")) {
//               // Checking if the target was focused
//               return false;
//             } else {
//               $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
//               $target.focus(); // Set focus again
//             }
//           }
//         );
//       }
//     }
//   });
