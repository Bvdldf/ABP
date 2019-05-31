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

class Courses extends Vtiger_CRMEntity { 
        var $table_name = 'vtiger_courses';
        var $table_index= 'coursesid';

        var $customFieldTable = Array('vtiger_coursescf', 'coursesid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_courses', 'vtiger_coursescf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_courses' => 'coursesid',
                'vtiger_coursescf'=>'coursesid');
        
	var $entity_table = "vtiger_crmentity";

        var $list_fields = Array (
            'Course number' => Array('vtiger_courses', 'course_no'),
	    'Teacher' => Array('vtiger_courses', 'teacher'),
	    'Subject' => Array('vtiger_courses', 'subject'),
            'Group Number' => Array('vtiger_courses', 'studentgroup_id'),
        );
        var $list_fields_name = Array (
            'Course number' => 'course_no',
            'Teacher' => 'teacher',
	    'Subject' => 'subject',
            'Group Number' => 'studentgroup_id',
        );


        var $list_link_field = 'teacher';

        var $search_fields = Array(
            'Teacher' => Array('courses', 'teacher'),
	    'Subject' => Array('courses', 'subject'),
            'Group Number' => Array('courses', 'studentgroup_id'),
        );
        var $search_fields_name = Array (
            'Course number' => 'course_no',
            'Teacher' => 'teacher',
	    'Subject' => 'subject',
            'Group Number' => 'studentgroup_id',
        );


        var $popup_fields = Array ('course_no');


        var $def_basicsearch_col = 'course_no';


        var $def_detailview_recname = 'course_no';


        var $mandatory_fields = Array('course_no');

        var $default_order_by = 'course_no';
        var $default_sort_order='ASC';
        
}