<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 10:33:56
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/MinhaConta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1661094620548ae0b47f2d33-41369274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2c0434ca0cbc5ca07732d195ed4d38a0ad695cc' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/MinhaConta.tpl',
      1 => 1418387360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1661094620548ae0b47f2d33-41369274',
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
  'unifunc' => 'content_548ae0b48814e9_07738176',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548ae0b48814e9_07738176')) {function content_548ae0b48814e9_07738176($_smarty_tpl) {?><div class = "center">
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
