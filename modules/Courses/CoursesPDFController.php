<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

include_once 'include/InventoryPDFController.php';

class Vtiger_CoursesPDFController extends Vtiger_InventoryPDFController{
	function buildHeaderModelTitle() {
		$singularModuleNameKey = 'SINGLE_'.$this->moduleName;
		$translatedSingularModuleLabel = getTranslatedString($singularModuleNameKey, $this->moduleName);
		if($translatedSingularModuleLabel == $singularModuleNameKey) {
			$translatedSingularModuleLabel = getTranslatedString($this->moduleName, $this->moduleName);
		}
		return sprintf("%s: %s", $translatedSingularModuleLabel, $this->focusColumnValue('invoice_no'));
	}

	function buildHeaderModelColumnCenter() {
		$customerName = $this->resolveReferenceLabel($this->focusColumnValue('account_id'), 'Accounts');
		$contactName = $this->resolveReferenceLabel($this->focusColumnValue('contact_id'), 'Contacts');
		$purchaseOrder = $this->focusColumnValue('vtiger_purchaseorder');
		$salesOrder	= $this->resolveReferenceLabel($this->focusColumnValue('salesorder_id'));

		$customerNameLabel = getTranslatedString('Customer Name', $this->moduleName);
		$contactNameLabel = getTranslatedString('Contact Name', $this->moduleName);
		$purchaseOrderLabel = getTranslatedString('Purchase Order', $this->moduleName);
		$salesOrderLabel = getTranslatedString('Sales Order', $this->moduleName);

		$modelColumnCenter = array(
				$customerNameLabel	=>	$customerName,
				$purchaseOrderLabel =>	$purchaseOrder,
				$contactNameLabel	=>	$contactName,
				$salesOrderLabel	=>	$salesOrder
			);
		return $modelColumnCenter;
	}

	function buildHeaderModelColumnRight() {
		$issueDateLabel = getTranslatedString('Issued Date', $this->moduleName);
		$validDateLabel = getTranslatedString('Due Date', $this->moduleName);
		$billingAddressLabel = getTranslatedString('Billing Address', $this->moduleName);
		$shippingAddressLabel = getTranslatedString('Shipping Address', $this->moduleName);

		$modelColumnRight = array(
				'dates' => array(
					$issueDateLabel  => $this->formatDate(date("Y-m-d")),
					$validDateLabel => $this->formatDate($this->focusColumnValue('duedate')),
				),
				$billingAddressLabel  => $this->buildHeaderBillingAddress(),
				$shippingAddressLabel => $this->buildHeaderShippingAddress()
			);
		return $modelColumnRight;
	}

	function getWatermarkContent() {
		return $this->focusColumnValue('invoicestatus');
	}
}

//SalesPlatform.ru begin add SP PDF controller

include_once 'includes/SalesPlatform/PDF/ProductListPDFController.php';
require_once 'modules/SalesOrder/SalesOrder.php';
require_once 'modules/Accounts/Accounts.php';
require_once 'modules/Contacts/Contacts.php';

class SalesPlatform_CoursesPDFController extends SalesPlatform_PDF_ProductListDocumentPDFController{
    
    function buildCuratorsFIO($curator_id){
        $curatorInstance = Users_Record_Model::getInstanceById($curator_id, 'Users');
        return $curatorInstance->get('last_name') . ' ' . $curatorInstance->get('first_name');
    }
    
    function buildAudience($order_id) {
	    $TEMPLATE_FILE = "modules/Orders/templates/audience.tpl";
	    $smarty = new Smarty;    
	    $items = $this->getAudience($order_id);
	    $smarty->assign("items", $items);
	    return $smarty->fetch($TEMPLATE_FILE);
    }
    
    function getCommission($protocol_id){
        global $adb;
        
        $query = 'select u.id from vtiger_crmentityrel cer inner join vtiger_users u on u.id=cer.relcrmid  where crmid=? and module=? and relmodule=?';
        
        $result = $adb->pquery($query, Array($protocol_id, 'Protocols', 'Users'));
        
        $items = Array();
        
        while ($row = $adb->fetchByAssoc($result)) {
            $items[] = $row['id'];
        }
        
        return Vtiger_Record_Model::getInstancesFromIds($items, 'Users');
    }
    
    function getItems($course_id){
        global $adb;
        
        $query = 'select cd.contactid from vtiger_contactdetails cd where cd.contactid in (select relcrmid from vtiger_crmentityrel cer where module=? and relmodule=? and crmid=(select studentgroup_id from vtiger_courses where coursesid=?))';
        
        $result = $adb->pquery($query, Array('StudentGroups', 'Contacts', $course_id));
        
        $items = Array();
        
        while ($row = $adb->fetchByAssoc($result)) {
            $items[] = $row['contactid'];
        }
        
        return Vtiger_Record_Model::getInstancesFromIds($items, 'Contacts');
    }
    
