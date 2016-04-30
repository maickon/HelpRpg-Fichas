
var speed = 50;
var time = 2200;

function download_para_pdf(){
  var doc = new jsPDF();
  var specialElementHandlers = {
      '#editor': function (element, renderer) {
          return true;
      }
  };
  doc.fromHTML($('#content').html(), 15, 15, {
      'width': 170,
          'elementHandlers': specialElementHandlers
  });
  doc.save('sample-file.pdf');
}

function rand_taverna(){
    var intervalo = window.setInterval(function(){
       var raca = $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/taverna.php',
          success: function(result){
            var json = (eval("(" + result + ")"));
            var attr = [
                        'taverna',
                        'nome',
                        'raca',
                        'idade',
                        'tempo_de_profissao',
                        
                        'aspecto',
                        'personalidade1',
                        'personalidade2',
                        'personalidade3',
                        
                        'aparencia',
                        'aparencia1',
                        'aparencia2',
                        'aparencia3',

                        'coisas_de_comer',
                        'comida1',
                        'comida2',
                        'comida3',
                        'comida4',
                        'comida5',
                        'comida6',
                        'comida7',
                        'comida8',

                        'bebidas',
                        'bebidas1',
                        'bebidas2',
                        'bebidas3',

                        'objetos_de_briga',
                        'objetos_de_briga1',
                        'objetos_de_briga2',
                        'objetos_de_briga3'     
                      ];
                      
            for(var i=0; i<attr.length; i++){
                $( "#"+attr[i] ).empty();
                $( "#"+attr[i] ).append(json[attr[i]]);
                $( "#"+attr[i] ).val(json[attr[i]]);
              } 
            }
        });



    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}