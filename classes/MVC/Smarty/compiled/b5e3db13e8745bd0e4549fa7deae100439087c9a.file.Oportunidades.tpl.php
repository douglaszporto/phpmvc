<?php /* Smarty version Smarty-3.1.19, created on 2014-12-11 12:26:49
         compiled from "D:\ProjetosGit\SiteRebuild\views\Empresa\Oportunidades.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30191546ce8656c9dd1-74943760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5e3db13e8745bd0e4549fa7deae100439087c9a' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Empresa\\Oportunidades.tpl',
      1 => 1417536207,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30191546ce8656c9dd1-74943760',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_546ce8657008e8_90544456',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546ce8657008e8_90544456')) {function content_546ce8657008e8_90544456($_smarty_tpl) {?><div id = "empresa">
	<div class="center">
	
		<?php echo $_smarty_tpl->getSubTemplate ('../MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		<div class="conteudo">
			<h2>
				Venha trabalhar conosco
			</h2>

			<p>
				A nossa equipe é, sem dúvida, um de nossos maiores diferenciais competitivos. Estamos constantemente procurando novos talentos, pessoas criativas, inteligentes e sem medo de tornar seus sonhos em realidade. A Nelogica possui um ambiente de trabalho saudável, dinâmico e repleto de desafios para aqueles que aceitam a missão de <span class="b"> inovar </span>. Se você se enquadra neste perfil entre em contato com a gente. 
				<br />
				<br />
				<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/empresa/trabalheconosco" class="b">rh@nelogica.com.br</a>	
			</p>
			<br />
		</div>

		<br clear="all"/>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('Empresa/BlocoContato.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('../Newsletter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>





<?php }} ?>
