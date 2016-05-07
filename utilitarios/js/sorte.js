
var speed = 50;
var time = 2200;

function rand_sorte(tipo){
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        data: {sorte: tipo},
        url: '../gerador/sorte.php',
        success: function(result){
          $("#panel_sorte").show();
          var json = (eval("(" + result + ")"));
          var attr = [
                    'afetado',
                    'acontecimento'         
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