
var speed = 50;
var time = 2200;

function rand_encontro_aleatorio(encontro){
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        data: {attr: encontro},
        url: '../gerador/encontro.php',
        success: function(result){
          var json = (eval("(" + result + ")"));
          var attr = [
                    'local',
                    'titulo'         
                    ];

          for(var i=0; i<attr.length; i++){
              $( "#"+attr[i] ).empty();
              $( "#"+attr[i] ).append(json[attr[i]]);
            } 
          }
      });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}