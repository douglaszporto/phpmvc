<?php

	if(!isset($_POST["product"]) || empty($_POST["product"]))
		exit();

	$produto_id = str_replace("'","''",addslashes($_POST["product"]));

	$db = \PHPMVC\DB::getInstance();
	$db->Query("SELECT id,titulo FROM Site.dbo.produtos_caracteristicas WHERE produto_id = '$produto_id'");

?>
	<!--<div style="font-size:12px; text-align:center; height:50px; line-height:50px;">O produto requisitado parece não existir mais...</div>-->
	<div style="width:900px;" data-form-action="" class="form-submiter">
		<div style="font-size:24px; padding:15px 10px; border-bottom: 1px solid #cacaca; margin-bottom:10px;">Caracteristicas</div>
		<div style="float:left; width:200px; border-right:1px solid #cacaca; box-sizing:border-box; height:600px; overflow:auto;" id="product-features-list">
			<?php while($features = $db->Fetch()): ?>
				<div class="product-feature-item"><input type="hidden" value='<?php echo $features["id"]; ?>'/><?php echo utf8_encode($features["titulo"]); ?></div>
			<?php endwhile; ?>
			<div class="product-feature-new-item product-feature-item-selected"><input type="hidden" value="0"/>Adicionar nova Caraterística</div>
		</div>
		<div style="float:left; width:700px; height:700px; overflow:auto; padding:10px; box-sizing:border-box; position:relative" class="product-feature-form">
			<input type="hidden" id="input-id" value="0"/>
			<input type="hidden" id="input-produto-id" value="<?php echo (int)$_POST["product"]; ?>"/>
			<input type="hidden" id="input-miniatura" value=""/>
			<label class="form-label" for="input-titulo" style="width:50px">Título</label><input type="text" class="form-input" id="input-titulo" style="width:260px;" value="" />
			<label class="form-label" for="input-identificador" style="width:90px">Identificador</label><input type="text" class="form-input" id="input-identificador" style="width:120px" value="" />
			<label class="form-label" for="input-miniatura" style="">Miniatura</label>
			<div class="button-geral" id="miniatura-update" title="Alterar">
				<div style="position:absolute;top:0;left:0;right:0;bottom:0;height:100%;width:100%;line-height:30px;text-align:center">&#xe0e8;</div>
				<iframe src="<?php echo SITE_DOMAIN; ?>/tools/ajax/image-upload?call=miniatura-update" style="opacity:0.01;position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%;"></iframe>
			</div><div class="button-geral" id="miniatura-view" title="Ver">&#xe0bf;</div>
			<label class="form-label" for="input-descricao" style="width:200px">Descrição</label><br clear="all"/>
			<textarea class="form-textarea" id="input-descricao" style="width:670px; height:150px;"></textarea><br clear="all"/>
			<label class="form-label" for="input-texto" style="width:200px">Texto</label><br clear="all"/>
			<textarea class="form-textarea" id="input-texto" style="width:670px; height:330px;"></textarea><br clear="all"/>
			<div class="button product-feature-save">Salvar</div>
			<div class="button product-feature-remove" title="Remover">&#xe049;</div>
		</div>
	</div>
	<div style="position:absolute;bottom:200%;right:200%;opacity:0;width:240px;height:150px;margin-bottom:-75px;margin-right:-120px;transition:opacity .2s ease">
		<img src="<?php echo SITE_DOMAIN; ?>/tools/statics/images/no-mini.jpg" id="miniatura_url" style="width:240px;height:150px;border-radius:10px;" />
		<div id="close-mini" style="position:absolute;bottom:85%;left:91%;height:30px;width:30px;border-radius:50%;border:5px solid #f00;color:#f00;line-height:30px;text-align:center;font-size:20px;font-family:'IconPackage';background-color:#fff;cursor:pointer;">&#xe272;</div>
	</div>
<br clear="all" />