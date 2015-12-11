-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Dez-2015 às 18:09
-- Versão do servidor: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helprpg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens`
--

CREATE TABLE IF NOT EXISTS `personagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `dono` varchar(255) NOT NULL,
  `editado_por` varchar(255) NOT NULL,
  `sistema` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `lv` varchar(255) NOT NULL,
  `raca` varchar(255) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `dados` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`id`, `nome`, `img`, `dono`, `editado_por`, `sistema`, `tipo`, `lv`, `raca`, `classe`, `dados`) VALUES
(2, 'Ishizo', '1448169425.png', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '21', 'Humano', 'Barbaro', 'a:30:{s:5:"forca";s:2:"12";s:8:"destreza";s:2:"14";s:12:"constituicao";s:2:"13";s:12:"inteligencia";s:2:"16";s:9:"sabedoria";s:2:"14";s:7:"carisma";s:2:"11";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"19";s:4:"peso";s:3:"6Kg";s:6:"altura";s:4:"1.72";s:2:"pv";s:2:"36";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:5:"3.000";s:9:"dado_vida";s:3:"d10";s:3:"for";s:2:"+3";s:4:"vont";s:2:"+1";s:4:"refl";s:2:"+3";s:6:"ataque";s:1:" ";s:8:"talentos";s:1:" ";s:8:"pericias";s:1:" ";s:6:"magias";s:1:" ";s:9:"descricao";s:1:" ";s:12:"equipamentos";s:1:" ";s:21:"habilidades_especiais";s:1:" ";s:6:"outros";s:0:"";s:8:"old_file";s:0:"";}'),
(3, 'Valkyria', '1448199948.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '21', 'Humano', 'Barbaro', 'a:29:{s:5:"forca";s:2:"12";s:8:"destreza";s:2:"14";s:12:"constituicao";s:2:"13";s:12:"inteligencia";s:2:"16";s:9:"sabedoria";s:2:"14";s:7:"carisma";s:2:"11";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"19";s:4:"peso";s:3:"6Kg";s:6:"altura";s:4:"1.72";s:2:"pv";s:2:"36";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:5:"3.000";s:9:"dado_vida";s:3:"d10";s:3:"for";s:2:"+3";s:4:"vont";s:2:"+1";s:4:"refl";s:2:"+3";s:6:"ataque";s:28:" Espada larga +3 +21/+16/+11";s:8:"talentos";s:36:" Iniciativa aprimorada, foco em arma";s:8:"pericias";s:45:" acrobacia+12, desenhar+5, adestrar animais+4";s:6:"magias";s:8:" nenhuma";s:9:"descricao";s:28:" Nasceu num lugar pequeno...";s:12:"equipamentos";s:26:" mochila, pedras preciosas";s:21:"habilidades_especiais";s:19:" Ataque da justiça";s:6:"outros";s:0:"";}'),
(5, 'Gradon ', '1447617647.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '16', 'Humano', 'Barbaro Berseker', 'a:30:{s:5:"forca";s:2:"22";s:8:"destreza";s:2:"16";s:12:"constituicao";s:2:"21";s:12:"inteligencia";s:2:"11";s:9:"sabedoria";s:2:"12";s:7:"carisma";s:1:"9";s:9:"tendencia";s:14:"Leal e Nneutro";s:5:"idade";s:2:"19";s:4:"peso";s:4:"76Kg";s:6:"altura";s:4:"1.72";s:2:"pv";s:3:"223";s:2:"ca";s:38:"18 (+3 natural, +5 anel da proteção)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+7";s:3:"bba";s:2:"+3";s:2:"xp";s:7:"156.000";s:9:"dado_vida";s:3:"d12";s:3:"for";s:2:"23";s:4:"vont";s:1:"8";s:4:"refl";s:2:"14";s:6:"ataque";s:68:"Espada longa +3 e Lança +5 +32/+27, último ataque com a lança +25";s:8:"talentos";s:193:"Iniciativa aprimorada, foco em arma (lança), especialização em arma (lança), ataque poderoso, foco em arma (espada longa), ambidestria, combater com duas armas, todos os talentos de classe.";s:8:"pericias";s:79:"Saltar +12, Intimidar +10, Cavalgar +6, Natação +9, Escalar +12, Procurar +6 ";s:6:"magias";s:1:" ";s:9:"descricao";s:247:"Um Bárbaro Berseker é sem dúvida o tipo mais insano e perigoso de combatente. Seu foco se limita apenas em matar o inimigo da forma mais brutal possível, ignorando dor ou causas naturais, nada é capaz de impedir um Berseker durante o combate.";s:12:"equipamentos";s:99:"Espada longa +3, Laça +5, Anel da proteção(+5 na CA), Cantil de viagem, Manto da resistência +3";s:21:"habilidades_especiais";s:205:" Fúria insana Berseker: Uma vez por dia você pode entrar numa fúria insana que dura seu modificador de constituição recém ajustado por rodada. Esta fúria aumenta sua força e constituição em +20. ";s:6:"outros";s:0:"";s:8:"old_file";s:14:"1447617522.jpg";}'),
(6, 'Karla a louca', '1448200585.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '18', 'Humano', 'Barbaro', 'a:29:{s:5:"forca";s:2:"12";s:8:"destreza";s:2:"14";s:12:"constituicao";s:2:"13";s:12:"inteligencia";s:2:"16";s:9:"sabedoria";s:2:"14";s:7:"carisma";s:2:"11";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"19";s:4:"peso";s:3:"6Kg";s:6:"altura";s:4:"1.72";s:2:"pv";s:2:"36";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:5:"3.000";s:9:"dado_vida";s:3:"d10";s:3:"for";s:2:"+3";s:4:"vont";s:2:"+1";s:4:"refl";s:2:"+3";s:6:"ataque";s:16:" ataque completo";s:8:"talentos";s:16:" muitos talentos";s:8:"pericias";s:16:" todas da classe";s:6:"magias";s:10:" sem magia";s:9:"descricao";s:18:" um longa historia";s:12:"equipamentos";s:22:" diversos equipamentos";s:21:"habilidades_especiais";s:1:" ";s:6:"outros";s:1:"-";}'),
(7, 'Dante', '1449539304.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '5', 'Humano', 'Samurai', 'a:29:{s:5:"forca";s:2:"12";s:8:"destreza";s:2:"14";s:12:"constituicao";s:2:"13";s:12:"inteligencia";s:2:"16";s:9:"sabedoria";s:2:"14";s:7:"carisma";s:2:"11";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"19";s:4:"peso";s:3:"6Kg";s:6:"altura";s:4:"1.72";s:2:"pv";s:2:"36";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:5:"3.000";s:9:"dado_vida";s:3:"d10";s:3:"for";s:2:"+3";s:4:"vont";s:2:"+1";s:4:"refl";s:2:"+3";s:6:"ataque";s:58:"Arma Foice curta Dano 1d6 Tipo Armas Leves - Corpo a Corpo";s:8:"talentos";s:200:"1° inimigo predileto, rastrear, empatia com a natureza\r\nEstilo de Combate\r\nTolerância\r\nCompanheiro animal\r\n2° inimigo predileto\r\nEstilo de Combate Aprimorado\r\nCaminho da floresta\r\nRastreador Eficaz";s:8:"pericias";s:268:"Concentração (Con) 12 = 11+1\r\nAdestrar animas (Car) 11 = 11+0\r\nCavalgar (Des) 12 = 11+1\r\nSobrevivência (Sab) 13 = 11+2\r\nConhecimento (geografia) (Int) 14 = 11+3\r\nConhecimento (masmorras) (Int) 14 = 11+3\r\nConhecimento (natureza) (Int) 14 = 11+3\r\nCura (Sab) 13 = 11+2";s:6:"magias";s:1:"-";s:9:"descricao";s:345:"Dante nasceu no reino situado ao oeste, despois das montanhas farpadas. Criado pela avó, ele(a) aprendeu muitas coisas que eram necessárias para a sua sobrevivência. Quando se tornou adulto(a) decidiu segui caminho afora. Agora deseja encontrar um grupo para convence a desbravar uma masmorra muito perigosa para encontrar um tesouro perdido.";s:12:"equipamentos";s:494:"Espada longa (1d8, dec. 19-20/ x 2,1 kg, uma mão, cortante) Espada curta, mão inábil (1d6, dec. 19-20/ x 2,1 kg, leve, perfurante) Observação: Quando atacar com as duas espadas, o ranger sofre -4 de penalidade com a espada longa e 8 de penalidade com a espada curta. Caso tenha um bônus de Força, adicione somente metade do valor ao dano da espada curta, que está na mão inábil, mas adicione o bônus total ao dano da espada longa. Arco longo (1d8, dec.x 3, 30 m, 1,5 kg, perfurante).";s:21:"habilidades_especiais";s:23:"Habilidades de combate ";s:6:"outros";s:1:"-";}'),
(8, 'Maga negra', '1449539691.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '8', 'Humano', 'Maga', 'a:29:{s:5:"forca";s:2:"14";s:8:"destreza";s:2:"11";s:12:"constituicao";s:2:"17";s:12:"inteligencia";s:2:"15";s:9:"sabedoria";s:2:"15";s:7:"carisma";s:2:"16";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"19";s:4:"peso";s:4:"61Kg";s:6:"altura";s:4:"1.68";s:2:"pv";s:2:"36";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:6:"10.931";s:9:"dado_vida";s:3:"d10";s:3:"for";s:2:"+1";s:4:"vont";s:2:"+6";s:4:"refl";s:2:"+4";s:6:"ataque";s:58:"Arma Dardo \r\nDano 1d4 \r\nTipo Armas de Ataque à Distância";s:8:"talentos";s:57:"Invocar familiar, escrever pergaminho,\r\nTalento Adicional";s:8:"pericias";s:162:"Concentração (Con) 8 = 8+0,\r\nConhecimento (arcano) (Int) 10 = 8+2,\r\nDecifrar Escrita (Int) 10 = 8+2,\r\nIdentificar Magia (Int) 10 = 8+2,\r\nOfícios (Int) 10 = 8+2";s:6:"magias";s:37:"Magias de primeiro e segundo circulo.";s:9:"descricao";s:316:"Nascida na cidade capital do grande reino. Criado pela avó, ele(a) aprendeu muitas coisas que eram necessárias para a sua sobrevivência. Quando se tornou adulto(a) decidiu segui caminho afora. Agora deseja encontrar um grupo para convence a desbravar uma masmorra muito perigosa para encontrar um tesouro perdido.";s:12:"equipamentos";s:457:"Alguma arma corpo-a-corpo ou a distância ou armadura mágica +1.\r\nArmas Bordão (1d6/1d6, dec.x 2, 2 kg, duas mãos, concussão). Besta Leve (1d8, dec. 19-20/ x 2, 24 m, 2 kg, perfurante).\r\n<br>\r\nEquipamentos Mochila com cantil, um dia de rações de viagem, saco de dormir, saco, pederneira e isqueiro. Dez velas, porta-mapas, três páginas de pergaminho, tinta, caneta tinteiro. Bolsa de componentes de magia, grimório. Caixa com 10 virotes para besta.";s:21:"habilidades_especiais";s:1:"-";s:6:"outros";s:1:"-";}'),
(9, 'Khal Drogo', '1448196313.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '21', 'Humano', 'Barbaro', 'a:30:{s:5:"forca";s:2:"24";s:8:"destreza";s:2:"16";s:12:"constituicao";s:2:"16";s:12:"inteligencia";s:2:"12";s:9:"sabedoria";s:2:"10";s:7:"carisma";s:1:"9";s:9:"tendencia";s:10:"Leal e Mal";s:5:"idade";s:2:"31";s:4:"peso";s:4:"80Kg";s:6:"altura";s:4:"1.81";s:2:"pv";s:3:"331";s:2:"ca";s:28:"20 (+4 natural, +6defelxão)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+7";s:3:"bba";s:2:"21";s:2:"xp";s:7:"201.000";s:9:"dado_vida";s:3:"d12";s:3:"for";s:2:"21";s:4:"vont";s:2:"10";s:4:"refl";s:2:"14";s:6:"ataque";s:38:"Espada longa +5 Vorpal +36/+31/+27/+22";s:8:"talentos";s:126:"Ataque poderoso, iniciativa aprimorada, reflexos de combate, separar, foco em arma, especialização em arma, corrida, separar";s:8:"pericias";s:50:"Intimidar +12, Saltar+16, Acrobacia+11, procurar+9";s:6:"magias";s:0:"";s:9:"descricao";s:479:"Drogo era filho de Khal Bharbo. Cohollo se tornou seu companheiro de sangue quando ele era uma criança, e salvou a vida do jovem Drogo de um ataque mercenário em certa ocasião. Desde jovem, Drogo era um guerreiro extremamente talentoso mesmo entre os dothraki mais ferozes: antes dos trinta anos ele já liderava um khalasar de quarenta mil pessoas, o maior do Mar Dothraki. Ele nunca tinha sido derrotado e era servido por seus companheiros de sangue: Cohollo, Qotho e Haggo.";s:12:"equipamentos";s:68:"Adaga, espada longa, cordas, aljava 40 flexas, arco e flexas, cantil";s:21:"habilidades_especiais";s:135:"Monstruosidade em combate: para cada ponto de modificador de inteligência ele adiciona este valor na sua CA, ataque e dano com espada.";s:6:"outros";s:0:"";s:8:"old_file";s:14:"1448196262.jpg";}'),
(10, 'kio nagima', '1448727600.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '2', 'Humano', 'mago', 'a:29:{s:5:"forca";s:2:"12";s:8:"destreza";s:2:"12";s:12:"constituicao";s:2:"16";s:12:"inteligencia";s:2:"12";s:9:"sabedoria";s:2:"10";s:7:"carisma";s:2:"11";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"19";s:4:"peso";s:4:"50Kg";s:6:"altura";s:4:"1.68";s:2:"pv";s:2:"16";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:5:"3.000";s:9:"dado_vida";s:2:"d4";s:3:"for";s:2:"+3";s:4:"vont";s:2:"+1";s:4:"refl";s:2:"+3";s:6:"ataque";s:20:"Cajado +3 dano 1d4+1";s:8:"talentos";s:13:"Foco em amgia";s:8:"pericias";s:60:"Conhecimento religião, astronomia, identificar item mágico";s:6:"magias";s:34:"Globulos de luz, mãos flamejantes";s:9:"descricao";s:1:"-";s:12:"equipamentos";s:32:"Mochila, livro de magias, cantil";s:21:"habilidades_especiais";s:1:"-";s:6:"outros";s:1:"-";}'),
(12, 'Marlon Niksz', '1449541777.jpg', 'Maickon', '', 'Deamon', 'Personagem jogador', '7', 'Humano', 'Espião', 'a:31:{s:12:"constituicao";s:2:"20";s:5:"forca";s:2:"22";s:8:"destreza";s:2:"16";s:9:"agilidade";s:2:"15";s:12:"inteligencia";s:2:"16";s:9:"percepcao";s:2:"14";s:7:"carisma";s:2:"10";s:4:"will";s:1:"9";s:2:"pv";s:2:"23";s:2:"ip";s:1:"4";s:2:"ph";s:1:"5";s:2:"pm";s:1:"-";s:2:"pf";s:1:"-";s:2:"xp";s:2:"69";s:15:"data_nascimento";s:21:"27 de janeiro de 1992";s:16:"local_nascimento";s:8:"Brasilia";s:4:"sexo";s:9:"Masculino";s:6:"altura";s:4:"1,77";s:4:"peso";s:4:"74Kg";s:9:"profissao";s:27:"Engenheiro e Agente secreto";s:14:"idade_aparente";s:2:"28";s:10:"idade_real";s:2:"23";s:8:"armadura";s:12:"Sem armadura";s:7:"idiomas";s:28:"Portugês, Ingles e Espanhol";s:8:"religiao";s:7:"Budista";s:18:"pericias_com_armas";s:34:"Pistola: ataque +23% Defesa +19%\r\n";s:14:"aprimoramentos";s:35:"Sorte exagerada, Contatos e aliados";s:8:"pericias";s:69:"Conhecimento engenharia 36%, corrida +20%, Inglês +40%, Espanho +40%";s:7:"poderes";s:1:"-";s:6:"magias";s:1:"-";s:6:"outros";s:1:"-";}'),
(13, 'Vargos', '1448768638.jpg', 'Maickon', '', 'FATE', 'Personagem jogador', '', '', '', 'a:20:{s:9:"cuidadoso";s:1:"1";s:11:"inteligente";s:1:"3";s:9:"chamativo";s:1:"2";s:5:"forte";s:1:"1";s:6:"rapido";s:1:"2";s:10:"sorrateiro";s:1:"2";s:13:"aspecto_chave";s:20:"Caçador de tesouros";s:19:"aspecto_complicacao";s:25:"Só fala o que não deve.";s:7:"refresh";s:1:"2";s:4:"fate";s:1:"1";s:7:"stress1";s:1:"X";s:7:"stress2";s:1:"-";s:7:"stress3";s:1:"-";s:17:"consequencia_leve";s:18:"Torceu o calcanhar";s:21:"consequencia_moderada";s:1:"-";s:19:"consequencia_severa";s:1:"-";s:9:"descricao";s:49:"Vargos é um estudante de física do segundo ano.";s:7:"proezas";s:59:"Coragem, já enfrentou e derrotou dois assaltantes na rua. ";s:8:"aspectos";s:28:"Sabe dirigir caros de fuga, ";s:6:"outros";s:1:"-";}'),
(14, 'Alex Crysler', '1449622654.jpg', 'Maickon', '', 'FATE', 'Personagem jogador', '-', 'Humano', 'Samurai do Futuro', 'a:17:{s:9:"cuidadoso";s:1:"2";s:11:"inteligente";s:1:"1";s:9:"chamativo";s:1:"4";s:5:"forte";s:1:"3";s:6:"rapido";s:1:"2";s:10:"sorrateiro";s:1:"1";s:7:"refresh";s:1:"3";s:4:"fate";s:1:"2";s:9:"aparencia";s:85:"Alto com 1,98, pele morena e meio Ciborg. Manipula uma katana de 1.70 de comprimento.";s:13:"aspecto_chave";s:17:"Viajante do tempo";s:19:"aspecto_complicacao";s:117:"Alex Crysler é perseguido por sentinelas do tempo que tentam impedir que ele cumpra seu objetivo no passado de 2003.";s:8:"aspectos";s:67:"Humano meio ciborg, Possui um objetivo programado pelo seu criador.";s:9:"descricao";s:299:"Alex Crysler é um meio humano e ciborg do ano de 2800. Foi criado a partir de um corpo fossilizado de um antigo samurai encontrado na China no ano de 1978. Desde que o projeto obteve sucesso, seu novo corpo foi criogenizado e armazenado para uma possível salvação da terra em momentos difíceis.";s:6:"stress";s:1:"-";s:13:"consequencias";s:68:"Ao votar no passado, Alex Crysler é incapaz de voltar ao seu tempo.";s:7:"proezas";s:98:"Corpo original de meio humano e ciborg já participou de inúmeras guerras na história da china. ";s:6:"outros";s:1:"-";}'),
(16, 'Arcatron [Arcanjo Macatrônico]', '1449623659.jpg', 'Maickon', '', 'FATE', 'Personagem jogador', '-', 'Android', 'Soldado defensor do paraíso macatrônico', 'a:17:{s:9:"cuidadoso";s:1:"2";s:11:"inteligente";s:1:"4";s:9:"chamativo";s:1:"5";s:5:"forte";s:1:"6";s:6:"rapido";s:1:"3";s:10:"sorrateiro";s:1:"1";s:7:"refresh";s:1:"5";s:4:"fate";s:1:"6";s:9:"aparencia";s:115:"Arcatron é um mega android de 3,45. Pesa mais de 5Ton, tem asas brilhantes revertidas de um metal super flexével.";s:13:"aspecto_chave";s:33:"Defender o paraíso mecatrônico.";s:19:"aspecto_complicacao";s:62:"Inimigos prediletos Satadron(Uma raça de androides demônio).";s:8:"aspectos";s:69:"Senso de dever ao paraíso macatrônico e seguidor da lei de mecatron";s:9:"descricao";s:246:"Arcatron é um dos 900 soldados que defendem o paraíso mecatrônico contras as forças do mal governadas por Abadron. Android lider supremos dos demotrons (uma espécie de demônios android). Ultimamente esta guerra está sendo travada na terra.";s:6:"stress";s:1:"-";s:13:"consequencias";s:131:"Arcanjos mecatrônicos correm grande risco de emboscadas quando não estão em sua terra natal. A sua atenção deve ser redobrada.";s:7:"proezas";s:171:"Honra Metraton (Condecorado como um dos 10 melhores soldados do paraíso macatrônico), Aniquilador (Reconhecimento de ser um dos soldados mais temíveis pelos demotrons).";s:6:"outros";s:344:"Arcanjo Macatrônico e Demotrons sõa uma raça biotrônica nativas de mundos distantes da terra, são galáxias que habitam milhares de planetas habitados por estar raça alienígena de origem mecânica nanotecnológica. Recentemente algumas naves Demotron e Mecatron caíram na terra e isso está gerando uma guerra interna entre esta raça. ";}'),
(19, 'Krajar', '1449106273.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Personagem jogador', '6', 'Humano', 'Mago', 'a:29:{s:5:"forca";s:2:"22";s:8:"destreza";s:2:"14";s:12:"constituicao";s:2:"16";s:12:"inteligencia";s:2:"11";s:9:"sabedoria";s:2:"14";s:7:"carisma";s:2:"12";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"19";s:4:"peso";s:3:"6Kg";s:6:"altura";s:4:"1.68";s:2:"pv";s:2:"36";s:2:"ca";s:27:"17 (+5 armadura, +2 escudo)";s:12:"deslocamento";s:2:"9m";s:7:"tamanho";s:6:"Médio";s:10:"iniciativa";s:2:"+6";s:3:"bba";s:2:"+3";s:2:"xp";s:5:"3.000";s:9:"dado_vida";s:3:"d10";s:3:"for";s:2:"+3";s:4:"vont";s:2:"+1";s:4:"refl";s:2:"+3";s:6:"ataque";s:12:"Ataque total";s:8:"talentos";s:14:"Talentos lista";s:8:"pericias";s:15:"MInhas pericias";s:6:"magias";s:1:"-";s:9:"descricao";s:1:"-";s:12:"equipamentos";s:1:"-";s:21:"habilidades_especiais";s:1:"-";s:6:"outros";s:1:"-";}'),
(24, 'Vorme do deserto', '1449346499.jpg', 'Maickon', '', 'Dungeons and Dragons 3.5', 'Monstro', '21', 'Vorme', '', 'a:29:{s:5:"forca";s:2:"32";s:8:"destreza";s:2:"14";s:12:"constituicao";s:2:"24";s:12:"inteligencia";s:1:"4";s:9:"sabedoria";s:1:"8";s:7:"carisma";s:1:"8";s:7:"tamanho";s:6:"Enorme";s:2:"dv";s:3:"d10";s:2:"pv";s:3:"264";s:10:"iniciativa";s:2:"+5";s:12:"deslocamento";s:31:"18m(terrestre) 24(subterrâneo)";s:2:"ca";s:27:"32 (10+22 armadura natural)";s:12:"ataq_agarrar";s:7:"+33/+40";s:6:"ataque";s:23:"Mordida +33 dano 4d6+15";s:12:"ataque_total";s:23:"Mordida +33 dano 4d6+15";s:14:"espaco_alcance";s:6:"12m/6m";s:17:"ataques_especiais";s:7:"Engolir";s:20:"qualidades_especiais";s:22:"Redução de dano 10/-";s:18:"testes_resistencia";s:25:"Fort +18 Vont + 8 Refl +8";s:8:"ambiente";s:7:"Deserto";s:11:"organizacao";s:10:"Solitário";s:9:"tendencia";s:6:"Neutro";s:10:"progressao";s:1:"-";s:6:"ajuste";s:1:"-";s:8:"talentos";s:38:"Ataque poderoso, Iniciativa aprimorada";s:8:"pericias";s:10:"Saltar +21";s:9:"descricao";s:24:"Uma criatura do deserto.";s:7:"combate";s:55:"Em sua primeira rodada ela tenta engolir seus inimigos.";s:7:"tesouro";s:6:"Nenhum";}'),
(26, 'Fatia Sanders', '1449436522.jpg', 'Maickon', '', '3D&T', 'Personagem jogador', '5', 'Humano', 'Guerreira', 'a:18:{s:5:"forca";s:2:"12";s:10:"habilidade";s:1:"3";s:11:"resistencia";s:1:"3";s:8:"armadura";s:1:"6";s:3:"pdf";s:1:"5";s:3:"pvs";s:1:"9";s:3:"pms";s:1:"5";s:3:"pts";s:1:"3";s:11:"experiencia";s:4:"3000";s:9:"vantagens";s:26:"Coragem, Força descomunal";s:12:"desvantagens";s:22:"Ponto fraco, Esquecida";s:9:"tipo_dano";s:23:"Ataque com espada longa";s:7:"poderes";s:91:"Disparo de eletricidade pelas mãos, Disparo de eletricidade pelos olhos. Ambosm com PdF 10";s:8:"pericias";s:17:"Saltar, Acrobacia";s:12:"equipamentos";s:378:"Kit de novato: +1 em testes de uma Perícia, nenhum modificador na Iniciativa\r\n– Esses kits seriam um estojo de ferramentas para ladinos, uma roupa flexível para esportes, um livro para conhecimento, maquiagem, instrumentos musicais, etc.\r\n<br>\r\nFerramentas de mestre: +2 em testes de uma Perícia, -1 na Iniciativa (costumam ser cheios de bugigangas e atrapalhar em combate)";s:8:"dinheiro";s:19:"1000 Peças de ouro";s:6:"magias";s:1:"-";s:8:"historia";s:26:"Nasceu filha de guerreiros";}'),
(27, 'Varken', '1449426394.jpg', 'Maickon', '', 'Dungeons and Dragons 4.0', 'Personagem jogador', '12', 'Humano', 'Guerreiro', 'a:44:{s:5:"forca";s:2:"22";s:8:"destreza";s:2:"16";s:12:"constituicao";s:2:"13";s:12:"inteligencia";s:2:"16";s:9:"sabedoria";s:2:"14";s:7:"carisma";s:2:"12";s:16:"caminho_exemplar";s:7:"Coragem";s:13:"destino_epico";s:1:"-";s:9:"tendencia";s:10:"Leal e Bom";s:5:"idade";s:2:"23";s:6:"altura";s:4:"1.90";s:4:"peso";s:5:"103Kg";s:9:"divindade";s:1:"-";s:4:"sexo";s:9:"Masculino";s:13:"regiao_origem";s:17:"Bosqe de Borderan";s:7:"idiomas";s:15:"Nativo e Elfico";s:10:"iniciativa";s:2:"+5";s:7:"tamanho";s:6:"Médio";s:12:"deslocamento";s:2:"9m";s:16:"intuicao_passiva";s:2:"10";s:17:"percepcao_passiva";s:2:"12";s:2:"pv";s:3:"110";s:9:"sangrando";s:1:"5";s:10:"pulso_cura";s:2:"12";s:6:"pulsos";s:1:"7";s:8:"pts_acao";s:2:"10";s:2:"ca";s:2:"21";s:4:"fort";s:2:"+8";s:4:"refl";s:2:"+6";s:4:"vont";s:2:"+3";s:6:"ataque";s:3:"+12";s:4:"dano";s:2:"+6";s:2:"xp";s:4:"9340";s:13:"ataque_basico";s:24:"Espada +21  dano 1d10+12";s:16:"aspectos_raciais";s:37:"Humano ganha mais um talento dicional";s:15:"caracteristicas";s:1:"-";s:8:"talentos";s:21:"Iniciativa aprimorada";s:8:"pericias";s:20:"saltar+3, procurar+6";s:7:"poderes";s:1:"-";s:12:"equipamentos";s:44:"Espada, Amuleto +3 na CA, pergaminho mágico";s:21:"habilidades_especiais";s:1:"-";s:8:"costumes";s:1:"-";s:6:"tracos";s:23:"Bem humorado e perigoso";s:12:"antecedentes";s:1:"-";}'),
(28, 'Hideyoshi Toyotomi', '1449427210.jpg', 'Maickon', '', 'Dungeons and Dragons 4.0', 'Personagem jogador', '25', 'Humano', 'Guerreiro', 'a:44:{s:5:"forca";s:3:"140";s:8:"destreza";s:2:"32";s:12:"constituicao";s:2:"64";s:12:"inteligencia";s:2:"14";s:9:"sabedoria";s:2:"20";s:7:"carisma";s:2:"18";s:16:"caminho_exemplar";s:15:"Honra e Glória";s:13:"destino_epico";s:14:"Punho de Titã";s:9:"tendencia";s:10:"Leal e Mal";s:5:"idade";s:2:"35";s:6:"altura";s:4:"2,67";s:4:"peso";s:5:"286Kg";s:9:"divindade";s:1:"-";s:4:"sexo";s:9:"Masculino";s:13:"regiao_origem";s:14:"Sengoku Basara";s:7:"idiomas";s:6:"Nativo";s:10:"iniciativa";s:3:"+15";s:7:"tamanho";s:6:"Grande";s:12:"deslocamento";s:3:"12m";s:16:"intuicao_passiva";s:3:"+21";s:17:"percepcao_passiva";s:3:"+23";s:2:"pv";s:3:"547";s:9:"sangrando";s:2:"21";s:10:"pulso_cura";s:2:"54";s:6:"pulsos";s:2:"33";s:8:"pts_acao";s:2:"45";s:2:"ca";s:2:"35";s:4:"fort";s:3:"+45";s:4:"refl";s:3:"+28";s:4:"vont";s:3:"+20";s:6:"ataque";s:3:"+95";s:4:"dano";s:4:"+110";s:2:"xp";s:7:"250.500";s:13:"ataque_basico";s:28:"Punho supremo +120 dano +110";s:16:"aspectos_raciais";s:38:"Aspecto de gigante, Força monstruosa.";s:15:"caracteristicas";s:1:"-";s:8:"talentos";s:57:"Ataque poderoso, Iniciativa aprimorada, Arrebatar, Isolar";s:8:"pericias";s:42:"Saltar+90, Arremessar +54, Intimidadar +21";s:7:"poderes";s:56:"Punho supremo de titã: Um super soco que causa +30d6+90";s:12:"equipamentos";s:1:"-";s:21:"habilidades_especiais";s:1:"-";s:8:"costumes";s:1:"-";s:6:"tracos";s:72:"Lider supremo de um grupo de mercenários dominadores de países pobres.";s:12:"antecedentes";s:1:"-";}'),
(29, 'Richeter Master', '1449453577.jpg', 'Maickon', '', 'Dungeons and Dragons 5.0', 'Personagem jogador', '18', 'Humano', 'Paladino', 'a:46:{s:5:"forca";s:2:"21";s:8:"destreza";s:2:"16";s:12:"constituicao";s:2:"18";s:12:"inteligencia";s:2:"14";s:9:"sabedoria";s:2:"20";s:7:"carisma";s:2:"22";s:17:"resistencia_forca";s:2:"12";s:20:"resistencia_destreza";s:2:"13";s:24:"resistencia_constituicao";s:2:"17";s:24:"resistencia_inteligencia";s:1:"8";s:21:"resistencia_sabedoria";s:2:"10";s:19:"resistencia_carisma";s:2:"22";s:2:"xp";s:7:"167.900";s:7:"tamanho";s:6:"Médio";s:6:"altura";s:4:"1.78";s:4:"peso";s:4:"77Kg";s:11:"antecedente";s:11:"Hora mádia";s:5:"idade";s:2:"37";s:4:"sexo";s:9:"Masculino";s:5:"olhos";s:9:"Castanhos";s:4:"pele";s:6:"Branca";s:6:"cabelo";s:14:"Pretos e lisos";s:19:"sabedoria_percepcao";s:3:"+14";s:2:"ca";s:2:"30";s:12:"proficiencia";s:3:"+16";s:12:"inspiração";s:3:"+20";s:10:"pvs_atuais";s:3:"188";s:12:"deslocamento";s:2:"9m";s:9:"tendencia";s:10:"Leal e Bom";s:9:"dado_vida";s:3:"d10";s:10:"iniciativa";s:2:"+8";s:24:"habilidade_de_conjuracao";s:3:"+12";s:26:"cd_de_resistencia_de_magia";s:3:"+14";s:24:"bonus_de_ataque_de_magia";s:3:"+17";s:20:"ataques_e_conjuracao";s:23:"Ataque com espada larga";s:6:"ideais";s:64:"Eu irei remover o mal do mundo, seja com a ajuda da lei ou não!";s:23:"tracos_de_personalidade";s:136:"Richeter Master é um justiceiro que segue as leis a risca. Odeia ver injustiça, e caso a lei não cumpra o seu dever. Ele mesmo o faz.";s:8:"vinculos";s:33:"Vínculo animal com sua montaria;";s:8:"defeitos";s:40:"Achar que está acima da lei dos homens.";s:8:"pericias";s:49:"Cavalgar +22, Curar +18, Saltar +15, Procurar +10";s:23:"proficiencias_e_idiomas";s:97:"Armas simples e marciais, Armaduras leves e médias\r\n<br>\r\nFala idioma nativa, Elfico e angelical";s:12:"equipamentos";s:85:"2 Adagas, Uma cruz de ferro e prata, água benta, Armadura completa, armas de combate";s:22:"caracteristicas_tracos";s:1:"-";s:13:"proficiencias";s:1:"-";s:6:"magias";s:72:"Curar ferimentos, Luz do dia, Poder da luz, Espada de luz, Purificação";s:8:"historia";s:24:"Sem historias no momento";}'),
(30, 'Rack', '1449621550.jpg', 'Maickon', '', 'FATE', 'Personagem jogador', '', 'Humano', 'Samurai da Galaxia', 'a:17:{s:9:"cuidadoso";s:1:"4";s:11:"inteligente";s:1:"1";s:9:"chamativo";s:1:"2";s:5:"forte";s:1:"1";s:6:"rapido";s:1:"4";s:10:"sorrateiro";s:1:"5";s:7:"refresh";s:1:"5";s:4:"fate";s:1:"3";s:9:"aparencia";s:30:"Pele morena, alto e musculoso.";s:13:"aspecto_chave";s:26:"Guardião de uma galáxia.";s:19:"aspecto_complicacao";s:34:"Muitos inimigos interplanetários.";s:8:"aspectos";s:60:"Reconhecimento espacial, Senso de dever a ordem do universo.";s:9:"descricao";s:58:"Rack é um explorador do espaço e defensor das galáxias.";s:6:"stress";s:1:"-";s:13:"consequencias";s:1:"-";s:7:"proezas";s:51:"Respeito de diversas raças em inúmeras galáxias,";s:6:"outros";s:1:"-";}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
