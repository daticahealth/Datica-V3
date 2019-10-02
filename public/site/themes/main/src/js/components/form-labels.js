$(function(){
  $(".contact-form__field").bind("checkval",function(){
    var label = $(this).siblings(".contact-form__label");
    if(this.value !== ""){
      label.addClass("contact-form__label--visible");
    } else {
      label.removeClass("contact-form__label--visible");
    }
  }).on("keyup",function(){
    $(this).trigger("checkval");
  }).on("focus",function(){
  }).trigger("checkval");
});
