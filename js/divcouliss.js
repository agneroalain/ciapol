 function expand(element){
           var target = document.getElementById(element);
           var h = target.offsetHeight;
           var sh = target.scrollHeight;
           var loopTimer = setTimeout('expand(\''+element+'\')',8);
           if (h < sh) {
               h += 5;
           }
           else {
               clearTimeout(loopTimer);
              // alert("expansion complete");
           }
           target.style.height = h+"px";
        }
         function retract(element){
           var target = document.getElementById(element);
           var h = target.offsetHeight;
           var loopTimer = setTimeout('retract(\''+element+'\')',8);
           if (h > 0) {
               h -= 5;
               if(h<5){h =0;}
           }
           else {
               target.style.height = "0px";
               clearTimeout(loopTimer);
               //alert("retraction complete");
           }
           target.style.height = h+"px";
        }
    
        function choix(element){
            var target = document.getElementById(element);
            
            if(target.style.height){
                if(target.style.height=="0px")
            {
                expand(element);
            }
            else
            {
                retract(element);
            }
            }
            else
            {
                expand(element);
            }
            
        }