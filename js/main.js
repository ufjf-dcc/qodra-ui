$('.krakatoa').krakatoa({
  width: '1140px',
  height: '300px',
  items: 3,
  buttons: false,
  gutter: 60,
  autoplay: false
});

function showMenuFixed(){
  var top = $(window).scrollTop();
  if(top > 118) {
    $('#fixed-header').addClass('show');
  } else {
    $('#fixed-header').removeClass('show');
  }
}

function exibeLogin(){
  $('#loginbox').toggle();
}

function exibeLoginUp(){
  $('html,body').animate({scrollTop: $("#static-header").offset().top},'slow');
  $('#loginbox').show();
}

showMenuFixed();

$(window).scroll(function() {
  showMenuFixed();
});

$('#show-menu-inst').click(function(){
  $('#menu-inst').toggleClass('open');
  return false;
});
$('#show-menu-inst, #menu-inst-menu').mouseenter(function(){
  $('#menu-inst').addClass('open');
}).mouseleave(function(){
  $('#menu-inst').removeClass('open');
});
$('#show-login-inst').click(function(){
  $('#login-inst').toggleClass('open');
  return false;
});