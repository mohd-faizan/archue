$('document').ready(function() {
  if ($('#main .sidebar ul#menu li[value=settings]').attr('class') == 'active') {
    $('#main .sidebar ul#menu ul.submenu').slideDown(400);
  }
  $('#main .sidebar').css('height', $('#main').height() + 10 + 'px');

  /* Main Tooltip */
  $('.full-container .bars-area .bars div').mouseenter(function() {
    var id = $(this).attr('id');
    $('#tooltip_main').html(id);
    $('#tooltip_main').fadeIn(400);
  });
  $('.full-container .bars-area .bars div').mouseout(function(evt) {
    var to = $(evt.toElement).attr('class');
    if (to != 'bar1' && to != 'bar2' && to != 'bar3' && to != 'bar4')
      $('#tooltip_main').fadeOut(50);
  });
  $('.full-container .bars-area .bars div').mousemove(function() {
    $('#tooltip_main').css({
      'left': +(event.clientX + 5) + 'px',
      'top': +(event.clientY - 25) + 'px'
    });
  });

  /* Loader underneath the mouse pointer */
  $('body').mousemove(function(event) {
    $('#hloader').css({
      'left': +(event.clientX + 16) + 'px',
      'top': +(event.clientY + 12) + 'px'
    });
  });

  // Settings submenu
  $('#main .sidebar ul#menu li').click(function() {
    var attr = $(this).attr('value');
    if (attr == 'home') {
      window.location = 'home';
    } else if (attr == 'settings') {
      $('#main .sidebar ul#menu ul.submenu').slideToggle(600);
    } else if (attr == 'smtp') {
      window.location = 'smtp';
    } else if (attr == 'general') {
      window.location = 'general';
    }
    if (attr == 'logout') window.location = 'home?logout=true';
  });
});

function loader() {
  $('#hloader').fadeIn(100);
}

function loaded() {
  $('#hloader').fadeOut(100);
}
