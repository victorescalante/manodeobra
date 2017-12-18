$(document).ready(function(){
  console.log("Iniciando Sitio");

  $("#form").validate({
    rules: {
      nombre:{
        required: true,
        alphas: true
      }
      a1{
        required: true
      }
    }
    submitHandler: function(form){
      form.submit();
    }
  });

  jQuery.validator.addMethod("alphas", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional(element) || /^[a-zA-Z]+$/.test( value );
}, 'Solo Caracteres');
});
