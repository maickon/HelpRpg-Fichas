document.getElementById('box-result').style.display = 'none';
document.getElementById("search").focus();
document.getElementById("search_result").focus();

function buscar_classe(classe){
	if(classe){
		var url = "http://127.0.0.1/HelpRpg/pages/testes/search.php?search="+classe;
		requisicaoHttp("GET", url, true);
	}
}

function show_image(img_path){
	var img = document.createElement('img');
	img.setAttribute('src',img_path);
	var div_img = document.getElementById('image');
	div_img.appendChild(img);
}

function trataDados(){
	var classe = ajax.responseText; //obtem a resposta como string
	document.getElementById("search_box").hidden = true;
	document.getElementById('box-result').style.display = 'block';
	if(classe == "404"){
		var info = "Ficha não encontrada.";
	}else{
		var info = classe;
		document.getElementById("classe_personagem").innerHTML = info;
	}
}