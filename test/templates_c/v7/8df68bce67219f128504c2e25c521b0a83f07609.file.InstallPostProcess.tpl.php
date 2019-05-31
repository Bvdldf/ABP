<?php /* Smarty version Smarty-3.1.7, created on 2019-05-02 12:37:46
         compiled from "/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Install/InstallPostProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17418645145ccad68add6939-65362678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8df68bce67219f128504c2e25c521b0a83f07609' => 
    array (
      0 => '/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Install/InstallPostProcess.tpl',
      1 => 1508495595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17418645145ccad68add6939-65362678',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'VTIGER_VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5ccad68ade2f1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccad68ade2f1')) {function content_5ccad68ade2f1($_smarty_tpl) {?>

<br>
<center>
	<footer class="noprint">
		<div class="vtFooter">
			<p>
				<?php echo vtranslate('POWEREDBY');?>
 <?php echo $_smarty_tpl->tpl_vars['VTIGER_VERSION']->value;?>
&nbsp;
				&copy; 2004 - <?php echo date('Y');?>
&nbsp;
				<a href="//www.vtiger.com" target="_blank">vtiger.com</a>
                                
                                &nbsp;|&nbsp;
                                &copy; 2011 - <?php echo date('Y');?>
&nbsp&nbsp;
                                <a href="//salesplatform.ru/" target="_blank">SalesPlatform.ru</a>
                                
				&nbsp;|&nbsp;
				<a href="#" onclick="window.open('copyright.html', 'copyright', 'height=115,width=575').moveTo(210, 620)"><?php echo vtranslate('LBL_READ_LICENSE');?>
</a>
				&nbsp;|&nbsp;
				<a href="https://www.vtiger.com/privacy-policy" target="_blank"><?php echo vtranslate('LBL_PRIVACY_POLICY');?>
</a>
			</p>
		</div>
	</footer>
</center>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }} ?>