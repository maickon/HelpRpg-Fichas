function sorteio_palavras(lista, id){
	var nomes = lista;
	var c = document.getElementById(id);
	if(nomes == '' || nomes == 'undefined' || nomes == null){
		alert("Preencha uma lista de nomes por favor.");
		return;
	}
	var i = 0;
	var velocidade 	= 50;
	var tempo 		= 2000;
	var intervalo = window.setInterval(function() {
				if (i >= nomes.length)
					i = 0;
				c.value = nomes[i];
				i++;
			}, velocidade);
	window.setTimeout(function() {
				clearInterval(intervalo);
				var n = Math.floor(Math.random()*nomes.length);
				c.value = nomes[n];
			}, tempo);
}

function sorteio_numeros($id){
	var c = document.getElementById($id);
	var i = 0;
	var velocidade 	= 10;
	var tempo 		= 2000;
	var intervalo = window.setInterval(function() {
				var n;
				n = rolagem3d6();
    			c.value = n;
			}, velocidade);
	window.setTimeout(function() {
				clearInterval(intervalo);
				var n;
				n = rolagem3d6();
    			c.value = n;
			}, tempo);
}

function d6(){
    return Math.floor((Math.random()*6) +1);
}

function rolagem3d6(){
    do{
		var rol_1 = d6();
		var rol_2 = d6();
		var rol_3 = d6();
		var rol_4 = d6();
		
		var menor = rol_1;
		if(menor > rol_2){
			menor = rol_2;
		}else if($menor > rol_3){
			menor = rol_3;
		}else if(menor > rol_4){
			menor = rol_4;
		}
		
		rolagem = rol_1 + rol_2 + rol_3 + rol_4;
		rolagem -= menor;
	}while(rolagem <= 8);

	return rolagem;
}