    function getLessons($course_id){
        global $adb;
        
        $query = 'select l.lessonsid from vtiger_lessons l where l.course_id=? order by lesson_date';
        
        $result = $adb->pquery($query, Array($course_id));
        
        $items = Array();
        
        while ($row = $adb->fetchByAssoc($result)) {
            $items[] = $row['lessonsid'];
        }
        
        return Vtiger_Record_Model::getInstancesFromIds($items, 'Lessons');
    }
    
    function getExams($course_id){
        global $adb;
        
        $query = 'select e.examsid from vtiger_exams e where e.course_id=?';
        
        $result = $adb->pquery($query, Array($course_id));
        
        $items = Array();
        
        while ($row = $adb->fetchByAssoc($result)) {
            $items[] = $row['examsid'];
        }
        
        return Vtiger_Record_Model::getInstancesFromIds($items, 'Exams');
    }
    
    function getSendedDown($order_id){
        global $adb;
        
        $query = 'select cd.contactid from vtiger_crmentityrel cer inner join vtiger_contactdetails cd on cd.contactid=cer.relcrmid where crmid=? and module=? and relmodule=? limit 1';
        
        $result = $adb->pquery($query, Array($order_id, 'Orders', 'Contacts'));
        
        $items = Array();
        
        while ($row = $adb->fetchByAssoc($result)) {
            $items[] = Vtiger_Record_Model::getInstanceById($row['contactid'], 'Contacts');
        }
        
        return ($items ? $items[0] : null);
    }
    
    function getGroupNo($order_id){
        global $adb;
        
        $query = 'select group_no from vtiger_studentgroups where order_id=? limit 1';
        
        $result = $adb->pquery($query, Array($order_id));
        
        $items = Array();
        
        while ($row = $adb->fetchByAssoc($result)) {
            $items[] = $row['group_no'];
        }
        
        return $items[0];
    }
    
    function buildBody(){
        $TEMPLATE_FILE = "modules/Orders/templates/body.tpl";
        $smarty = new Smarty;
        return $smarty->fetch($TEMPLATE_FILE);
    }

    function buildDocumentModel() {
        global $app_strings;

        try {
            $model = parent::buildDocumentModel();
            
            $this->generateEntityModel($this->focus, 'Courses', 'courses_', $model);

            $entity = new Courses();
            $entity->retrieve_entity_info($this->focus->id, 'Courses');
            if(!empty($entity)) {
                $TEMPLATE_BODY = "modules/Courses/templates/body.tpl";
                $smarty = new Smarty;
                $smarty->assign('orgName', $model->get('orgName'));
                $smarty->assign('orgName_short', 'АНО ДПО «Сибирский учебный центр СПАС»');
                $smarty->assign('teacher', Vtiger_Record_Model::getInstanceById($entity->column_fields['teacher'], 'Users'));
                $smarty->assign('subject', $entity->column_fields['subject']);
                $smarty->assign('items', $this->getItems($this->focus->id));
                $smarty->assign('lessons', $this->getLessons($this->focus->id));
                $smarty->assign('exams', $this->getExams($this->focus->id));
                $model->set('body', $smarty->fetch($TEMPLATE_BODY));
            }
            
            return $model;

        } catch (Exception $e) {
            echo '<meta charset="utf-8" />';
            if($e->getMessage() == $app_strings['LBL_RECORD_DELETE']) {
                echo $app_strings['LBL_RECORD_INCORRECT'];
                echo '<br><br>';
            } else {
                echo $e->getMessage();
                echo '<br><br>';
            }
            return null;
        }
    }

    function getWatermarkContent() {
        return '';
    }

    function russianDate($date){
        $date=explode("-", $date);
        switch ($date[1]){
            case 1: $m='Января'; break;
            case 2: $m='Февраля'; break;
            case 3: $m='Марта'; break;
            case 4: $m='Апреля'; break;
            case 5: $m='Мая'; break;
            case 6: $m='Июня'; break;
            case 7: $m='Июля'; break;
            case 8: $m='Августа'; break;
            case 9: $m='Сентября'; break;
            case 10: $m='Октября'; break;
            case 11: $m='Ноября'; break;
            case 12: $m='Декабря'; break;
        }

        return $date[2].' '.$m.' '.$date[0].' г.';
    }
}

//SalesPlatform.ru end
?>
