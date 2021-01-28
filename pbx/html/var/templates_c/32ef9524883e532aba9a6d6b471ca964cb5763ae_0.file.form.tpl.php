<?php
/* Smarty version 3.1.33, created on 2021-01-27 19:32:02
  from '/var/www/html/modules/signup/themes/default/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011bfb213ec54_43180464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ef9524883e532aba9a6d6b471ca964cb5763ae' => 
    array (
      0 => '/var/www/html/modules/signup/themes/default/form.tpl',
      1 => 1611775916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011bfb213ec54_43180464 (Smarty_Internal_Template $_smarty_tpl) {
?><table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
    <tr class="letra12">
        <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'input') {?>
        <td align="left">
            <input class="button" type="submit" name="save_new" value="<?php echo $_smarty_tpl->tpl_vars['SAVE']->value;?>
">&nbsp;&nbsp;
            <input class="button" type="submit" name="cancel" value="<?php echo $_smarty_tpl->tpl_vars['CANCEL']->value;?>
">
        </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['mode']->value == 'view') {?>
        <td align="left">
            <input class="button" type="submit" name="cancel" value="<?php echo $_smarty_tpl->tpl_vars['CANCEL']->value;?>
">
        </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?>
        <td align="left">
            <input class="button" type="submit" name="save_edit" value="<?php echo $_smarty_tpl->tpl_vars['EDIT']->value;?>
">&nbsp;&nbsp;
            <input class="button" type="submit" name="cancel" value="<?php echo $_smarty_tpl->tpl_vars['CANCEL']->value;?>
">
        </td>
        <?php }?>
        <td align="right" nowrap><span class="letra12"><span  class="required">*</span> <?php echo $_smarty_tpl->tpl_vars['REQUIRED_FIELD']->value;?>
</span></td>
    </tr>
</table>
<table class="tabForm" style="font-size: 16px;" width="100%" >
    <tr class="letra12">
        <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['my_apps']->value['LABEL'];?>
: <span  class="required">*</span></b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['my_apps']->value['INPUT'];?>
</td>
    </tr>
    <tr class="letra12">
        <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['name']->value['LABEL'];?>
: <span  class="required">*</span></b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['name']->value['INPUT'];?>
</td>
    </tr>
    <tr class="letra12">
        <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['create']->value['LABEL'];?>
: <span  class="required">*</span></b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['create']->value['INPUT'];?>
</td>
    </tr>

</table>
<input class="button" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" /><?php }
}
