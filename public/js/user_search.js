$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();
    $('.search_conditions').toggleClass("open");
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
    $(this).toggleClass("open");
  });
});
