// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// js/name_set.js
//
// Escrito por Maickon
// http://creativecommons.org/licenses/by-nc/3.0/

var nomes = [
		'Chato', 
		'Humorado (Bom humor)', 
		'Invejoso', 
		'Maldoso)', 
		'Gentil', 
		'Safado (Golpista)', 
		'Safado (Mulheres)', 
		'Mulherengo', 
		'Assassino',
		'Pegador',
		'Mentiroso', 
		'Bondoso', 
		'Idiota', 
		'Imbecil', 
		'Bobo (Ser Babaca)',
		'Bobo (Ser passado pra trás)',
		'Metido a Espertalhão', 
		'Andrógeno', 
		'Metido a Machão',
		'Gay', 
		'Homofóbico',
		'Medroso',
		'Racista',
		'Corajoso', 
		'Medo de Insetos', 
		'Medo de Mulher', 
		'Medo de Escuro', 
		'Tímido', 
		'Vigarista', 
		'Vacilão',
		'Sapatão', 
		'Homofóbico',
		'Esconde Segredos', 
		'Arrogante', 
		'Despresível', 
		'Estuprador', 
		'Falador', 
		'Desafiador', 
		'Estudioso',
	 	'Justo', 
	 	'Compulsivo', 
	 	'Irritante', 
	 	'Respeitado', 
	 	'Apavorado', 
	 	'Apavorador', 
	 	'Intimidador', 
	 	'Feio', 
	 	'Atraente', 
	 	'Bonito',
		'Capitalista', 
		'Zen (Calmo)', 
		'Chapado', 
		'Atento', 
		'Sério',
		'Brincalhão',
		'Inparcial', 
		'Opressor', 
		'Tirano',
		'Corrupto',
		'Corruptível',
		'Intolerante',
		'Bruto',
		'Selvagem',
		'Fumante', 
		'Vício',
		'Inocente', 
		'Lider',
		'Honrado'
];
console.log(nomes.length);
function load_caracteristica(){
	var campos = ['campo1','campo2','campo3','campo4'];
	for(var i=0; i<=8; i++){
		sorteio_palavras(nomes, campos[i]);
	}
}
