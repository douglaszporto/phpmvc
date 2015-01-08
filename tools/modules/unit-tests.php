<?php
	/**
	* 
	*	Name:        Unit Test
	*	Description: Este módulo executa todos os testes unitários cadastrados no sistema.
	*	
	*	Creation: 12/09/2014
	*	Author:   Douglas Zanotta
	*	
	*/

	/////////////////////////////////////
	// Está função recursiva retorna todos os arquivos .test.php dentro de um diretório especificado.
	function SearchTestFiles($dir, $prefix = '') {
		$dir = rtrim($dir, '\\/');
		$result = array();

		foreach (scandir($dir) as $f) {
			if ($f !== '.' and $f !== '..') {
				if (is_dir("$dir/$f")) {
					$result = array_merge($result, SearchTestFiles("$dir/$f", "$prefix$f/"));
				} else {
					if(preg_match('~\.test.php$~i', $f))
						$result[] = $prefix.$f;
				}
			}
		}

		return $result;
	}

	$tests = array();

	// $files terá todos os arquivos .test.php dentro da pasta /tools/tests.
	$files = SearchTestFiles(dirname(__FILE__)."/../tests/");

	// Percorro todos os arquivos e inclu-os nesta execução, assim os testes serão executados.
	foreach ($files as $f) {
		$dirFile = dirname(__FILE__) . "/../tests/".$f;

		if(!file_exists($dirFile))
			continue;

		include $dirFile;
	}

?>
<div id="title">Unit Tests</div>
<?php

if($extra === 'perform'):
	foreach($tests as $t):
?>
	<div class='test-title'><?php echo $t->getTitle(); ?></div>
	<table width="100%">
		<tr class="test-cabec">
			<td width="5%">Nº</td>
			<td width="35%">Descrição</td>
			<td width="10%">Resultado</td>
			<td width="50%">Expressão avaliada</td>
		</tr>
	<?php
		$results = $t->getResults();
		foreach($results as $id => $r):
	?>
		<tr class="test-test">
			<td><?php echo $id+1; ?></td>
			<td><?php echo $r["description"]; ?></td>
			<td><?php echo $r["result"] ? "<span class='green'>OK!</span>" : "<span class='red'>FAIL</span>"; ?></td>
			<td><span class="test-value"><?php echo $r["callback"]; ?></span> <span style="color:#999">deve ser</span> <?php echo $r["operation"],' '; ?><span class="test-value"><?php echo $r["should"]; ?></span></td>
		</tr>
	<?php
		endforeach;
	?>
	</table>
<?php
	endforeach;
else:
?>
<a href="<?php echo SITE_DOMAIN; ?>/tools/unit-tests/perform" id="button-view-accesslogs" class="button" style="margin-left:20px; margin-top:20px;">Rodar testes</a>
<?php
endif;
?>