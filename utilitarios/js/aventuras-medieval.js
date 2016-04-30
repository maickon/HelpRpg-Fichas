
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

function rand_aventura_medieval(){
  $("div#content-show").hide();
  $("div#content-show").show();
  $("div.hide-title").hide();
  $("div.hide-title").show();

  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        url: '../gerador/aventuras-medieval.php',
        success: function(result){
          var json = (eval("(" + result + ")"));
          var attr = [
                    'titulo_objetivo',
                    'objetivo',
                    'titulo_local',
                    'local',
                    'titulo_antagonista',
                    'antagonista',
                    'titulo_coadjuvante',
                    'coadjuvante',
                    'titulo_complicacao',
                    'complicacao',
                    'titulo_recompensa',
                    'recompensa'        
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