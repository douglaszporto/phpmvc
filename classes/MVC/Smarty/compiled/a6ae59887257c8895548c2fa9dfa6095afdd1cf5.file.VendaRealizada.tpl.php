<?php /* Smarty version Smarty-3.1.19, created on 2014-12-03 10:05:00
         compiled from "D:\ProjetosWeb\site_rebuild\views\Assinatura\VendaRealizada.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17245547e1619c50831-99096173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6ae59887257c8895548c2fa9dfa6095afdd1cf5' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Assinatura\\VendaRealizada.tpl',
      1 => 1417608298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17245547e1619c50831-99096173',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547e1619c92479_87905263',
  'variables' => 
  array (
    'produto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547e1619c92479_87905263')) {function content_547e1619c92479_87905263($_smarty_tpl) {?><div id="buy-content" class="center conteudo">
	<h2>Assinatura duplicada</h2>
	<p id="buy-description">Você já possui uma assinatura do <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
 ativa ou uma compra em aberto.</p>
	<h3>Alguma dúvida</h3>
	<p>Entre em contato com a nossa equipe através do telefone (51)3023-8272 ou através de um dos seguintes emails
		<ul>
			<li>suporte@nelogica.com.br</li>
			<li>comercial@nelogica.com.br</li>
			<li>financeiro@nelogica.com.br</li>
		</ul>
	<div class="greenButton button" id="buy-continue"><a id="buy-continue-link" href="/produtos/">Retornar</a></div>
</div><?php }} ?>
