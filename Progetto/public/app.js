$('#hamburger').on('click', function () {
   $(this).toggleClass('is-active');
   $('#overlay-menu').toggleClass('active');
   $('#primary-header').toggleClass('fixed');
   $('#hamburger2').toggleClass('is-active');
});

$('#hamburger2').on('click', function () {
   $(this).toggleClass('is-active');
   $('#primary-header').toggleClass('fixed');
   $('#hamburger').toggleClass('is-active');
   $('#overlay-menu').toggleClass('active');
});

// Video 2

$('#modal1').on('hidden.bs.modal', function (e) {
   // do something...
   $('#modal1 iframe').attr('src', $('#modal1 iframe').attr('src'));
});

$('#modal6').on('hidden.bs.modal', function (e) {
   // do something...
   $('#modal6 iframe').attr('src', $('#modal6 iframe').attr('src'));
});

$('#modal4').on('hidden.bs.modal', function (e) {
   // do something...
   $('#modal4 iframe').attr('src', $('#modal4 iframe').attr('src'));
});