// Place all the behaviors and hooks related to the matching controller here.
// All this logic will automatically be available in application.js.

$(function(){
  $('#dropdown-friend-requests').on('show.bs.dropdown', function(){
    $(this).find('.dropdown-menu').load('/friend_requests', function(){
      $('#dropdown-friend-requests .icon-badge').hide()
    });
  });
});
