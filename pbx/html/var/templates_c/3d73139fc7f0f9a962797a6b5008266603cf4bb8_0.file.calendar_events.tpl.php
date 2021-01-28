<?php
/* Smarty version 3.1.33, created on 2021-01-27 20:47:41
  from '/var/www/html/modules/dashboard/applets/Calendar/tpl/calendar_events.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011d16ddf5267_82478239',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d73139fc7f0f9a962797a6b5008266603cf4bb8' => 
    array (
      0 => '/var/www/html/modules/dashboard/applets/Calendar/tpl/calendar_events.tpl',
      1 => 1590155778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011d16ddf5267_82478239 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EVENTOS_DIAS']->value, 'evento');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['evento']->value) {
?>
<a href='?menu=calendar&amp;action=display&amp;id=<?php echo $_smarty_tpl->tpl_vars['evento']->value['id'];?>
&amp;event_date=<?php echo $_smarty_tpl->tpl_vars['evento']->value['dateshort'];?>
'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['evento']->value['subject'], ENT_QUOTES, 'UTF-8', true);?>
</a>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['tag_date']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['evento']->value['date'];?>
 - <?php echo $_smarty_tpl->tpl_vars['tag_call']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['evento']->value['call'];?>
<br/>
<?php
}
} else {
?>
<p><?php echo $_smarty_tpl->tpl_vars['NO_EVENTOS']->value;?>
</p>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
