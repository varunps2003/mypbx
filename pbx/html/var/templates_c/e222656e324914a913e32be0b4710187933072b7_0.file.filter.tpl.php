<?php
/* Smarty version 3.1.33, created on 2021-01-27 19:38:46
  from '/var/www/html/modules/group_permission/themes/default/filter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011c146950633_94235488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e222656e324914a913e32be0b4710187933072b7' => 
    array (
      0 => '/var/www/html/modules/group_permission/themes/default/filter.tpl',
      1 => 1582832751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011c146950633_94235488 (Smarty_Internal_Template $_smarty_tpl) {
?><table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr class="letra12">
        <td width="10%" align="right"><?php echo $_smarty_tpl->tpl_vars['filter_group']->value['LABEL'];?>
:</td>
        <td width="20%" align="left"><?php echo $_smarty_tpl->tpl_vars['filter_group']->value['INPUT'];?>
</td>
        <td align="left"><input class="button" type="submit" name="show" value="<?php echo $_smarty_tpl->tpl_vars['SHOW']->value;?>
" /><td>
    </tr>
</table>
<?php }
}
