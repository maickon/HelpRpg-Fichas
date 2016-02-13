var url = "http://127.0.0.1/HelpRpg/js/";
//
img = new Array (url+"img/img2.jpg", url+"img/img1.jpg", url+"img/img4.jpg", url+"img/img3.jpg", url+"img/img3.jpg", url+"img/img2.jpg");
link = new Array (
					"http://bit.ly/22XMm0H", //Curso de desenho 
					"http://bit.ly/1ZYDsxz", //Programação de Jogos Multiplayer com Unity 5
					"http://bit.ly/1ZYDsxz", //Programação de Jogos Multiplayer com Unity 5
					"http://bit.ly/1OZl2v0", //Curso Combo : 2 E-Books Unity + Android + Introdução a Realidade Aumentada  :
					"http://bit.ly/1OZl2v0", //E-book Criando um jogo de corrida para Android com Unity :
					"http://bit.ly/22XMm0H"  //Curso de desenho 
				);

function slide1(){
	document.getElementById('id').src=img[0];
	document.getElementById('link').href=link[0];
	setTimeout("slide2()", 3000)
}
 
function slide2(){
	document.getElementById('id').src=img[1];
	document.getElementById('link').href=link[1];
	setTimeout("slide3()", 3000)
}
 
function slide3(){
	document.getElementById('id').src=img[2];
	document.getElementById('link').href=link[2];
	setTimeout("slide4()", 3000)
}

function slide4(){
	document.getElementById('id').src=img[3];
	document.getElementById('link').href=link[3];
	setTimeout("slide5()", 3000)
}

function slide5(){
	document.getElementById('id').src=img[4];
	document.getElementById('link').href=link[4];
	setTimeout("slide1()", 3000)
}