<?php /* Smarty version Smarty-3.1.7, created on 2019-05-02 14:48:58
         compiled from "/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Vtiger/Tag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4764088225ccad92a6c02d3-71834321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4b03b59966c4c9f95eb0b385f3ffc557b32e512' => 
    array (
      0 => '/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Vtiger/Tag.tpl',
      1 => 1508495595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4764088225ccad92a6c02d3-71834321',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIVE' => 0,
    'TAG_MODEL' => 0,
    'NO_EDIT' => 0,
    'NO_DELETE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5ccad92a701c2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccad92a701c2')) {function content_5ccad92a701c2($_smarty_tpl) {?>
 
 <span class="tag <?php if ($_smarty_tpl->tpl_vars['ACTIVE']->value==true){?> active <?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['TAG_MODEL']->value->getName();?>
" data-type="<?php echo $_smarty_tpl->tpl_vars['TAG_MODEL']->value->getType();?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['TAG_MODEL']->value->getId();?>
">
    <i class="activeToggleIcon fa <?php if ($_smarty_tpl->tpl_vars['ACTIVE']->value==true){?> fa-circle-o <?php }else{ ?> fa-circle <?php }?>"></i>
    <span class="tagLabel display-inline-block textOverflowEllipsis" title="<?php echo $_smarty_tpl->tpl_vars['TAG_MODEL']->value->getName();?>
"><?php echo $_smarty_tpl->tpl_vars['TAG_MODEL']->value->getName();?>
</span>
    <?php if (!$_smarty_tpl->tpl_vars['NO_EDIT']->value){?>
        <i class="editTag fa fa-pencil"></i>
    <?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['NO_DELETE']->value){?>
        <i class="deleteTag fa fa-times"></i>
    <?php }?>
</span><?php }} ?>