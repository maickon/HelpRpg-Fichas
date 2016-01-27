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