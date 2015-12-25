var ROOTURL = 'http://127.0.0.1/HelpRpg/';
var ARMADURASFORMPATH = 'pages/painel/armaduras/form/';

var files = [];
files['Dungeons and Dragons 3.5'] = 'ded-3.5.php'; 
files['Dungeons and Dragons 4.0'] = '';
files['Dungeons and Dragons 5.0'] = ''; 
files['FATE'] = ''; 
files['Savage Worlds'] = ''; 
files['3D&T'] = ''; 
files['Deamon'] = '';


function select_form(nome){
	var none = 'none';
	switch(nome){
		case 'Sevage Worlds':
			document.getElementById("nome").style.display = '';
			document.getElementById("label_nome").style.display = '';
			
			document.getElementById("lv").style.display = '';
			document.getElementById("label_lv").style.display = '';
			
			document.getElementById("custo").style.display = '';
			document.getElementById("label_custo").style.display = '';
			
			document.getElementById("bonusNaCa").style.display = none;
			document.getElementById("label_bonusNaCa").style.display = none;
			
			document.getElementById("destrezaMaxima").style.display = none;
			document.getElementById("label_destrezaMaxima").style.display = none;
			
			document.getElementById("penalidadeNaPericia").style.display = none;
			document.getElementById("label_penalidadeNaPericia").style.display = none;
			
			document.getElementById("falhaDeMagiaArcana").style.display = none;
			document.getElementById("label_falhaDeMagiaArcana").style.display = none;
			
			document.getElementById("deslocamentoMedio").style.display = none;
			document.getElementById("label_deslocamentoMedio").style.display = none;
			
			document.getElementById("deslocamentoPequeno").style.display = '';
			document.getElementById("label_deslocamentoPequeno").style.display = '';
			
			document.getElementById("peso").style.display = '';
			document.getElementById("label_peso").style.display = '';
			
			document.getElementById("tipo").style.display = '';
			document.getElementById("label_tipo").style.display = '';
			
			document.getElementById("categoria").style.display = '';
			document.getElementById("label_categoria").style.display = '';
		break;
	}
}