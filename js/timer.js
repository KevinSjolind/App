$(document).ready(function () {
  // Set timer to check if user is idle
  var idleTimer;
  $(this).mousemove(function(e){
    // clear prior timeout, if any
    window.clearTimeout(idleTimer);
    // create new timeout (3 mins)
    idleTimer = window.setTimeout(isIdle, 3000);
    if (idleTimer) {
      $("figure").removeClass("away");
    }
  });
  function isIdle() {
    $("figure").addClass("away");
  }
});
