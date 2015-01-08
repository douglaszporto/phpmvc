<?php /* Smarty version Smarty-3.1.19, created on 2014-12-15 16:20:54
         compiled from "D:\ProjetosGit\SiteRebuild\views\User\MinhaConta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20245548f26865cb2f6-66711493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8755c2949f9cc81865d976fec254b8749f238e5' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\User\\MinhaConta.tpl',
      1 => 1418045927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20245548f26865cb2f6-66711493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
    'codAtivacao' => 0,
    'codigo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_548f2686609b09_96159863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f2686609b09_96159863')) {function content_548f2686609b09_96159863($_smarty_tpl) {?><div class = "center">
	<p>
		<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conta/alterar_dados" class = "link-detalhe">DETALHES DA CONTA</a>
	</p>
	<br />
	<?php if ($_smarty_tpl->tpl_vars['codAtivacao']->value) {?>		
		Código de Ativação: <span class = "b"><?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
</span>			
	<?php }?>
</div><?php }} ?>
