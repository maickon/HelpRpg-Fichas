

function marcador(max, value, id){
  console.log(id);
  var meter = new RGraph.Meter({
      id: id,
      min: 0,
      max: max,
      value: (max-value),
  }).on('beforedraw', function (obj)
  {
      RGraph.clear(obj.canvas, 'white');
  }).draw();
}


function campo(nome){
  var box;
  var id = Math.floor((Math.random() * 999999) + 1);
  switch(nome){
    case 'tipo1':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-4">' +
              '<span>PV' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="PV.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-4">' +
              '<span>CA' +
                '<input type="text" class="center form-control" name="ca" id="'+ id +'ca" placeholder="CA.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-4">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Dano.">' +
              '</span>' +
            '</div>' +
          '</div>' +
        '</div>';
     
    break;

    case 'tipo2':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-3">' +
              '<span>PV' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="PV.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-3">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Dano.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-3">' +
              '<span>Def.' +
                '<input type="text" class="center form-control" name="defesa" id="'+ id +'defesa" placeholder="Def.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-3">' +
              '<span>Mana' +
                '<input type="text" class="center form-control" name="mana" id="'+ id +'mana" placeholder="Mana.">' +
              '</span>' +
            '</div>' +
          '</div>' +
        '</div>';
     
    break;

     case 'tipo3':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-4">' +
              '<span>PV' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="PV.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-4">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Dano.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-4">' +
              '<span>Def.' +
                '<input type="text" class="center form-control" name="defesa" id="'+ id +'defesa" placeholder="Def.">' +
              '</span>' +
            '</div>' +
          '</div>' +
        '</div>';
     
    break;

    case 'tipo4':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome do Jogador' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-6">' +
              '<span>Vida' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="Pontos de Vida.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-6">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Pontos de Dano.">' +
              '</span>' +
            '</div>' +
        '</div>';
     
    break;

    case 'tipo5':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome do Jogador' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-6">' +
              '<span>Raça' +
                '<input type="text" class="center form-control" name="raca" id="'+ id +'raca" placeholder="Raça.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-6">' +
              '<span>Classe' +
                '<input type="text" class="center form-control" name="classe" id="'+ id +'classe" placeholder="Classe.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-6">' +
              '<span>Vida' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="Pontos de Vida.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-6">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Pontos de Dano.">' +
              '</span>' +
            '</div>' +
        '</div>';
     
    break;

    case 'tipo6':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome do Jogador' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-6">' +
              '<span>Raça' +
                '<input type="text" class="center form-control" name="raca" id="'+ id +'raca" placeholder="Raça.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-6">' +
              '<span>Classe' +
                '<input type="text" class="center form-control" name="classe" id="'+ id +'classe" placeholder="Classe.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-4">' +
              '<span>Vida' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="Pontos de Vida.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-4">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Pontos de Dano.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-4">' +
              '<span>CA' +
                '<input type="text" class="center form-control" name="ca" id="'+ id +'ca" placeholder="CA.">' +
              '</span>' +
            '</div>' +
        '</div>';
     
    break;

    case 'tipo7':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome do Jogador' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-6">' +
              '<span>Raça' +
                '<input type="text" class="center form-control" name="raca" id="'+ id +'raca" placeholder="Raça.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-6">' +
              '<span>Classe' +
                '<input type="text" class="center form-control" name="classe" id="'+ id +'classe" placeholder="Classe.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-3">' +
              '<span>Vida' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="Pontos de Vida.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-3">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Pontos de Dano.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-3">' +
              '<span>Def.' +
                '<input type="text" class="center form-control" name="defesa" id="'+ id +'defesa" placeholder="Def.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-3">' +
              '<span>Mana' +
                '<input type="text" class="center form-control" name="mana" id="'+ id +'mana" placeholder="Mana">' +
              '</span>' +
            '</div>' +
        '</div>';
     
    break;


    case 'tipo8':

      box = 
      
        '<div class="col-md-4">' +
          '<canvas id="canvas-'+ id +'" class="cvs" width="600" height="300">' +
          '</canvas>' +
          '<div class="col-md-12">' +
            '<div class="span col-md-12">' +
              '<span>Nome do Jogador' +
                '<input type="text" class="center form-control" name="nome" id="'+ id +'nome" placeholder="Nome do personagem.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-6">' +
              '<span>Raça' +
                '<input type="text" class="center form-control" name="raca" id="'+ id +'raca" placeholder="Raça.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-6">' +
              '<span>Classe' +
                '<input type="text" class="center form-control" name="classe" id="'+ id +'classe" placeholder="Classe.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-4">' +
              '<span>Vida' +
                '<input type="text" class="center form-control" name="pv" id="'+ id +'pv" placeholder="Pontos de Vida.">' +
              '</span>' +
            '</div>' +
            
            '<div class="span col-md-4">' +
              '<span>Dano' +
                '<input type="text" class="center form-control" name="dano" id="'+ id +'dano" placeholder="Pontos de Dano.">' +
              '</span>' +
            '</div>' +

            '<div class="span col-md-4">' +
              '<span>Def.' +
                '<input type="text" class="center form-control" name="defesa" id="'+ id +'defesa" placeholder="Def.">' +
              '</span>' +
            '</div>' +
        '</div>';
     
    break;
  }

    
  $('#marcador_content').append(box);

    $("#"+id+"pv, #"+id+"dano").focusout(function() {
      var atual = 0;
      var max = 0;
      if($.isNumeric($("#"+id+"pv").val()) || $.isNumeric($("#"+id+"dano").val()) ){
        atual = $("#"+id+"dano").val();
        max = $("#"+id+"pv").val();
      }
      marcador(max, atual, 'canvas-'+id);
    });

}