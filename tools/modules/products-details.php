<?php

	if(isset($_POST["product"]) && !empty($_POST["product"])){
		$produto_id = str_replace("'","''",addslashes($_POST["product"]));

		$db = \PHPMVC\DB::getInstance();
		$db->Query("SELECT * FROM Site.dbo.produtos WHERE id = '$produto_id'");
		if(!($result = $db->Fetch()))
			$result = array();
		else
			$result = @array_map('utf8_encode',$result);
	}else{
		$result = null;
	}

	if(!is_null($result) && empty($result)):
?>
		<div style="font-size:12px; text-align:center; height:50px; line-height:50px;">O produto requisitado parece não existir mais...</div>
<?php 
	else: 
		if(is_null($result)){
			$result = array(
				"id"                => 0,
				"nome"              => "",
				"identificador"     => "",
				"testavel"          => "",
				"assinavel"         => "",
				"descricaoIndice"   => "",
				"descricaoCompleta" => ""
			);
		}
?>
		<div style="width:700px;" data-form-action="/tools/ajax/products-update/" class="form-submiter">
			<input type="hidden" value="<?php echo $result["id"] ?>" id="input-id" />
			<div style="font-size:24px; padding:15px 10px; border-bottom: 1px solid #cacaca; margin-bottom:10px;"><?php echo ($result["id"] == 0 ? "Adicionar" : "Editar") ?> Produto</div>
			<label class="form-label" for="input-nome" style="width:50px">Nome</label><input type="text" class="form-input" id="input-nome" style="margin-right:20px;" value="<?php echo $result["nome"]; ?>" />
			<label class="form-label" for="input-identificador" style="width:90px">Identificador</label><input type="text" class="form-input" style="margin-right:30px" id="input-identificador" value="<?php echo $result["identificador"]; ?>" />
			<input type="checkbox" class="form-input" id="input-testavel" <?php echo ($result["testavel"] == '1' ? 'checked="checked"' : ''); ?> /><label class="form-label" for="input-testavel" style="width:80px">Testável</label>
			<input type="checkbox" class="form-input" id="input-assinavel" <?php echo ($result["assinavel"] == '1' ? 'checked="checked"' : ''); ?> /><label class="form-label" for="input-assinavel" style="width:60px">Assinável</label>
			<label class="form-label" for="input-descricao-indice" style="width:200px">Descrição no índice</label><br clear="all"/>
			<textarea class="form-textarea" id="input-descricao-indice" style="width:680px; height:80px;"><?php echo $result["descricaoIndice"]; ?></textarea><br clear="all"/>
			<label class="form-label" for="input-descricao-completa" style="width:200px">Descrição completa</label><br clear="all"/>
			<textarea class="form-textarea" id="input-descricao-completa" style="width:680px; height:80px;"><?php echo $result["descricaoCompleta"]; ?></textarea><br clear="all"/>
		</div>
<?php 
	endif; 
?>
<br clear="all" />