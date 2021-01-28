<?php
/* Smarty version 3.1.33, created on 2021-01-27 19:33:06
  from '/var/www/html/modules/rx_home/themes/default/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011bff2cfb001_20918083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '165a4459cca4a5fddf249bb0230414fb89ac4e3e' => 
    array (
      0 => '/var/www/html/modules/rx_home/themes/default/form.tpl',
      1 => 1410595749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011bff2cfb001_20918083 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['popup']->value;?>

<table class="tabForm" style="font-size: 16px; background-color: #ffffff;" width="100%" >
    <tr class="moduleTitle">
        <td class="moduleTitle" valign="middle" colspan='2'>&nbsp;</td>
    </tr>
    <tr class="letra12">
        <td align="center"><br><br><br><br><br><img src="<?php echo $_smarty_tpl->tpl_vars['LOGO']->value;?>
"><br><?php echo $_smarty_tpl->tpl_vars['Roomx_intro']->value;?>
<br><?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
</td>
    </tr>
</table>
<table class="tabForm" style="font-size: 16px; border-bottom: 2px solid #aaaaaa;" width="100%" >
    <tr class="letra12">
        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['Rooms_Free']->value;?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['FREE']->value;?>
</td>
        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['Rooms_Busy']->value;?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['BUSY']->value;?>
</td>
        <td align="center"><b><?php echo $_smarty_tpl->tpl_vars['Booking_Today']->value;?>
</b></td>
        <td align="center"><?php echo $_smarty_tpl->tpl_vars['BOOKING']->value;?>
</td>
        <td align="right"><b><?php echo $_smarty_tpl->tpl_vars['Number_Rooms']->value;?>
 : </b></td>
        <td align="left"><?php echo $_smarty_tpl->tpl_vars['TOTAL']->value;?>
</td>
    </tr>
</table>
<input class="button" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" /><?php }
}
