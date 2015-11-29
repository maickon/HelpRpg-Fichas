var ajax;
var data_user;

function request_http(type, url, assinc){
	if(window,XMLHttpRequest){
		ajax = XMLHttpRequest();
	}else if(window.ActiveXObject){
		ajax = ActiveXObject("Msxml2.XMLHTTP");
		if(!ajax){
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	
	if(ajax){
		initial_request(type, url, assinc);
	}else{
		alert("Seu navegador não possui suporte a essa aplicação!");
	}
}

function initial_request(type, url, assinc){
	ajax.onreadystatechange = dealwith_response;
	ajax.open(type, url, bool);
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	//ajax.overrideMimeType("text/XML");  //usado somente no mozila
	ajax.send(data_user);
}

function send_data(url){
	create_query_string();
	request_http("POST", url, true);
}

function create_query_string(){
	user_data = "";
	var form = document.forms[0];
	var num_elements = form.elements.length;
	
	for(var i=0; i<num_elements; i++){
		if(i < num_elements-1){
			data_user += form.elements[i].name + "=" + encodeURIComponent(frm.elements[i].value) + "&";
		}else{
			data_user += form.elements[i].name + "=" + encodeURIComponent(frm.elements[i].value);
		}
	}
}

function dealwith_response(){
	if(ajax.readyState == 4){
		if(ajax.status == 200){
			dealwith_data();
		}else{
			alert("Problema na comunicação com o objeto XMLHttpRequest.");
		}
	}
}