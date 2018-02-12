$(document).ready(function(){

  // action to execture when click on button register
  $("#register").click(function(){
    var firstname = $("#firstname").val();
    var name = $("#name").val();
    var birthdate = $("#birthdate").val();
    var email = $("#email").val();

    // pass javascript variables in url
    var data = "name=" + name + "&firstname=" + firstname + "&birthdate=" + birthdate + "&email=" + email;

      // http request with ajax call
      $.ajax({
        method: "post",
        url: "register.php?",
        data: data,

        // if success or error > display message in "register output" div
        complete: function(jqxhr, errorCode)
        {
        $("#register_output").html(jqxhr.responseText);
        },
        // if success > clear fields
        success: function(data)
        {
          var tag = document.getElementsByTagName("input");
          for (i = 0; i < tag.length; i++)
          {
            tag[i].value = '';
          }
        }
      });
  });
});
