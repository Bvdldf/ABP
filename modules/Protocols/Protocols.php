<?php
 
/***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: PE Sokolko S.N. 
 * The Initial Developer of the Original Code is PE Sokolko S.N.
 * All Rights Reserved.
 * If you have any questions or comments, please email: s.sokolko@gmail.com
 ************************************************************************************/ 

include_once 'modules/Vtiger/CRMEntity.php';

class Protocols extends Vtiger_CRMEntity { 
        var $table_name = 'vtiger_protocols';
        var $table_index= 'protocolsid';

        var $customFieldTable = Array('vtiger_protocolscf', 'protocolsid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_protocols', 'vtiger_protocolscf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_protocols' => 'protocolsid',
                'vtiger_protocolscf'=>'protocolsid');
        
	var $entity_table = "vtiger_crmentity";

        var $list_fields = Array (
	    'Protocol number' => Array('vtiger_protocols', 'protocol_no'),
	    'Order' => Array('vtiger_protocols', 'order_id'),
            'Chairman' => Array('vtiger_protocols', 'chariman'),
        );
        var $list_fields_name = Array (
            'Protocol number' => 'protocol_no',
	    'Order' => 'order_id',
            'Chairman' => 'chairman',
        );


        var $list_link_field = 'protocol_no';

        var $search_fields = Array(
            'Protocol number' => Array('protocols', 'protocol_no'),
	    'Order' => Array('protocols', 'order_id'),
            'Chairman' => Array('protocols', 'chairman'),
        );
        var $search_fields_name = Array (
            'Protocol number' => 'protocol_no',
	    'Order' => 'order_id',
            'Chairman' => 'chairman',
        );


        var $popup_fields = Array ('protocol_no');


        var $def_basicsearch_col = 'protocol_no';


        var $def_detailview_recname = 'protocol_no';


        var $mandatory_fields = Array('protocol_no');

        var $default_order_by = 'protocol_no';
        var $default_sort_order='ASC';
        
        
        
        function get_related_list($id, $cur_tab_id, $rel_tab_id, $actions=false) {
		global $log, $singlepane_view,$currentModule,$current_user;
		$log->debug("Entering get_related_list(".$id.") method ...");
		$this_module = $currentModule;

		$related_module = vtlib_getModuleNameById($rel_tab_id);
		require_once("modules/$related_module/$related_module.php");
		$other = new $related_module();
		vtlib_setup_modulevars($related_module, $other);
		$singular_modname = vtlib_toSingular($related_module);

		$parenttab = getParentTab();

		if($singlepane_view == 'true')
			$returnset = '&return_module='.$this_module.'&return_action=DetailView&return_id='.$id;
		else
			$returnset = '&return_module='.$this_module.'&return_action=CallRelatedList&return_id='.$id;

		$button = '';
                
                $query = "select vtiger_users.*, vtiger_users.id as crmid from vtiger_users where vtiger_users.id in (select relcrmid from vtiger_crmentityrel where crmid=$id and module=(select name from vtiger_tab where tabid=$cur_tab_id) and relmodule=(select name from vtiger_tab where tabid=$rel_tab_id))";
                

		$return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);

		if($return_value == null) $return_value = Array();
		$return_value['CUSTOM_BUTTON'] = $button;

		$log->debug("Exiting get_related_list method ...");
		return $return_value;
	}
        
}