<?php
/* Smarty version 3.1.33, created on 2021-01-27 19:34:01
  from '/var/www/html/modules/rx_wakeup/themes/default/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011c02919bb08_76800928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d3e0457ae1ddc6cdb20ff5d9ce281a4c5c98603' => 
    array (
      0 => '/var/www/html/modules/rx_wakeup/themes/default/form.tpl',
      1 => 1395032670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011c02919bb08_76800928 (Smarty_Internal_Template $_smarty_tpl) {
?><table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
    <tr class="letra12">
        <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'input') {?>
        <td align="left">
            <input class="button" type="submit" name="save_new" value="<?php echo $_smarty_tpl->tpl_vars['SAVE']->value;?>
">&nbsp;&nbsp;
			<input class="button" type="submit" name="delete" value="<?php echo $_smarty_tpl->tpl_vars['DELETE']->value;?>
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
       <td align="left" valign="center" width="650">
		<table>
    			<tr class="letra12">
        			<td align="right" width="100"><b><?php echo $_smarty_tpl->tpl_vars['room']->value['LABEL'];?>
: </b></td>
        			<td align="left" width="200"><?php echo $_smarty_tpl->tpl_vars['room']->value['INPUT'];?>
 <span  class="required">*</span></td>
        			<td align="right" width="200"><b><?php echo $_smarty_tpl->tpl_vars['spread']->value['LABEL'];?>
: </b></td>
        			<td align="left" width="200"><?php echo $_smarty_tpl->tpl_vars['spread']->value['INPUT'];?>
 <span  class="required">*</span></td>
    			</tr>
    			<tr class="letra12">
        			<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['from']->value['LABEL'];?>
: </b></td>
        			<td align="left"><?php echo $_smarty_tpl->tpl_vars['from']->value['INPUT'];?>
 <span  class="required">*</span></td>
        			<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['to']->value['LABEL'];?>
: </b></td>
        			<td align="left"><?php echo $_smarty_tpl->tpl_vars['to']->value['INPUT'];?>
 <span  class="required">*</span></td>
    			</tr>
        	</table>
       </td>
       <td align="left" valign="center" width="200">
		<?php echo $_smarty_tpl->tpl_vars['wuPic']->value;?>

       </td>
       </td>
       <td align="left" valign="center">
		
       </td>
    </tr>
</table>
<input class="button" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" /><?php }
}
