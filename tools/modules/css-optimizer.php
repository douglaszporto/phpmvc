<?php
/**
* 
*	Name:        CSS Optimizer
*	Description: Este módulo verifica se algum dos CSSs para resoluções maiores estão sobrescrevendo as definições do
*                CSS de baixa resolução (com o mesmo valor).
*                ESTE MÓDULO NÃO PROCESSA CSS MINIFICADO!
*	
*	Creation: 08/09/2014
*	Author:   Douglas Zanotta
*	
*/
?>
<div id="title">CSS Optimizer</div>
<?php 

/* 
	A variável $extra é preenchida no index.php - Ela possui o segundo valor passado na URL. 
	Ex: http://localhost:8082/Site/tools/css-optimizer/extra

	Aqui, apenas vejo se o extra está definido. Se estiver, monto a tela para exibir o processamento.
	Se não estiver definido, significa que estou na tela de seleção de arquivos.
*/
if($extra !== ""): 

	// Pega os nomes dos arquivos definidos e percorre todos eles.
	$files = isset($_POST["files-to-optimize"]) ? explode('**',$_POST["files-to-optimize"]) : array();
	$cssSelectors = array();
	$redefinitions = array();

	foreach($files as $file) {

		// Verifica se o arquivo atual do loop existe. Se não existir, die.
		$filePath = dirname(__FILE__) . "/../../statics/css/" . $file;
		if(!file_exists($filePath))
			die('Não foi possível localizar o arquivo '.$filePath);

		// Pego o conteúdo do arquivo e retiro todos os comentários.
		$css_content = file_get_contents($filePath);
		$css_content = preg_replace('~\/\*(.*?)\*\/~ism', '', $css_content);

		// Coloco no array $definitions todos os seletores css encontrados no arquivo.
		preg_match_all('~([a-zA-Z0-9,\s\.\:\#\_\-\>\[\'\"\]\=]+)(?:{([^}]*)}|,\s*$)~ism',$css_content,$definitions);
		unset($definitions[0]);


		// Faz o cache da linha do arquivo em que se encontra cada seletor
		// Está feito de uma forma lenta. TODO: Otimizar este procedimento.
		// A lógica é: Explodir o conteúdo do arquivo em cada linha, percorrer o vetor, concatenando o número da linha
		// no inicio da string, e implodir o vetor de volta ao estado original. O resultado esperado é a mesma string
		// inicial, porém com o número da linha, um arroba e um espaço concatenados no inicio de cada linha.
		// Há um tratamento dentro do callback do array_walk para não colocar o número da linha em seletores definidos
		// em mais de uma linha.
		$line_cache = array();
		$css = file_get_contents($filePath);
		$css = explode("\n",$css);
		array_walk($css, function(&$v,$k,$t){
			if($k > 1 && preg_match('~^(.*),\s*$~ism',$t[0][$k-1]))
				$v = trim($v);
			else
				$v = ($k+1)."@ ".trim($v);
		},array($css));
		$css = implode("\n",$css);

		// Com as linhas colocas na string, podemos percorrer o conteúdo do css e atrlar uma linha a um seletor encontrado.
		preg_match_all('~^(\d+)@ (.*?)([a-zA-Z0-9,\s\.\:\#\_\-\>\[\'\"\]\=\n]+)(?:{(?:[^}]*)}|,\s*$)~im',$css,$lines);
		unset($lines[0]);
		unset($lines[2]);

		// Monta o vetor $line_cache, onde o índice é o seletor (sem quebra de linha) e o valor é a linha referenciada.
		foreach($lines[1] as $i => $line)
			$line_cache[preg_replace('~\n+~ism','',trim($lines[3][$i]))] = $line;


		// Percorro todas as definições obtidas no arquivo original.
		// Para cada definição, limpo o seletor (retiro multiplos espaços/tabs e quebras de linha)
		// e explodo as definições do CSS.
		foreach($definitions[1] as $i => $s){
			$s = trim(preg_replace('~(\s{2,}|\n|\r|\t)~ism', '', $s));
			$d = explode(";",$definitions[2][$i]);

			// Para cada definição explodida...
			foreach($d as $k => $v) {

				// Vejo se está vazia ou se pertence a uma definição de font-face. Caso sim, pula para a próxima definição.
				$v = trim($v);
				if(empty($v) || $s == 'font-face')
					continue;

				// Seto o valor de $property e $value dividindo a string de $v no caractere ":"
				list($property,$value) = explode(":",$v);
				$property = trim($property);
				$value    = trim($value);

				// Se já defini o seletor encontrado exatamente com este valor, significa que está sobrescrevendo.
				if(isset($cssSelectors[$s][$property]) && $cssSelectors[$s][$property] == $value){
					$redefinitions[$file][$s.'%'.$line_cache[$s]][] = array(
						"property" => $property,
						"value"    => $value
					);
				}

				// Salva a definição.
				$cssSelectors[$s][$property] = $value;
			}
		}
	}

	// Percorro o vetor de redefinições, montando o html que será exibido. Também realizo a contagem das redefinições.
	foreach ($redefinitions as $file => $redef) : 
		$countRedef    = 1;
		$numRedefFound = 0;
		foreach ($redef as $v)
			$numRedefFound += count($v);
		$msg = $numRedefFound . ($numRedefFound == 1 ? ' definição repetida encontrada.' : ' definições repetidas encontradas.');
