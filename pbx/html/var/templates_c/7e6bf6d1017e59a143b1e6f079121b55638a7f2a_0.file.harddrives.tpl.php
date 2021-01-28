<?php
/* Smarty version 3.1.33, created on 2021-01-27 19:16:21
  from '/var/www/html/modules/dashboard/applets/HardDrives/tpl/harddrives.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6011bc05425f67_80694505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e6bf6d1017e59a143b1e6f079121b55638a7f2a' => 
    array (
      0 => '/var/www/html/modules/dashboard/applets/HardDrives/tpl/harddrives.tpl',
      1 => 1590155778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6011bc05425f67_80694505 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" media="screen" type="text/css" href="modules/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
/applets/HardDrives/tpl/css/styles.css" />
<?php echo '<script'; ?>
 type='text/javascript' src='modules/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
/applets/HardDrives/js/javascript.js'><?php echo '</script'; ?>
>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['part']->value, 'particion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['particion']->value) {
?>
<div>
    <div id="dashboard-applet-hd-usage" style="width:160px; height:160px;"></div>
    <?php echo '<script'; ?>
>
        
        var ram = new JustGage({
          id: "dashboard-applet-hd-usage", 
          value: <?php echo $_smarty_tpl->tpl_vars['particion']->value['porcentaje_usado'];?>
, 
          min: 0,
          max: 100,
          donut: true,
          startAnimationType : 'bounce',
          shadowSize: 0,
          shadowVerticalOffset: 0,
          valueFontColor: '#666666',
          levelColors : ['#3184d5'],
          gaugeColor : '#6e407e',
          label: "%"
        }); 
    <?php echo '</script'; ?>
>
    <div class="neo-applet-hd-innerbox">
      <div class="neo-applet-hd-innerbox-top">
       <img src="modules/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
/applets/HardDrives/images/light_usedspace.png" width="13" height="11" alt="used" /> <?php echo $_smarty_tpl->tpl_vars['particion']->value['formato_porcentaje_usado'];?>
% <?php echo $_smarty_tpl->tpl_vars['LABEL_PERCENT_USED']->value;?>
 &nbsp;&nbsp;<img src="modules/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
/applets/HardDrives/images/light_freespace.png" width="13" height="11" alt="used" /> <?php echo $_smarty_tpl->tpl_vars['particion']->value['formato_porcentaje_libre'];?>
% <?php echo $_smarty_tpl->tpl_vars['LABEL_PERCENT_AVAILABLE']->value;?>

      </div>
      <div class="neo-applet-hd-innerbox-bottom">
        <div><strong><?php echo $_smarty_tpl->tpl_vars['LABEL_DISK_CAPACITY']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['particion']->value['sTotalGB'];?>
GB</div>
        <div><strong><?php echo $_smarty_tpl->tpl_vars['LABEL_MOUNTPOINT']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['particion']->value['punto_montaje'];?>
</div>
        <div><strong><?php echo $_smarty_tpl->tpl_vars['LABEL_DISK_VENDOR']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['particion']->value['sModelo'];?>
</div>
      </div>
    </div>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<div class="neo-divisor"></div>
<div id="harddrives_dirspacereport">
<p><?php echo $_smarty_tpl->tpl_vars['TEXT_WARNING_DIRSPACEREPORT']->value;?>
</p>
<button class="submit" id="harddrives_dirspacereport_fetch" ><?php echo $_smarty_tpl->tpl_vars['FETCH_DIRSPACEREPORT']->value;?>
</button>
</div><?php }
}
