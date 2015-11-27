<?php
//$pdf = new Pdf();
require '../../../init.php';
require_once '../helper.php';

global $tag, $form, $s, $parametros;

$s->restricted_access();

$show_personagem = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
$objeto = $show_personagem->select($show_personagem->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);
$unserialize_personagem = unserialize($objeto[0]['dados']);

$pass = helper_check_permitions($objeto[0]['dono']);

if($pass != 1)
	header("Location: ".ROOTPATHURL.PERSONAGEMPATH);	

// Array
// (
//     [0] => Array
//         (
//             [id] => 9
//             [nome] => Lana
//             [img] => 1447626414.jpg
//             [dono] => Maickon
//             [sistema] => Dungeons and Dragons
//             [tipo] => Personagem jogador
//             [lv] => 6
//             [raca] => Humano
//             [classe] => Barbaro
//             [dados] => a:30:{s:5:"forca";s:2:"12";s:8:"destreza";s:2:"14";s:12:"constituicao";s:2:"13";s:12:"inteligencia";s:2:"16";s:9:"sabedoria";s:2:"14";s:7:"carisma";s:2:"11";s:9:"tendencia";s:6:"Neutro";s:5:"idade";s:2:"31";s:4:"peso";s:4:"50Kg";s:6:"altura";s:4:"1.68";s:2:"pv";s:3:"264";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:5:"3.000";s:9:"dado_vida";s:3:"d12";s:3:"for";s:2:"+3";s:4:"vont";s:2:"+1";s:4:"refl";s:2:"+3";s:6:"ataque";s:100:"Espada longa +3, Laça +5, Anel da proteção(+5 na CA), Cantil de viagem, Manto da resistência +3 ";s:8:"talentos";s:194:"Iniciativa aprimorada, foco em arma (lança), especialização em arma (lança), ataque poderoso, foco em arma (espada longa), ambidestria, combater com duas armas, todos os talentos de classe. ";s:8:"pericias";s:79:"Saltar +12, Intimidar +10, Cavalgar +6, Natação +9, Escalar +12, Procurar +6 ";s:6:"magias";s:0:"";s:9:"descricao";s:248:"Um Bárbaro Berseker é sem dúvida o tipo mais insano e perigoso de combatente. Seu foco se limita apenas em matar o inimigo da forma mais brutal possível, ignorando dor ou causas naturais, nada é capaz de impedir um Berseker durante o combate. ";s:12:"equipamentos";s:0:"";s:21:"habilidades_especiais";s:203:"Fúria insana Berseker: Uma vez por dia você pode entrar numa fúria insana que dura seu modificador de constituição recém ajustado por rodada. Esta fúria aumenta sua força e constituição em +20.";s:6:"outros";s:0:"";s:8:"old_file";s:14:"1447626023.jpg";}
//         )

// )
// Array
// (
//     [forca] => 12
//     [destreza] => 14
//     [constituicao] => 13
//     [inteligencia] => 16
//     [sabedoria] => 14
//     [carisma] => 11
//     [tendencia] => Neutro
//     [idade] => 31
//     [peso] => 50Kg
//     [altura] => 1.68
//     [pv] => 264
//     [ca] => 17 (+5 armadura, +2 escudo)
//     [deslocamento] => 9m
//     [tamanho] => Médio
//     [iniciativa] => +6
//     [bba] => +3
//     [xp] => 3.000
//     [dado_vida] => d12
//     [for] => +3
//     [vont] => +1
//     [refl] => +3
//     [ataque] => Espada longa +3, Laça +5, Anel da proteção(+5 na CA), Cantil de viagem, Manto da resistência +3 
//     [talentos] => Iniciativa aprimorada, foco em arma (lança), especialização em arma (lança), ataque poderoso, foco em arma (espada longa), ambidestria, combater com duas armas, todos os talentos de classe. 
//     [pericias] => Saltar +12, Intimidar +10, Cavalgar +6, Natação +9, Escalar +12, Procurar +6 
//     [magias] => 
//     [descricao] => Um Bárbaro Berseker é sem dúvida o tipo mais insano e perigoso de combatente. Seu foco se limita apenas em matar o inimigo da forma mais brutal possível, ignorando dor ou causas naturais, nada é capaz de impedir um Berseker durante o combate. 
//     [equipamentos] => 
//     [habilidades_especiais] => Fúria insana Berseker: Uma vez por dia você pode entrar numa fúria insana que dura seu modificador de constituição recém ajustado por rodada. Esta fúria aumenta sua força e constituição em +20.
//     [outros] => 
//     [old_file] => 1447626023.jpg
// )
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190, 10, 'Ficha do Personagem', 1, 1,'C');

$pdf->SetFont('Arial','',8);
$pdf->ln();

$pdf->Cell(10, 5, 'FOR', 1, 0,'C');
$pdf->Cell(10, 5, $unserialize_personagem['forca'], 1, 0,'C');
$pdf->Cell(10, 5, (($unserialize_personagem['forca']-10)/2), 1, 0,'C');

$pdf->Image(ROOTPATH.PERSONAGEMIMGPATH.$objeto[0]['img'],100,25,-152);
$pdf->Output();