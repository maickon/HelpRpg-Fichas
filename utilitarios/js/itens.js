
var speed = 50;
var time = 2200;

function rand_item_aleatorio(tipo_item){
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        data: {item: tipo_item},
        url: '../gerador/itens.php',
        success: function(result){
          var json = (eval("(" + result + ")"));
          var attr = [
                    'descricao',
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

function rand_item_comum_aleatorio(tipo_item){
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        data: {item: tipo_item},
        url: '../gerador/itens-comuns.php',
        success: function(result){
          var json = (eval("(" + result + ")"));
          var attr = [
                      'poder_arma',
                      'poder_armadura',
                      'material',
                      'aprimoramento',
                      'arma',
                      'armadura',
                      'titulo',
                      'titulo_poder',
                      'titulo_material',
                      'titulo_aprimoramento'         
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