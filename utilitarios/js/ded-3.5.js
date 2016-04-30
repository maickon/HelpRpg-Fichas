
var speed = 30;
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

function rand_personagem(){
    var intervalo = window.setInterval(function(){
       var raca = $.ajax({
          type: 'post',
          dataType: 'html',
          url: 'gerador/ded-3.5.php',
          success: function(result){
            var json = (eval("(" + result + ")"));
            var attr = [
                      'nome',            
                      'nivel',           
                      'sexo',            
                      'cor_dos_olhos',       
                      'cor_da_pele',       
                      'cor_do_cabelo',       
                      'estilo_da_boca',      
                      'estilo_do_cabelo',    
                      'estilo_da_sobrancelha', 
                      'estilo_do_rosto',       
                      'estilo_do_olho',      
                      'estilo_do_queixo',
                      'estilo_da_testa',

                      'classe',
                      'raca',
                      'altura',
                      'peso',
                      'idade',
                      'deslocamento',

                      'forca',
                      'destreza',
                      'constituicao',
                      'inteligencia',
                      'sabedoria',
                      'carisma'
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


