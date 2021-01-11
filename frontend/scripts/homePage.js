$(document).ready(function() {

  $('.msg').change(function() {
    if ($(this).val().length == 0)
      {
         $('.msg_submit').attr("disabled", true);
      }
      else
      {
         $('.msg_submit').removeAttr("disabled");
      }
  });

  $('.chat_header, .chat_body, .send_msg').css({'display': 'none'});

     setInterval(loadUser, 1000);

  // loadUser();

  function loadUser() {
    var id = $('.my_id').val();

    $.ajax({
      url: "../backend/loadUser.php",
      type: "POST",
      data: {
        id: id
      },
      success: function(result) {
        $('.test').html(result);
      }
    });
  }

// $(".chat_body").click(function() {
//   clearInterval(sessionStorage.getItem("id"));
// });

$("body").click(function(event) {

    if(event.target.className === 'users')
    {
      if(sessionStorage.getItem("id")) {
        clearInterval(sessionStorage.getItem("id"));
        sessionStorage.clear();
      }

       var id = setInterval(loadMessages, 1000);
       sessionStorage.setItem("id",id);
        console.log(id);
        // console.log("hello");
        loadMessages();
        function loadMessages() {
        var user_id = event.target.id;
         // console.log(user_id);
        var id = $('.my_id').val();
         $.ajax({
           url: "../backend/msg.php",
           type: "POST",
           data: {
             id: id,
             user_id: user_id
           },
           success: function(result) {

             $('.chat_header').css({'display': 'flex'});
             $('.chat_body').css({'display': 'flex'});
             $('.send_msg').css({'display': ''});

             $('.chat_body').html(result);
             console.log("test");
             // console.log(JSON.parse(result));
             var user_name = JSON.parse(result).user_name;

             // console.log(JSON.parse(result));
             $('.USER_name').html(JSON.parse(result).user_name);
             $('.chat_body').html(JSON.parse(result).msg);
             $('.hidden_user_id').val(JSON.parse(result).user_id);
             // $('.chat_body').scrollTop($('.chat_body').height());
             var myscroll = $('.chat_body');
             myscroll.scrollTop(myscroll.get(0).scrollHeight);
           }
         });
       }

  }

});

$('.msg_submit').click(function(event) {
  event.preventDefault();
  var id = $('.my_id').val();
  var msg = $('.msg').val();
  var user_id = $('.hidden_user_id').val();

  // console.log(user_id, msg);
  // setInterval(loadUpdatedMessages, 1000);

  $.ajax({
    url: "../backend/msg.php",
    type: "POST",
    data: {
       id: id,
       user_id: user_id,
       msg: msg
  },
  success: function(result) {
    console.log(JSON.parse(result));
    var flag = JSON.parse(result).flag;
    console.log(flag);
    if(flag === 1) {
      console.log(flag);

      $('.chat_head').css({'display': 'flex'});
      $('.chat_body').css({'display': 'flex'});
      $('.send_msg').css({'display': ''});

      $('.chat_body').html(JSON.parse(result).msg);
      var myscroll = $('.chat_body');
      myscroll.scrollTop(myscroll.get(0).scrollHeight);

      $('form').trigger('reset');
    }
  }
});

});
});
