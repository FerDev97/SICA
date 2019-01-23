//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function() {
    // aqui va el codigo que se ejecuta al darle al boton siguiente
    
         // pasarSiguiente();
    if (animating) return false;
    animating = true;
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    //show the next fieldset
    next_fs.show();
    
   

    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({ 'left': left, 'opacity': opacity });
        },
        duration: 800,
        complete: function() {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".nextr").click(function() {
    // aqui va el codigo que se ejecuta al darle al boton siguiente
    
         // pasarSiguiente();
    if (animating) return false;
    animating = true;
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    //show the next fieldset
    next_fs.show();
    
   

    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({ 'left': left, 'opacity': opacity });
        },
        duration: 800,
        complete: function() {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});


$(".previous").click(function() {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({ 'left': left });
            previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
        },
        duration: 800,
        complete: function() {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function() {

    
          var nombrea= $("#nombrea").val();
          var apellidoa= $("#apellidoa").val();
          var direcciona = $("#direcciona").val();
          var nie = $("#niea").val();
          var fecha= $("#fecha").val();
          var distanciaa= $("#distanciaa").val();
          
          var nombrep= $("#nombrep").val();
          var lugarp= $("#lugarp").val();
          var duip= $("#duip").val();
          var telefonocp= $("#telefonocp").val();
          var telefonotp= $("#telefonotp").val();
          var celularp= $("#celularp").val();

          var direccionp= $("#direccionp").val();

          var nombrem= $("#nombrem").val();
          var lugarm= $("#lugarm").val();
          var oficiom= $("#oficiom").val();
          var duim= $("#duim").val();
          var telefonocm= $("#telefonocm").val();
          var telefonotm= $("#telefonotm").val();
          var celularm= $("#celularm").val();

          var banderaA="ok";
          var banderaP="ok";
          var banderaM="ok";
          var banderaDir="ok";
          var banderita="ok";

          if((nombrea == "" || nombrea == null) || (apellidoa == "" || apellidoa == null) ||
          (direcciona == "" || direcciona == null) || (nie == "" || nie == null) ||  
          (fecha == "" || fecha == null) || (distanciaa == "" || distanciaa == null)){
              banderaA="no";
          }
          

          if((nombrep == "" || nombrep == null) ||(lugarp == "" || lugarp == null) ||
          (duip == "" || duip == null) || (telefonocp == "" || telefonocp == null) ||
          (telefonotp == "" || telefonotp == null) || (celularp == "" || celularp == null)){

              banderaP="no";
          }

          if((direccionp == "" || direccionp == null)){
              banderaDir="no";
          }

          if((nombrem == "" || nombrem == null) || (lugarm == "" || lugarm == null)||
          (oficiom == "" || oficiom == null) || (duim == "" || duim == null) ||
          (telefonocm == "" || telefonocm == null) || (telefonotm == "" || telefonotm == null) ||
          (celularm == "" || celularm == null)){
              banderaM="no";
          }

          if(banderaA == "no" || banderaDir=="no" || (banderaP=="no" && banderaM=="no") ){
            
            sweetError("campos vacios");
          }else{

            sweetConfirm();

         }

});