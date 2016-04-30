$(document).ready(function(){
  $(document).keypress(function(e){
    if(e.wich == 115 || e.keyCode == 115){
      set_key('KEY_DOWN');
    }else if(e.wich == 119 || e.keyCode == 119){
      set_key('KEY_UP ');
    }else if(e.wich == 97 || e.keyCode == 97){
      set_key('KEY_LEFT');
    }else if(e.wich == 100 || e.keyCode == 100){
      set_key('KEY_RIGHT');
    }
  
  $("#columns").focusout(function() {
      var col = $("#columns").val();
      var row = $("#rows").val();
      set_new_world(col, row);
    });

  $("#rows").focusout(function() {
      var col = $("#columns").val();
      var row = $("#rows").val();
      set_new_world(col, row);
    });

  });
});

function set_key(key){
  $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'request.php',
      data: {key_code: key},
      success: function(result){
          console.log(result);
      }
  });
}


function set_new_world(row, col){
  if(row == null){
    row = 0;
  }
  if(col == null){
    col = 0; 
  }

  $.ajax({
      type: 'post',
      dataType: 'html',
      url: 'request.php',
      data: {c: col, r: row},
      success: function(result){
          // console.log(result);
          console.log(JSON.parse(result));
      }
  });
}

