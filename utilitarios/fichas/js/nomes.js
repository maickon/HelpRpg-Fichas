
var speed = 50;
var time = 3000;

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

function rand_nomes(){
    var selecionado = $("#select").val();
    var intervalo = window.setInterval(function(){
       var raca = $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/nomes.php',
          data: {select: selecionado},
          success: function(result){
            var json = (eval("(" + result + ")"));
            var attr = [
                      'nome-1',
                      'nome-2',
                      'nome-3',
                      'nome-4',
                      'nome-5',
                      'nome-6',
                      'nome-7',
                      'nome-8'           
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


