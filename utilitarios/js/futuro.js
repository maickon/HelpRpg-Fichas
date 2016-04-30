
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

function rand_futuro(){
  //var selecionado = $("#select option:selected").text();
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        //data: {select: selecionado},
        url: '../gerador/futuro.php',
        success: function(result){
          var json = (eval("(" + result + ")"));
          var attr = [
                    'afetado',
                    'acontecimento'        
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