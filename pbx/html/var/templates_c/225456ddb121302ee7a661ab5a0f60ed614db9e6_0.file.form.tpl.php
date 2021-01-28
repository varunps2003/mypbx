<?php
/* Smarty version 3.1.33, created on 2021-01-27 21:06:08
  from '/var/www/html/modules/currency/themes/default/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011d5c0cc8655_08362508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '225456ddb121302ee7a661ab5a0f60ed614db9e6' => 
    array (
      0 => '/var/www/html/modules/currency/themes/default/form.tpl',
      1 => 1590155778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011d5c0cc8655_08362508 (Smarty_Internal_Template $_smarty_tpl) {
?><table width="99%" border="0" cellspacing="0" cellpadding="4" align="center">
    <tr class="letra12">
        <td align="left"><input class="button" type="submit" name="save" value="<?php echo $_smarty_tpl->tpl_vars['SAVE']->value;?>
"></td>
    </tr>
</table>
<table class="tabForm" style="font-size: 16px;" width="100%" >
    <tr class="letra12">
        <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['currency']->value['LABEL'];?>
: </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['currency']->value['INPUT'];?>
</td>
    </tr>

</table>
<?php }
}
