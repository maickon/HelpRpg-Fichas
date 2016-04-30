<?php

require_once '../personalidades/class/personalidades.class.php';

$teste = new Personalidades();
$teste->gerar_aspecto('aspectos_positivos', ['aspecto_positivo', 'Aspectos positivos', 'Aspecto positivo']);
echo $teste->titulos['aspecto_positivo'];
echo '<br>';
echo $teste->aspecto_positivo;

echo '<br>';
echo '<hr>';

$teste->gerar_aspecto('aspectos_negativos', ['aspecto_negativo', 'Aspectos negativos', 'Aspecto negativo']);
echo $teste->titulos['aspecto_negativo'];
echo '<br>';
echo $teste->aspecto_negativo;


echo '<br>';
echo '<hr>';

$teste->gerar_aspecto('caracteristicas_gerais', ['caracteristicas_gerais', 'Aspectos gerais', 'Aspecto geral']);
echo $teste->titulos['caracteristicas_gerais'];
echo '<br>';
echo $teste->caracteristicas_gerais;

echo '<br>';
echo '<hr>';

$teste->gerar_aspecto('ideologias', ['ideologias', 'Aspectos ideológicos', 'Aspecto ideológico']);
echo $teste->titulos['ideologias'];
echo '<br>';
echo $teste->ideologias;

echo '<br>';
echo '<hr>';

$teste->gerar_aspecto('medos', ['medos', 'Alguns medos/fobias', 'Um medo/fobia']);
echo $teste->titulos['medos'];
echo '<br>';
echo $teste->medos;

echo '<br>';
echo '<hr>';

$teste->gerar_aspecto('profissao', ['profissao', 'Profissões', 'Uma profissão']);
echo $teste->titulos['profissao'];
echo '<br>';
echo $teste->profissao;

echo '<br>';
echo '<hr>';

$teste->gerar_aspecto('tendencia', ['tendencia', 'Tendencia', 'Tendencia']);
echo $teste->titulos['tendencia'];
echo '<br>';
echo $teste->tendencia;