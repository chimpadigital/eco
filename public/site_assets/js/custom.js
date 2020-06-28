$(function(){

    $('#Calendar-1').jalendar({
        color: '#FBF9F9',
        lang: 'ES',
        sundayStart: true,
        dayWithZero: false,
        dayColor: '#515150',
        titleColor: '#0097D6',
        weekColor: '#00B49D',
        todayColor: '#fff'
    });

    $('#Calendar-2').jalendar({
        color: '#FBF9F9',
        lang: 'ES',
        sundayStart: true,
        dayWithZero: false,
        dayColor: '#515150',
        titleColor: '#0097D6',
        weekColor: '#00B49D',
        todayColor: '#fff'
    });

});

$('[data-toggle="tooltip"]').tooltip();

$(document).ready(function() {
    $('a[href^="#"]').click(function() {
      var destino = $(this.hash);
      if (destino.length == 0) {
        destino = $('a[name="' + this.hash.substr(1) + '"]');
      }
      if (destino.length == 0) {
        destino = $('html');
      }
      $('html, body').animate({ scrollTop: destino.offset().top }, 500);
      return false;
    });
  });