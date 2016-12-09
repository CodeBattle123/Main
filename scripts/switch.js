$(function() {
  $('#nav').click(function() {
    $(this).toggleClass('open');
  });
});

$(document).ready(function(){
  $("#project").show(200);

  $("#project-button").click(function() {
    $("#aboutus").hide(300);
    $("#howto").hide(300);
    $("#project").show(300);
  });

  $("#aboutus-button").click(function(){
    $("#project").hide(300);
    $("#howto").hide(300);
    $("#aboutus").show(300);
  });

  $("#howto-button").click(function(){
    $("#aboutus").hide(300);
    $("#project").hide(300);
    $("#howto").show(300);
  });
});
