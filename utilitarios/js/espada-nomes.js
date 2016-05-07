
var speed = 50;
var time = 2200;

function rand_espada(){
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        url: '../gerador/espada-nomes.php',
        success: function(result){
          $("#panel_sorte").show();
          var json = (eval("(" + result + ")"));
          var attr = [
                    'primeiro_nome',
                    'segundo_nome'         
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