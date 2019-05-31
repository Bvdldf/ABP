<?php /* Smarty version Smarty-3.1.7, created on 2019-05-02 14:44:42
         compiled from "/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Vtiger/Footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6079094015ccad82a4969b7-65585781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2fcfabf85abdb198710192d7877a4d9c70b9c51' => 
    array (
      0 => '/var/www/html/vtigercrm/includes/runtime/../../layouts/v7/modules/Vtiger/Footer.tpl',
      1 => 1508495595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6079094015ccad82a4969b7-65585781',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'VTIGER_VERSION' => 0,
    'LANGUAGE_STRINGS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5ccad82a4ed96',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccad82a4ed96')) {function content_5ccad82a4ed96($_smarty_tpl) {?>

<footer class="app-footer">
        
        <div class="pull-right footer-icons">
            <small><?php echo vtranslate('LBL_CONNECT_WITH_US',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</small>
            <a href="http://community.salesplatform.ru/"><img src="layouts/vlayout/skins/images/forum.png"></a>
            &nbsp;<a href="https://twitter.com/salesplatformru"><img src="layouts/vlayout/skins/images/twitter.png"></a>
        </div>
        
	<p>
		
                
                
                
                
            <?php echo vtranslate('POWEREDBY');?>
 <?php echo $_smarty_tpl->tpl_vars['VTIGER_VERSION']->value;?>
 &nbsp;
            &copy; 2004 - <?php echo date('Y');?>
&nbsp&nbsp;
            <a href="//www.vtiger.com" target="_blank">vtiger.com</a>
            &nbsp;|&nbsp;
            
            &copy; 2011 - <?php echo date('Y');?>
&nbsp&nbsp;
            <a href="//salesplatform.ru/" target="_blank">SalesPlatform.ru</a>
            
	</p>
</footer>
</div>
<div id='overlayPage'>
	<!-- arrow is added to point arrow to the clicked element (Ex:- TaskManagement), 
	any one can use this by adding "show" class to it -->
	<div class='arrow'></div>
	<div class='data'>
	</div>
</div>
<div id='helpPageOverlay'></div>
<div id="js_strings" class="hide noprint"><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div>
<div class="modal myModal fade"></div>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>

</html><?php }} ?>