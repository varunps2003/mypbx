<?php
/* Smarty version 3.1.33, created on 2021-01-27 19:33:35
  from '/var/www/html/modules/rx_check_in/themes/default/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011c00f9573c5_77121639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '792d3651e878c6630899a7f743c94e79770f2e2a' => 
    array (
      0 => '/var/www/html/modules/rx_check_in/themes/default/form.tpl',
      1 => 1396682100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011c00f9573c5_77121639 (Smarty_Internal_Template $_smarty_tpl) {
?><br>

<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
    <tr class="letra12">
        <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'input') {?>
        <td align="left">
            <input class="button" type="submit" name="save_new" value="<?php echo $_smarty_tpl->tpl_vars['SAVE']->value;?>
">&nbsp;&nbsp;
            <input class="button" type="submit" name="cancel" value="<?php echo $_smarty_tpl->tpl_vars['CANCEL']->value;?>
">&nbsp;&nbsp;
            <input class="button" type="submit" name="save_edit" value="<?php echo $_smarty_tpl->tpl_vars['EDIT']->value;?>
">
        </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['mode']->value == 'view') {?>
        <td align="left">
            <input class="button" type="submit" name="cancel" value="<?php echo $_smarty_tpl->tpl_vars['CANCEL']->value;?>
">
        </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?>
        <td align="left">
            <input class="button" type="submit" name="save_new" value="<?php echo $_smarty_tpl->tpl_vars['SAVE']->value;?>
">&nbsp;&nbsp;
            <input class="button" type="submit" name="cancel" value="<?php echo $_smarty_tpl->tpl_vars['CANCEL']->value;?>
">&nbsp;&nbsp;
            <?php echo $_smarty_tpl->tpl_vars['BOOKING']->value;?>
&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?><b><div align="center"><h1><?php echo $_smarty_tpl->tpl_vars['booking_mode']->value;?>
</h1></b></div><?php }?>
         </td>
        <?php }?>
        <td align="right" nowrap><span class="letra12"><span  class="required">*</span> <?php echo $_smarty_tpl->tpl_vars['REQUIRED_FIELD']->value;?>
</span></td>
    </tr>
</table>
			<div class='myDialog'>
				<div class='myProgressBar'> </div>
			</div>

<table border=0>
	<tr align="left">
		<td>
			<table class="tabForm" style="font-size: 16px; border-bottom: 0px" width="100%">
    				<tr class="letra12" align = "left" >
        				<td align="right" width="150"><b><?php echo $_smarty_tpl->tpl_vars['date']->value['LABEL'];?>
 : </b></td>
        				<td align="left"  width="150"><?php echo $_smarty_tpl->tpl_vars['date']->value['INPUT'];?>
 <span  class="required">*</span></b></td>

        				<td align="right" width="150"><b><?php echo $_smarty_tpl->tpl_vars['date_co']->value['LABEL'];?>
 : </b></td>
        				<td align="left" ><?php echo $_smarty_tpl->tpl_vars['date_co']->value['INPUT'];?>
 <span  class="required">*</span></b></td>
    				</tr>
    				<tr class="letra12">
        				<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['room']->value['LABEL'];?>
 : </td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['room']->value['INPUT'];?>
 </b></td>

        				<td align="right" valign="top"><?php echo $_smarty_tpl->tpl_vars['num_guest']->value['INPUT'];?>
<b>: </b></td>
        				<td align="left" valign="center"><b><?php echo $_smarty_tpl->tpl_vars['num_guest']->value['LABEL'];?>
 </b></td>
					</tr>
    				<tr class="letra12">
        				<td align="right" valign="top"><b><?php echo $_smarty_tpl->tpl_vars['last_name']->value['LABEL'];?>
 : </b></td>
        				<td align="left" valign="top"><div><?php echo $_smarty_tpl->tpl_vars['last_name']->value['INPUT'];?>
 <span  class="required">*</span></div>
			   			<div class="suggestionsBox" id="suggestions" style="display: none;">
			   			<img src="<?php echo $_smarty_tpl->tpl_vars['SRCIMG']->value;?>
/upArrow.png" style="position: relative; top: -12px; left: 10px;" alt="upArrow" />
                        			<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
                        		</div></td>

        				<td align="right" valign="top"><b><?php echo $_smarty_tpl->tpl_vars['first_name']->value['LABEL'];?>
 : </b></td>
        				<td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['first_name']->value['INPUT'];?>
 <span  class="required">*</span></td>
    				</tr>
    				<tr class="letra12">
        				<td align="right"><?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?><b><?php echo $_smarty_tpl->tpl_vars['payment_mode_b']->value['LABEL'];?>
 : </b><?php }?></td>
        				<td align="left"><?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {
echo $_smarty_tpl->tpl_vars['payment_mode_b']->value['INPUT'];?>
 <span  class="required">*</span><?php }?></td>

        				<td align="right"><?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {?><b><?php echo $_smarty_tpl->tpl_vars['money_advance']->value['LABEL'];?>
 : </b><?php }?></td>
        				<td align="left"><?php if ($_smarty_tpl->tpl_vars['mode']->value == 'edit') {
echo $_smarty_tpl->tpl_vars['money_advance']->value['INPUT'];?>
 <span  class="required">*</span><?php }?></td>
    				</tr>
    				<tr class="letra12">
        				<td align="right" valign="top" width="107"><b><?php echo $_smarty_tpl->tpl_vars['address']->value['LABEL'];?>
 : </b></td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['address']->value['INPUT'];?>
</td>

        				<td align="left"valign="top"> </td>
        				<td align="left"valign="top"> </td>
    				</tr>
    				<tr class="letra12">
        				<td align="right" width="107"><b><?php echo $_smarty_tpl->tpl_vars['cp']->value['LABEL'];?>
 : </b></td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['cp']->value['INPUT'];?>
</td>
        				
					<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['city']->value['LABEL'];?>
 : </b></td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['city']->value['INPUT'];?>
</td>
    				</tr>
    				<tr class="letra12">
        				<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['phone']->value['LABEL'];?>
 : </b></td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['phone']->value['INPUT'];?>
</td>
    
					<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['mobile']->value['LABEL'];?>
 : </b></td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['mobile']->value['INPUT'];?>
</td>
    				</tr>
    				<tr class="letra12">
        				<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['mail']->value['LABEL'];?>
 : </b></td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['mail']->value['INPUT'];?>
</td>

					<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['fax']->value['LABEL'];?>
 : </td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['fax']->value['INPUT'];?>
</td>
    				</tr>
    				<tr class="letra12">
        				<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['NIF']->value['LABEL'];?>
 : </b></td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['NIF']->value['INPUT'];?>
 <span  class="required">*</span></td>

					<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['Off_Doc']->value['LABEL'];?>
 : </td>
        				<td align="left"><?php echo $_smarty_tpl->tpl_vars['Off_Doc']->value['INPUT'];?>
 <span  class="required">*</span></td>
    				</tr>
    				<tr class="letra12">
        				<td align="right"><div style='display:none;'><?php echo $_smarty_tpl->tpl_vars['booking']->value['INPUT'];?>
</div></td>
        				<td align="left"></td>
        
					<td align="right"> </td>
        				<td align="left"> </td>
    				</tr>
			</table>
		</td>
		<td valign="top">
			<?php echo $_smarty_tpl->tpl_vars['checkin_img']->value;?>

		</td>
	</tr>
</table>
<br><br><br>
<input class="button" type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" /><?php }
}
