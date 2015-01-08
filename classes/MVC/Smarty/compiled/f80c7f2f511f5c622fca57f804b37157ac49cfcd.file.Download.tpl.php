<?php /* Smarty version Smarty-3.1.19, created on 2014-12-04 16:49:57
         compiled from "D:\ProjetosWeb\site_rebuild\views\Produtos\Download.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9291547f3b237734b3-41350785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f80c7f2f511f5c622fca57f804b37157ac49cfcd' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Produtos\\Download.tpl',
      1 => 1417715656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9291547f3b237734b3-41350785',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547f3b237c57f9_22879482',
  'variables' => 
  array (
    'produto' => 0,
    'tipoLicenca' => 0,
    'chaveTestes' => 0,
    'dtInicio' => 0,
    'dtFinal' => 0,
    'download' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547f3b237c57f9_22879482')) {function content_547f3b237c57f9_22879482($_smarty_tpl) {?><div class="center">
	<?php echo $_smarty_tpl->getSubTemplate ('MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="conteudo">
		<h2>Obrigado pelo seu interesse no <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
.</h2>
		<p>
			Você poderá utilizar gratuitamente todas as funcionalidades do <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>

			em até 7 dias a contar da data de ativação do software.
		</p>
		<br/>
		<?php if ($_smarty_tpl->tpl_vars['tipoLicenca']->value<=1) {?>
		<p>
			O seu código de ativação é: <?php echo $_smarty_tpl->tpl_vars['chaveTestes']->value;?>

		</p>
		<?php } elseif ($_smarty_tpl->tpl_vars['tipoLicenca']->value==2) {?>
		<p>
			O seu código de ativação é: <?php echo $_smarty_tpl->tpl_vars['chaveTestes']->value;?>
<br />
			O período de uso deste código está entre <?php echo $_smarty_tpl->tpl_vars['dtInicio']->value;?>
 e <?php echo $_smarty_tpl->tpl_vars['dtFinal']->value;?>
.
		</p>
		<?php } elseif ($_smarty_tpl->tpl_vars['tipoLicenca']->value==3) {?>
		<p>
			Seu trial expirou no dia <b>{$arrChave['dtFinal']}</b>.
			O seu último código de ativação foi: <?php echo $_smarty_tpl->tpl_vars['chaveTestes']->value;?>

		</p>
		<?php }?>
		<br/>
		<p>
			Para iniciar o download do <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>

			<a id="linkDownload" href="<?php echo $_smarty_tpl->tpl_vars['download']->value;?>
" target="_blank">
				clique aqui
			</a>.
		</p>
		<br/>
	</div>
	<br clear="all" />
</div>
<script>
$(document).ready(function(){
	setTimeout(function(){
		window.location.href = $('a#linkDownload').attr('href');
	}, 1500);
});
</script><?php }} ?>
