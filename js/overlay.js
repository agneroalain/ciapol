
    function hidepop()
    {
        
        $(document).ready(function() {
        $('#overlay').removeClass("overlay");
         $('#overlay_dialogue').removeClass("overlay_dialogue");
         $('#overlay').addClass("hide");
         $('#overlay_dialogue').addClass("hide");
         });
    }
    function showpop()
    {
        $(document).ready(function() {
        $('#overlay').removeClass("hide");
         $('#overlay_dialogue').removeClass("hide");
         $('#overlay').addClass("overlay");
         $('#overlay_dialogue').addClass("overlay_dialogue");
         });
    }
        function hidenot()
    {
        $(document).ready(function() {
          if($('#notif').hasClass("notshow")){
                $('#notif').removeClass("notshow");
                $('#notif').addClass("nothide");
          }else{
               $('#notif').removeClass("nothide");
               $('#notif').addClass("notshow");
          }
        });
    }
