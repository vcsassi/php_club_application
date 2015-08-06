// Code goes here
$(document).ready(function() {
  $('.form-control').each(function() {
    $(this).on('blur', function() {
      if (!$(this).val()) {
        console.log('empty');
        $(this).removeClass('valid').addClass('invalid');
        $('#submitBtn').prop('disabled', true);
      } else {
        $(this).removeClass('invalid').addClass('valid');
        $('#submitBtn').prop('disabled', false);
      }
    });

  });
});