<?php

require_once '../personalidades/class/personalidades.class.php';

$teste = new Personalidades();
$teste->gerar_aspecto('aspectos_positivos', ['aspecto_positivo', 'Aspectos positivos', 'Aspecto positivo']);
$teste->gerar_aspecto('aspectos_negativos', ['aspecto_negativo', 'Aspectos negativos', 'Aspecto negativo']);
$teste->gerar_aspecto('caracteristicas_gerais', ['caracteristicas_gerais', 'Aspectos gerais', 'Aspecto geral']);
$teste->gerar_aspecto('ideologias', ['ideologias', 'Aspectos ideológicos', 'Aspecto ideológico']);
$teste->gerar_aspecto('medos', ['medos', 'Alguns medos/fobias', 'Um medo/fobia']);
$teste->gerar_aspecto('tendencia', ['tendencia', 'Tendencia', 'Tendencia']);

$personalidade = [
					'titulo_negativos' 	=> $teste->titulos['aspecto_negativo'],
                    'negativos' 		=> $teste->aspecto_negativo,
                    'titulo_positivos'	=> $teste->titulos['aspecto_positivo'],
                    'positivos'			=> $teste->aspecto_positivo,	
                    'titulo_gerais'		=> $teste->titulos['caracteristicas_gerais'],
                    'gerais'			=> $teste->caracteristicas_gerais,
                    'titulo_ideologia'	=> $teste->titulos['ideologias'],
                    'ideologia'			=> $teste->ideologias,
                    'titulo_medos'		=> $teste->titulos['medos'],
                    'medos'				=> $teste->medos,
                    'titulo_tendencia'	=> $teste->titulos['tendencia'],
                    'tendencia' 		=> $teste->tendencia       
				 ];

echo json_encode($personalidade);