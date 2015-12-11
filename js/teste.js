function buscar_classe(classe){
	if(classe){
		var url = "http://127.0.0.1/HelpRpg/pages/testes/exemplo1.php?search="+classe;
		requisicaoHttp("GET", url, true);
	}
}

function buscar_classe_form_search(classe){
	if(classe){
		var url = "http://127.0.0.1/HelpRpg/pages/testes/exemplo1.php?search="+classe;
		requisicaoHttp("GET", url, true);
	}
}

function trataDados(){
	var classe = ajax.responseText; //obtem a resposta como string
	document.getElementById("search_box").hidden = true;
	document.getElementById("search-result").style.display = 'block';
	document.getElementById("box-result").style.display = 'block';
	
	if(classe == "404"){
		var info = "Classe não encontrada.";
	}else{
		var info = classe;
		document.getElementById("classe_personagem").innerHTML = info;
	}
}