
var speed = 50;
var time = 2200;

function rand_tempo_atual(){
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        url: '../gerador/tempo.php',
        success: function(result){
          $("#panel_tempo").show();
          var json = (eval("(" + result + ")"));
          var attr = [
                    'temperatura',
                    'vento',
                    'precipitacao'         
                    ];

          for(var i=0; i<attr.length; i++){
              $( "#"+attr[i] ).empty();
              $( "#"+attr[i] ).append(json[i]);
            } 
          }
      });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}