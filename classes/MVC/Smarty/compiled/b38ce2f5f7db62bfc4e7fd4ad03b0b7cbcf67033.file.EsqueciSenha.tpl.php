<?php /* Smarty version Smarty-3.1.19, created on 2014-12-17 19:10:51
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Emails/EsqueciSenha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10009238325491f15bbafe93-30390378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b38ce2f5f7db62bfc4e7fd4ad03b0b7cbcf67033' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Emails/EsqueciSenha.tpl',
      1 => 1418648095,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10009238325491f15bbafe93-30390378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
    'nome' => 0,
    'senha' => 0,
    'ip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5491f15bc110d9_61643226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491f15bc110d9_61643226')) {function content_5491f15bc110d9_61643226($_smarty_tpl) {?><style type="text/css">
body { margin:0; }
</style>
<table width="70px" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Helvetica, Verdana, Arial, Tahoma; font-size:11px;">
  <tr>
    <td><img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/images/email/top.png" border="0" height="12" width="550"></td>
  </tr>
  <tr>
    <td align="center"><p>&nbsp;</p>
      <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Verdana, Arial, Tahoma; font-size:12px;">
      <tr>
        <td><h1 style="font:bold 16px Helvetica, Verdana, Arial, Tahoma; color:#335687;">Lembrete de senha</h1>
          <p>Prezado <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
,</p>
          <p>Conforme solicitado pelo nosso site, segue a sua nova senha:</p>
          <p><b><?php echo $_smarty_tpl->tpl_vars['senha']->value;?>
</b></p>
          <p>Se voc&ecirc; tiver qualquer d&uacute;vida ou dificuldade para logar no site, por gentileza entre em contato com nossa equipe de suporte pelo e-mail: suporte@nelogica.com.br.</p>
          <p>          Solicitado atrav&eacute;s do IP: <?php echo $_smarty_tpl->tpl_vars['ip']->value;?>
</p></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td style="font-family:Helvetica, Verdana, Arial, Tahoma; font-size:9px;">
        	<br /><br />
          <img src= "<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/images/email/mini.jpg" border="0" width="79" height="25" /><br /><br />
          Nelogica -  Intelig&ecirc;ncia Para o Mercado Financeiro<br />
          http://www.nelogica.com.br<br />
		      comercial@nelogica.com.br<br />
          Av. Carlos Gomes, 300, 10o andar.<br />
          Cep: 90480-000<br />
          Porto Alegre, Brasil<br />
          Fone: +55-51-3023-8272</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php }} ?>
