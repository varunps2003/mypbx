<?php
/* Smarty version 3.1.33, created on 2021-01-27 19:33:47
  from '/var/www/html/modules/rx_check_out/themes/default/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011c01b66d0a4_17471673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff6cfe4de5fef8dc7a74407645c30a13a20616c5' => 
    array (
      0 => '/var/www/html/modules/rx_check_out/themes/default/form.tpl',
      1 => 1465714187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011c01b66d0a4_17471673 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['popup']->value;?>

<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
    <tr class="moduleTitle">
        <td class="moduleTitle" valign="middle" colspan='2'>&nbsp;</td>
    </tr>
    <tr class="letra12">
        <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'input') {?>
        <td align="left">
            <input class="button" type="submit" name="save_new" value="<?php echo $_smarty_tpl->tpl_vars['SAVE']->value;?>
">&nbsp;&nbsp;
            <input class="button" type="submit" name="cancel" value="<?php echo $_smarty_tpl->tpl_vars['CANCEL']->value;?>
">
        </td>
        <td align="left"><b><?php echo $_smarty_tpl->tpl_vars['When']->value['LABEL'];?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['When']->value['INPUT'];?>
</td>
        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['date']->value['LABEL'];?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['date']->value['INPUT'];?>
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
        <td align="right" nowrap>
            <span class="letra12"><span  class="required">*</span> <?php echo $_smarty_tpl->tpl_vars['REQUIRED_FIELD']->value;?>
</span>
        </td>
    </tr>
</table>
<br>
<table class="tabForm" style="font-size: 16px;" align="center" border="0">
    <tr class="letra12">
        <td align="right" width="50"><b><?php echo $_smarty_tpl->tpl_vars['room']->value['LABEL'];?>
 : </b></td>
        <td align="left"  width="40"><?php echo $_smarty_tpl->tpl_vars['room']->value['INPUT'];?>
</td>

        <td align="right" width="170"><b><?php echo $_smarty_tpl->tpl_vars['asModel']->value['LABEL'];?>
 : </b></td>
        <td align="left"  width="170"><?php echo $_smarty_tpl->tpl_vars['asModel']->value['INPUT'];?>
</td>
    </tr>
    <tr class="letra12">
        <td align="right" width="90"><b><?php echo $_smarty_tpl->tpl_vars['group']->value['LABEL'];?>
 : </b></td>
        <td align="left"  width="50"><?php echo $_smarty_tpl->tpl_vars['group']->value['INPUT'];?>
</td>
		
        <td align="right" width=""><b><?php echo $_smarty_tpl->tpl_vars['discount']->value['LABEL'];?>
 : </b></b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['discount']->value['INPUT'];?>
</td>
    </tr>
    <tr class="letra12">
        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['paid']->value['LABEL'];?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['paid']->value['INPUT'];?>
</td>

        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['payment_mode']->value['LABEL'];?>
 :</b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['payment_mode']->value['INPUT'];?>
 </td>
    </tr>
    <tr class="letra12">
        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['details']->value['LABEL'];?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['details']->value['INPUT'];?>
</td>

        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['sending_by_mail']->value['LABEL'];?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['sending_by_mail']->value['INPUT'];?>
 </td>
    </tr>
</table>
    <?php if ($_smarty_tpl->tpl_vars['bil']->value == '1') {?>
<br><br>
<table class="tabForm" style="font-size: 16px;" width="100%">
    <tr class="letra12">
        <td align="left"  width="50"><a style="text-decoration: none;" href="roomx_billing/<?php echo $_smarty_tpl->tpl_vars['bil_link']->value;?>
" target="_next"><button type="button"><?php echo $_smarty_tpl->tpl_vars['Display']->value;?>
</button></a></td>
        <td align="Left"  width="100"><b><?php echo $_smarty_tpl->tpl_vars['call_number']->value;?>
</b> <?php echo $_smarty_tpl->tpl_vars['Call']->value;?>
</td>
        <td align="left"  width="375"><b><?php echo $_smarty_tpl->tpl_vars['Total']->value;?>
</b> : <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
     </tr>
</table>
    <?php }?>



<input class="button" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" /><?php }
}
