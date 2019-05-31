<?php /* Smarty version Smarty-3.1.7, created on 2019-05-02 14:48:58
         compiled from "/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Vtiger/ModalHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8064974625ccad92a6b4819-42325580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20fbb5a6e449bf0d17d7d5a45ef6367f8f8a05e4' => 
    array (
      0 => '/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Vtiger/ModalHeader.tpl',
      1 => 1508495595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8064974625ccad92a6b4819-42325580',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5ccad92a6bd4b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccad92a6bd4b')) {function content_5ccad92a6bd4b($_smarty_tpl) {?>
<div class="modal-header"><div class="clearfix"><div class="pull-right " ><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div><h4 class="pull-left"><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</h4></div></div>    <?php }} ?>