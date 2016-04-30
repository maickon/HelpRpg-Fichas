
var speed = 30;
var time = 2200;

function total(dado){
  var total = 0;
  $("span#resultados_" + dado ).each(function(index){ 
    total = total + parseInt($(this).text());
  });
  $( "#total_" + dado ).empty();
  $( "#total_" + dado ).append(total); 
}

function processar_rolagem(qtd_rol, dado){
  var qtd = qtd_rol.value;
  var total = 0;  
  var intervalo = window.setInterval(function(){
        $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: dado, q:qtd},
          success: function(result){
            var json = (eval("(" + result + ")"));
            for(var i=0; i<qtd; i++){
              $( "#rolagem_" + dado ).empty();
              $( "#rolagem_" + dado ).append(json); 
            }
          }
        });
    }, speed);

      window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function configuracao(num){
  var dados = ['d4','d6','d8','d10','d12','d20','d100'];
  var classe = [];

  for(var i=0; i<dados.length; i++){
    classe[i] = $( "#gride_" + dados[i] ).attr('class');
    $( "#gride_" + dados[i] ).removeClass(classe[i]);
    $( "#gride_" + dados[i] ).addClass('col-md-' + num);
  }
}

function rolar_todos(){
  rolar_d4();
  rolar_d6();
  rolar_d8();
  rolar_d10();
  rolar_d12();
  rolar_d20();
  rolar_d100();
}

function rolar_d4(){
    var intervalo = window.setInterval(function(){
       $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: "d4"},
          success: function(result){
            var json = (eval("(" + result + ")"));
            if(json == 1){
              $( "#value_d4" ).css( "color", "red" );
            }else if(json == 4){
              $( "#value_d4" ).css( "color", "green" );
            }else{
              $( "#value_d4" ).css( "color", "black" );
            }
            $( "#value_d4" ).empty();
            $( "#value_d4" ).append(json);
            $( "#value_d4" ).val(json);
          }
        });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rolar_d6(){
    var intervalo = window.setInterval(function(){
       $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: "d6"},
          success: function(result){
            var json = (eval("(" + result + ")"));
            if(json == 1){
              $( "#value_d6" ).css( "color", "red" );
            }else if(json == 6){
              $( "#value_d6" ).css( "color", "green" );
            }else{
              $( "#value_d6" ).css( "color", "black" );
            }
            $( "#value_d6" ).empty();
            $( "#value_d6" ).append(json);
            $( "#value_d6" ).val(json);
          }
        });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rolar_d8(){
    var intervalo = window.setInterval(function(){
       $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: "d8"},
          success: function(result){
            var json = (eval("(" + result + ")"));
            if(json == 1){
              $( "#value_d8" ).css( "color", "red" );
            }else if(json == 8){
              $( "#value_d8" ).css( "color", "green" );
            }else{
              $( "#value_d8" ).css( "color", "black" );
            }
            $( "#value_d8" ).empty();
            $( "#value_d8" ).append(json);
            $( "#value_d8" ).val(json);
          }
        });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rolar_d10(){
    var intervalo = window.setInterval(function(){
       $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: "d10"},
          success: function(result){
            var json = (eval("(" + result + ")"));
            if(json == 1){
              $( "#value_d10" ).css( "color", "red" );
            }else if(json == 10){
              $( "#value_d10" ).css( "color", "green" );
            }else{
              $( "#value_d10" ).css( "color", "black" );
            }
            $( "#value_d10" ).empty();
            $( "#value_d10" ).append(json);
            $( "#value_d10" ).val(json);
          }
        });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rolar_d12(){
    var intervalo = window.setInterval(function(){
       $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: "d12"},
          success: function(result){
            var json = (eval("(" + result + ")"));
            if(json == 1){
              $( "#value_d12" ).css( "color", "red" );
            }else if(json == 12){
              $( "#value_d12" ).css( "color", "green" );
            }else{
              $( "#value_d12" ).css( "color", "black" );
            }
            $( "#value_d12" ).empty();
            $( "#value_d12" ).append(json);
            $( "#value_d12" ).val(json);
          }
        });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rolar_d20(){
    var intervalo = window.setInterval(function(){
       $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: "d20"},
          success: function(result){
            var json = (eval("(" + result + ")"));
            if(json == 1){
              $( "#value_d20" ).css( "color", "red" );
            }else if(json == 20){
              $( "#value_d20" ).css( "color", "green" );
            }else{
              $( "#value_d20" ).css( "color", "black" );
            }
            $( "#value_d20" ).empty();
            $( "#value_d20" ).append(json);
            $( "#value_d20" ).val(json);
          }
        });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rolar_d100(){
    var intervalo = window.setInterval(function(){
       $.ajax({
          type: 'post',
          dataType: 'html',
          url: '../gerador/dice.php',
          data: {dado: "d100"},
          success: function(result){
            var json = (eval("(" + result + ")"));
            if(json == 1){
              $( "#value_d100" ).css( "color", "red" );
            }else if(json == 100){
              $( "#value_d100" ).css( "color", "green" );
            }else{
              $( "#value_d100" ).css( "color", "black" );
            }
            $( "#value_d100" ).empty();
            $( "#value_d100" ).append(json);
            $( "#value_d100" ).val(json);
          }
        });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}