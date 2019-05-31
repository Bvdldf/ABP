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

class Exams extends Vtiger_CRMEntity { 
        var $table_name = 'vtiger_exams';
        var $table_index= 'examsid';

        var $customFieldTable = Array('vtiger_examscf', 'examsid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_exams', 'vtiger_examscf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_exams' => 'examsid',
                'vtiger_examscf'=>'examsid');
        
	var $entity_table = "vtiger_crmentity";

        var $list_fields = Array (
	    'Contact' => Array('vtiger_exams', 'contact_id'),
	    'Course' => Array('vtiger_exams', 'course_id'),
            'Ticket number' => Array('vtiger_exams', 'ticket_no'),
            'Grade' =>  Array('vtiger_exams', 'grade'),
        );
        var $list_fields_name = Array (
            'Contact' => 'contact_id',
	    'Course' => 'course_id',
            'Ticket number' => 'ticket_no',
            'Grade' =>  'grade',
        );


        var $list_link_field = 'contact_id';

        var $search_fields = Array(
            'Contact' => Array('exams', 'contact_id'),
	    'Course' => Array('exams', 'course_id'),
            'Ticket number' => Array('exams', 'ticket_no'),
            'Grade' =>  Array('exams', 'grade'),
        );
        var $search_fields_name = Array (
            'Contact' => 'contact_id',
	    'Course' => 'course_id',
            'Ticket number' => 'ticket_no',
        );


        var $popup_fields = Array ('contact_id');


        var $def_basicsearch_col = 'contact_id';


        var $def_detailview_recname = 'contact_id';


        var $mandatory_fields = Array('contact_id');

        var $default_order_by = 'contact_id';
        var $default_sort_order='ASC';
        
}