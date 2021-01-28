<?php
/* Smarty version 3.1.33, created on 2021-01-27 20:22:52
  from '/var/www/html/modules/userlist/plugins/extension/tpl/new_extension.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011cb9c49a782_25154308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '289a0e1a52251b8d2e4e2170a0ae37a15e5847fe' => 
    array (
      0 => '/var/www/html/modules/userlist/plugins/extension/tpl/new_extension.tpl',
      1 => 1575572864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011cb9c49a782_25154308 (Smarty_Internal_Template $_smarty_tpl) {
?><fieldset>
    <legend><img src="images/call.png" width="22" height="22" />&nbsp;<b><?php echo $_smarty_tpl->tpl_vars['LBL_EXTENSION_FIELDS']->value;?>
</b></legend>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabForm">
        <tr>
            <td width="20%"><?php echo $_smarty_tpl->tpl_vars['extension']->value['LABEL'];?>
:</td>
            <td width="30%"><?php echo $_smarty_tpl->tpl_vars['extension']->value['INPUT'];?>
</td>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>
</fieldset>
<?php }
}
