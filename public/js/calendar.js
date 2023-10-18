$('.delete-modal-open').on('click', function () {
  $('.js-modal').fadeIn();
  var value = $(this).attr('value');
  var setting_part = $(this).attr('setting_part');
  var setting_id = $(this).attr('setting_id');
  $('.modal-inner-day span').text(value);
  $('.modal-inner-part span').text(setting_part);
  $('.delete-modal-hidden').val(setting_id);
  return false;
});
$('.js-modal-close').on('click', function () {
  $('.js-modal').fadeOut();
  return false;
});