?>
	<div class="css-redefinition-title">
		<span class="css-redefinition-file"><?php echo $file; ?></span>
		<span>- <?php echo $msg; ?></span>
	</div>
	<table class="css-redefinition-selector" width="900px">
		<tr>
			<td class="cabec" width="5%">Linha</td>
			<td class="cabec" width="25%">Seletor CSS</td>
			<td class="cabec" width="70%" style="padding-left:35px;">Propriedades redefinidas</td>
		</tr>
<?php
		foreach($redef as $k => $r):
			list($selector,$line) = explode('%',$k);
?>
		<tr>
			<td style="text-align:right; padding-right:10px;"><?php echo $line; ?></td>
			<td><?php echo $selector; ?></td>
			<td>
<?php
			foreach($r as $prop):
?>
			<div class="counter"><?php echo ($countRedef++); ?></div><div><?php echo $prop["property"],":",$prop["value"]; ?></div>
<?php
			endforeach;
?>
			</td>
		</tr>
<?php
		endforeach; 
?>
	</table>
<?php
	endforeach;
?>
<?php
else:

	// Entra neste bloco apenas quando não há extra definido, ou seja: tela de seleção de arquivo.

	// Está função recursiva retorna todos os arquivos .css dentro de um diretório especificado.
	function SearchCSSFiles($dir, $prefix = '') {
		$dir = rtrim($dir, '\\/');
		$result = array();

		foreach (scandir($dir) as $f) {
			if ($f !== '.' and $f !== '..') {
				if (is_dir("$dir/$f")) {
					$result = array_merge($result, SearchCSSFiles("$dir/$f", "$prefix$f/"));
				} else {
					if(preg_match('~\.css$~i', $f))
						$result[] = $prefix.$f;
				}
			}
		}

		return $result;
	}

	// $files terá todos os arquivos .css dentro da pasta statics da raiz do projeto.
	// Um foreach será responsável por montar a listagem dos arquivos.
	//A seleção deles é feita através do JS.
	$files = SearchCSSFiles(dirname(__FILE__)."/../../statics/css/");
?>
	<div class="text">
		Escolha quais os arquivos CSS que deverão ser analisados (em ordem de prioridade)
	</div>
	<div style="margin-left:20px; float:left; width: 300px;">
		<?php foreach ($files as $i=>$f): ?>
		<div class="list" id="file<?php echo $i; ?>"><?php echo $f; ?></div>
		<?php endforeach; ?>
	</div>
	<br clear="all" />
	<br/>
	<br/>
	<div class="text">
		Ordem de análise selecionada:
	</div>
	<div id="files-to-optimize">
		&nbsp;
	</div>
	<br clear="all" />
	<div id="button-analyze" class="button" style="margin-left:20px; margin-top:20px;">Analizar</div>
	<br clear="all" />
	<br/>
<? endif; ?>