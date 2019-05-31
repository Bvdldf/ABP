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

class Orders extends Vtiger_CRMEntity { 
        var $table_name = 'vtiger_orders';
        var $table_index= 'ordersid'; 

        var $customFieldTable = Array('vtiger_orderscf', 'ordersid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_orders', 'vtiger_orderscf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_orders' => 'ordersid',
                'vtiger_orderscf'=>'ordersid');
        
	var $entity_table = "vtiger_crmentity";

        var $list_fields = Array (
	    'Order type' => Array('vtiger_orders', 'order_type'),
	    'Order date' => Array('vtiger_orders', 'order_date'),
            'Order number' => Array('vtiger_orders', 'order_no'),
//	    'Group number' => Array('vtiger_orders', 'studentgroup_id'),
            'Curator' => Array('vtiger_orders', 'curator_id'),
	    'Certification type' => Array('vtiger_orders', 'certification_type'),
            'Program' => Array('vtiger_orders', 'program'),
            'Start date' => Array('vtiger_orders', 'start_date'),
            'End date' => Array('vtiger_orders', 'end_date'),
        );
        var $list_fields_name = Array (
            'Order type' => 'order_type',
	    'Order date' => 'order_date',
            'Order number' => 'order_no',
//	    'Group number' => 'studentgroup_id',
            'Curator' => 'curator_id',
	    'Certification type' => 'certification_type',
            'Program' => 'program',
            'Start date' => 'start_date',
            'End date' => 'end_date',
        );


        var $list_link_field = 'ordertype';

        var $search_fields = Array(
            'Order type' => Array('orders', 'order_type'),
	    'Order date' => Array('orders', 'order_date'),
            'Order number' => Array('orders', 'order_no'),
//	    'Group number' => Array('orders', 'studentgroup_id'),
            'Curator' => Array('orders', 'curator_id'),
	    'Certification type' => Array('orders', 'certification_type'),
            'Program' => Array('orders', 'program'),
            'Start date' => Array('orders', 'start_date'),
            'End date' => Array('orders', 'end_date'),
        );
        var $search_fields_name = Array (
            'Order type' => 'order_type',
	    'Order date' => 'order_date',
            'Order number' => 'order_no',
//	    'Group number' => 'studentgroup_id',
            'Curator' => 'curator_id',
	    'Certification type' => 'certification_type',
            'Program' => 'program',
            'Start date' => 'start_date',
            'End date' => 'end_date',
        );


        var $popup_fields = Array ('order_type');


        var $def_basicsearch_col = 'order_type';


        var $def_detailview_recname = 'order_type';


        var $mandatory_fields = Array('order_type');

        var $default_order_by = 'order_type';
        var $default_sort_order='ASC';
        
}