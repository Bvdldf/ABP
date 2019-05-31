<?php

/***********************************************************************************
 * The contents of this file are course_id to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: PE Sokolko S.N. 
 * The Initial Developer of the Original Code is PE Sokolko S.N.
 * All Rights Reserved.
 * If you have any questions or comments, please email: s.sokolko@gmail.com
 ************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class Lessons extends Vtiger_CRMEntity { 
        var $table_name = 'vtiger_lessons';
        var $table_index= 'lessonsid';

        var $customFieldTable = Array('vtiger_lessonscf', 'lessonsid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_lessons', 'vtiger_lessonscf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_lessons' => 'lessonsid',
                'vtiger_lessonscf'=>'lessonsid');
        
	var $entity_table = "vtiger_crmentity";

        var $list_fields = Array (
	    'Lesson date' => Array('vtiger_lessons', 'lesson_date'),
	    'Course' => Array('vtiger_lessons', 'course_id'),
            'Lesson type' => Array('vtiger_lessons', 'lesson_type'),
            'Lesson hours' => Array('vtiger_lessons', 'lesson_hours'),
            'Lesson topic' => Array('vtiger_lessons', 'lesson_topic'),
        );
        var $list_fields_name = Array (
            'Lesson date' => 'lesson_date',
	    'Course' => 'course_id',
            'Lesson type' => 'lesson_type',
            'Lesson hours' => 'lesson_hours',
            'Lesson topic' => 'lesson_topic',
        );


        var $list_link_field = 'lesson_date'; 

        var $search_fields = Array(
            'Lesson date' => Array('lessons', 'lesson_date'),
	    'Course' => Array('lessons', 'course_id'), 
            'Lesson type' => Array('lessons', 'lesson_type'),
            'Lesson hours' => Array('lessons', 'lesson_hours'),
            'Lesson topic' => Array('lessons', 'lesson_topic'),
        );
        var $search_fields_name = Array (
            'Lesson date' => 'lesson_date',
	    'Course' => 'course_id', 
            'Lesson type' => 'lesson_type',
            'Lesson hours' => 'lesson_hours',
            'Lesson topic' => 'lesson_topic',
        );


        var $popup_fields = Array ('lesson_date');


        var $def_basicsearch_col = 'lesson_date';


        var $def_detailview_recname = 'lesson_date';


        var $mandatory_fields = Array('lesson_date');

        var $default_order_by = 'lesson_date';
        var $default_sort_order='ASC';
        
}