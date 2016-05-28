
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

function rand_personalidades(){
   var sorteio = $("#checkbox_sorteio").is(":checked");
   if(sorteio == true){
    rand_personalidade_2();
   }else{
    rand_personalidade_1();
   }
}

function rand_personalidade_1(){
  $("div#content-show").hide();
  $("div#content-show").show();
  $("div.hide-title").hide();
  $("div.hide-title").show();

  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        url: '../gerador/personalidades.php',
        success: function(result){
          var json = (eval("(" + result + ")"));
          var attr = [
                    'titulo_negativos',
                    'negativos',
                    'titulo_positivos',
                    'positivos',
                    'titulo_gerais',
                    'gerais',
                    'titulo_ideologia',
                    'ideologia',
                    'titulo_medos',
                    'medos',
                    'titulo_tendencia',
                    'tendencia'        
                    ];
          
          for(var i=0; i<attr.length; i++){
            //$( "#"+attr[i] ).empty();
            //$( "#"+attr[i] ).append(json[attr[i]]);
            $( "#"+attr[i] ).val(json[attr[i]]);
          } 
        }
      });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rand_personalidade_2(){
  var raca = $.ajax({
    type: 'post',
    dataType: 'html',
    url: '../gerador/personalidades.php',
    success: function(result){
      var json = (eval("(" + result + ")"));
      var attr = [
                'titulo_negativos',
                'negativos',
                'titulo_positivos',
                'positivos',
                'titulo_gerais',
                'gerais',
                'titulo_ideologia',
                'ideologia',
                'titulo_medos',
                'medos',
                'titulo_tendencia',
                'tendencia'        
                ];
      
      for(var i=0; i<attr.length; i++){
        //$( "#"+attr[i] ).empty();
        //$( "#"+attr[i] ).append(json[attr[i]]);
        $( "#"+attr[i] ).val(json[attr[i]]);
      } 
    }
  });
}

function reload(){
  location.reload();
}