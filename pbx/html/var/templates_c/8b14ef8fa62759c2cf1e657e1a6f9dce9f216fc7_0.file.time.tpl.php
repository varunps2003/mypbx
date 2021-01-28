<?php
/* Smarty version 3.1.33, created on 2021-01-27 21:05:45
  from '/var/www/html/modules/time_config/themes/default/time.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011d5a9f27d68_03313052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b14ef8fa62759c2cf1e657e1a6f9dce9f216fc7' => 
    array (
      0 => '/var/www/html/modules/time_config/themes/default/time.tpl',
      1 => 1590155778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011d5a9f27d68_03313052 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/usr/share/php/Smarty/plugins/function.html_select_time.php','function'=>'smarty_function_html_select_time',),1=>array('file'=>'/usr/share/php/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
echo '<script'; ?>
 type="text/javascript">
 
var serv_date2 = new Date(<?php echo $_smarty_tpl->tpl_vars['CURRENT_DATETIME']->value;?>
);
var browser_date = new Date();
var serv_msecdiff = browser_date.getTime() - serv_date2.getTime();
<?php echo '</script'; ?>
>


<form action="#" method="POST">
<table width="99%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
  <td>
    <table width="100%" cellpadding="4" cellspacing="0" border="0">
      <tr>
            <td align='left'><input class="button" type="submit" name="Actualizar" value="<?php echo $_smarty_tpl->tpl_vars['INDEX_ACTUALIZAR']->value;?>
" onClick="return confirm('<?php echo $_smarty_tpl->tpl_vars['TIME_MSG_1']->value;?>
');" /></td>
          </tr>
     </table>
</td>
</tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabForm">

          <tr> 
            <td width="15%"><b><?php echo $_smarty_tpl->tpl_vars['INDEX_HORA_SERVIDOR']->value;?>
:</b></td>
            <td><span id="SERVER_TIME" align='right'></span></td>
          </tr>
          <tr>
            <td width="15%"><b><?php echo $_smarty_tpl->tpl_vars['TIME_NUEVA_FECHA']->value;?>
:</b></td>
            <td><input type="text" name="date" id="datepicker" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_DATE']->value;?>
" style = "width: 10em; color: rgb(136, 68, 0); background-color: rgb(250, 250, 250); border: 1px solid rgb(153, 153, 153); text-align: center;" READONLY>
          </tr>
          <tr>
            <td width="15%"><b><?php echo $_smarty_tpl->tpl_vars['TIME_NUEVA_HORA']->value;?>
:</b></td>
            <td><?php echo smarty_function_html_select_time(array('prefix'=>"ServerDate_"),$_smarty_tpl);?>

            </td>
          </tr>
          <tr>
            <td width="15%"><b><?php echo $_smarty_tpl->tpl_vars['TIME_NUEVA_ZONA']->value;?>
:</b></td>
            <td><?php echo smarty_function_html_options(array('name'=>"TimeZone",'selected'=>$_smarty_tpl->tpl_vars['ZONA_ACTUAL']->value,'values'=>$_smarty_tpl->tpl_vars['LISTA_ZONAS']->value,'output'=>$_smarty_tpl->tpl_vars['LISTA_ZONAS']->value),$_smarty_tpl);?>

            </td>
          </tr>

        </table>
    </td>
  </tr>
  </table>
  <input type='hidden' name='configurar_hora' id='configurar_hora' value='0' />
</form>
<?php }
}
