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

class StudentGroups extends Vtiger_CRMEntity { 
        var $table_name = 'vtiger_studentgroups';
        var $table_index= 'studentgroupsid';

        var $customFieldTable = Array('vtiger_studentgroupscf', 'studentgroupsid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_studentgroups', 'vtiger_studentgroupscf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_studentgroups' => 'studentgroupsid',
                'vtiger_studentgroupscf'=>'studentgroupsid');
        
	var $entity_table = "vtiger_crmentity";

        var $list_fields = Array (
	    'Group Number' => Array('vtiger_studentgroups', 'group_no'),
	    'Order' => Array('vtiger_studentgroups', 'order_id'),
        );
        var $list_fields_name = Array (
            'Group Number' => 'group_no',
	    'Order' => 'order_id',
        );


        var $list_link_field = 'group_no';

        var $search_fields = Array(
            'Group Number' => Array('studentgroups', 'group_no'),
	    'Order' => Array('studentgroups', 'order_id'),
        );
        var $search_fields_name = Array (
            'Group Number' => 'group_no',
	    'Order' => 'order_id',
        );


        var $popup_fields = Array ('group_no');


        var $def_basicsearch_col = 'group_no';


        var $def_detailview_recname = 'group_no';


        var $mandatory_fields = Array('group_no');

        var $default_order_by = 'group_no';
        var $default_sort_order='ASC';
        
//        function get_contacts($id, $cur_tab_id, $rel_tab_id, $actions=false) {
//            global $log, $singlepane_view,$currentModule,$current_user;
//            $log->debug("Entering get_contacts(".$id.") method ...");
//            $this_module = $currentModule;
//
//    $related_module = vtlib_getModuleNameById($rel_tab_id);
//            require_once("modules/$related_module/$related_module.php");
//            $other = new $related_module();
//    vtlib_setup_modulevars($related_module, $other);
//            $singular_modname = vtlib_toSingular($related_module);
//
//            $parenttab = getParentTab();
//
//            if($singlepane_view == 'true')
//                    $returnset = '&return_module='.$this_module.'&return_action=DetailView&return_id='.$id;
//            else
//                    $returnset = '&return_module='.$this_module.'&return_action=CallRelatedList&return_id='.$id;
//
//            $button = '';
//
//            if($actions && getFieldVisibilityPermission($related_module, $current_user->id, 'account_id','readwrite') == '0') {
//                    if(is_string($actions)) $actions = explode(',', strtoupper($actions));
//                    if(in_array('SELECT', $actions) && isPermitted($related_module,4, '') == 'yes') {
//                            $button .= "<input title='".getTranslatedString('LBL_SELECT')." ". getTranslatedString($related_module). "' class='crmbutton small edit' type='button' onclick=\"return window.open('index.php?module=$related_module&return_module=$currentModule&action=Popup&popuptype=detailview&select=enable&form=EditView&form_submit=false&recordid=$id&parenttab=$parenttab','test','width=640,height=602,resizable=0,scrollbars=0');\" value='". getTranslatedString('LBL_SELECT'). " " . getTranslatedString($related_module) ."'>&nbsp;";
//                    }
//                    if(in_array('ADD', $actions) && isPermitted($related_module,1, '') == 'yes') {
//                            $button .= "<input title='".getTranslatedString('LBL_ADD_NEW'). " ". getTranslatedString($singular_modname) ."' class='crmbutton small create'" .
//                                    " onclick='this.form.action.value=\"EditView\";this.form.module.value=\"$related_module\"' type='submit' name='button'" .
//                                    " value='". getTranslatedString('LBL_ADD_NEW'). " " . getTranslatedString($singular_modname) ."'>&nbsp;";
//                    }
//            }
//
//            $userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
//                                                    'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
//            $query = "SELECT vtiger_contactdetails.*,
//                    vtiger_crmentity.crmid,
//                    vtiger_crmentity.smownerid,
//                    vtiger_account.accountname,
//                    case when (vtiger_users.user_name not like '') then $userNameSql else vtiger_groups.groupname end as user_name
//                    FROM vtiger_contactdetails
//                    INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_contactdetails.contactid
//                    LEFT JOIN vtiger_account ON vtiger_account.accountid = vtiger_contactdetails.accountid
//                    INNER JOIN vtiger_contactaddress ON vtiger_contactdetails.contactid = vtiger_contactaddress.contactaddressid
//                    INNER JOIN vtiger_contactsubdetails ON vtiger_contactdetails.contactid = vtiger_contactsubdetails.contactsubscriptionid
//                    INNER JOIN vtiger_customerdetails ON vtiger_contactdetails.contactid = vtiger_customerdetails.customerid
//                    INNER JOIN vtiger_contactscf ON vtiger_contactdetails.contactid = vtiger_contactscf.contactid
//                    LEFT JOIN vtiger_groups	ON vtiger_groups.groupid = vtiger_crmentity.smownerid
//                    LEFT JOIN vtiger_users ON vtiger_crmentity.smownerid = vtiger_users.id
//                    WHERE vtiger_crmentity.deleted = 0
//                    AND vtiger_contactdetails.studentgroup = ".$id;
//
//            $return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);
//
//            if($return_value == null) $return_value = Array();
//            $return_value['CUSTOM_BUTTON'] = $button;
//
//            $log->debug("Exiting get_contacts method ...");
//            return $return_value;
//        }
}