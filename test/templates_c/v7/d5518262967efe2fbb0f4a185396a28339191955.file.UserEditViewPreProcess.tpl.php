<?php /* Smarty version Smarty-3.1.7, created on 2019-05-02 15:03:04
         compiled from "/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Users/UserEditViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10957028315ccadc78d05667-27636498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5518262967efe2fbb0f4a185396a28339191955' => 
    array (
      0 => '/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Users/UserEditViewPreProcess.tpl',
      1 => 1508495595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10957028315ccadc78d05667-27636498',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5ccadc78d6fbe',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccadc78d6fbe')) {function content_5ccadc78d6fbe($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['QUALIFIED_MODULE'] = new Smarty_variable('Settings:User', null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("SettingsMenuStart.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="bodyContents"><div class="mainContainer row-fluid"><?php }} ?>