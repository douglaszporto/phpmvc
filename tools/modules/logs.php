<?php
/**
* 
*	Name:        Access Logs
*	Description: Este módulo Exibe e filtra os logs de acesso registrados pelo site.
*                Há dois tipos de logs disponíveis: Logs de QUery e Logs de URL
*	
*	Creation: 08/09/2014
*	Author:   Douglas Zanotta
*	
*/
?>
<div id="title">Access Logs</div>
<?php 

/* 
	A variável $extra é preenchida no index.php - Ela possui o segundo valor passado na URL. 
	Ex: http://localhost:8082/Site/tools/logs/extra

	Aqui, apenas vejo se o extra está definido. Se estiver, monto a tela para exibir o processamento.
	Se não estiver definido, significa que estou na tela de seleção de tipo de log e filtro.
*/
if($extra !== ""): 

	// Garante que o modo esteja preenchido.
	$mode = isset($_POST["input-mode"]) ?$_POST["input-mode"] : 'access';

	//Verifica se foi definido filtro.
	$filter = array();
	if(isset($_POST["input-date-start"]) && !empty($_POST["input-date-start"]))
		$filter["start"] = DateTime::createFromFormat('d/m/Y H:i:s', $_POST["input-date-start"]." 00:00:00");
	if(isset($_POST["input-date-end"]) && !empty($_POST["input-date-end"]))
		$filter["end"] = DateTime::createFromFormat('d/m/Y H:i:s', $_POST["input-date-end"]." 23:59:59");
	if(isset($_POST["input-status"]) && !empty($_POST["input-status"]))
		$filter["status"] = $_POST["input-status"];
	if(isset($_POST["input-ip"]) && !empty($_POST["input-ip"]))
		if(preg_match('~^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$~', $_POST["input-ip"]))
			$filter["ip"] = $_POST["input-ip"];
		else
			$filter["error"][] = "O IP definido não é um IP válido.";

	if(isset($filter["start"]) && !empty($filter["start"]) && 
	   isset($filter["end"])   && !empty($filter["end"])   && 
	   date_diff($filter["start"],$filter["end"])->format('%R') === '-'){

		unset($filter["start"]);
		unset($filter["end"]);
		$filter["error"][] = "A data inicial é maior que a data final. O relatório será gerado despersando o filtro de datas.";

	}

	if(isset($filter["start"]) && empty($filter["start"]))
		$filter["error"][] = "A data inicial definida não é uma data válida";
	if(isset($filter["end"]) && empty($filter["end"]))
		$filter["error"][] = "A data final definida não é uma data válida";

	if(isset($filter["error"]) && !empty($filter["error"])):
		foreach($filter["error"] as $e):
?>
	<div class='error'><?php echo $e; ?></div>
<?php
		endforeach;
	endif;
?>
	<table width="900px" id="log">
		<tr>
			<td width="20%" class="cabec">Data</td>
			<td width="15%" class="cabec">IP</td>
			<td width="10%" class="cabec">Resultado</td>
			<td width="55%" class="cabec">
<?php
					switch($mode){
						case 'access': echo "URL"; break;
						case 'query': echo "Query"; break;
					}
?>
			</td>
		</tr>
<?php

	$log = null;
	switch($mode){
		case 'access':
			$log = fopen(dirname(__FILE__) . "/../../logs/access.log","r");
			break;
		case 'query':
			$log = fopen(dirname(__FILE__) . "/../../logs/queries.log","r");
			break;
		default:
			$log = null;
			break;
	}

	if($log !== null):
		while(!feof($log)):
			$line = fgets($log);
			if(empty($line))
				continue;
			preg_match('~^\[(.*?)\]\[(.*?)\]\[(.*?)\]\:(.*)$~i', $line, $reg);

			if(isset($filter["start"]))
				if(DateTime::createFromFormat('Y-m-d H:i:s', $reg[1]) < $filter["start"])
					continue;

			if(isset($filter["end"]))
				if(DateTime::createFromFormat('Y-m-d H:i:s', $reg[1]) > $filter["end"])
					continue;

			if(isset($filter["status"]))
				if($reg[3] !== $filter["status"])
					continue;

			if(isset($filter["ip"]))
				if($reg[2] !== $filter["ip"])
					continue;

?>
		<tr class="line">
			<td><?php echo DateTime::createFromFormat('Y-m-d H:i:s', $reg[1])->format('d/m/Y H:i:s');?></td>
			<td><?php echo $reg[2];?></td>
			<td><?php 
				switch($reg[3]){
					case 'SUCCESS': echo '<span class="green">',$reg[3],'</span>'; break;
					case 'FAIL'   : echo '<span class="red">',$reg[3],'</span>'; break;
					default       : echo '<span class="yellow">',$reg[3],'</span>'; break;
				}
			?></td>
			<td><?php echo $reg[4];?></td>
		</tr>
<?php
			
		endwhile;
		fclose($log);
	endif;
?>
	</table>
<?php
else:
?>
	<div class="text">
		Escolha quais os filtros que deverão ser aplicados na visualização do log.
	</div>
	<form action="<?php echo SITE_DOMAIN; ?>/tools/logs/view" method="POST" id="form-logs">
		<input type="hidden" value="access" name="input-mode" id="input-mode">
		<div style="margin-left:20px;float:left;margin-bottom:5px;">
			<span class="label" style="width:50px">Data</span>
			<input type="text" id="input-date-start" readonly=1 name="input-date-start" /><label class="input-icon" for="input-date-start">t</label>
			<span class="label2">até</span>
			<input type="text" id="input-date-end" readonly=1 name="input-date-end" /><label class="input-icon" for="input-date-end">t</label>
		</div>
		<br clear="all" />
		<div style="margin-left:20px;float:left;margin-bottom:5px;">
			<span class="label" style="width:50px">IP</span><input type="text" id="input-ip" name="input-ip" />
		</div>
		<br clear="all" />
		<div style="margin-left:20px;float:left;">
			<span class="label" style="width:50px">Status</span>
			<select type="text" id="input-status" name="input-status" style="width:145px;">
				<option value=""></option>
				<option value="SUCCESS">Success</option>
				<option value="FAIL">Fail</option>
			</select>
		</div>
	</form>
	<br clear="all" />
	<br/>
	<br/>
	<div id="button-view-querylogs" class="button" style="margin-left:20px; margin-top:20px;">Query Logs</div>
	<div id="button-view-accesslogs" class="button" style="margin-left:20px; margin-top:20px;">Access Logs</div>
	<br clear="all" />
	<br/>
<?php 
endif;
?>