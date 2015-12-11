var ajax;
var dadosUsuario;

//cria o objeto e faz a requisicao
function requisicaoHttp(tipo, url, assinc){
	if(window.XMLHttpRequest){  //mozila, safari ...
		ajax = new XMLHttpRequest();
	}else if(window.ActiveXObject){ //Internet Explorer
		ajax = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(ajax){
		iniciaRequisicao(tipo, url, assinc);
	}else{
		alert("Seu navegador não possui suporte a essa aplicação.");
	}
}

//inicializa o objeto criado e envia os dados
function iniciaRequisicao(tipo, url, bool){
	ajax.onreadystatechange = trataResposta;
	ajax.open(tipo, url, bool);
	ajax.setRequestHeader("Content-Type", "application/X-www-form-urlencoded; charset=UTF-8");
	//ajax.overrideMimeType("tesxt/XML");  //usado somente no mozilla
	ajax.send(dadosUsuario);
}

//inicia a requisicao com envio de dados
function enviaDados(url){
	criaQueryString();
	requisicaoHttp("POST", url, true);
}

//cria a string a ser enviada, formato campo1=valor1&campo2=valor2...
function criaQueryString(){
	dadosUsuario = "";
	var frm = document.form[0];
	var numElementos = frm.elements.lenght;
	for(var i=0; i<numElementos; i++){
		if(i < numElementos-1){
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value)+"&";
		}else{
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value);
		}
	}
}

//trata a resposta do servidor
function trataResposta(){
	if(ajax.readyState == 4){
		if(ajax.status == 200){
			trataDados(); //criar esta funcao no seu programa
		}else{
			alert("Problema na comunicação com o objeto XMLHttpRequest.");
		}
	}
}

