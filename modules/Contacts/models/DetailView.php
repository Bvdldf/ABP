<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

//Same as Accounts Detail View
class Contacts_DetailView_Model extends Accounts_DetailView_Model {
    
    /**
	 * Function to get the detail view links (links and widgets)
	 * @param <array> $linkParams - parameters which will be used to calicaulate the params
	 * @return <array> - array of link models in the format as below
	 *                   array('linktype'=>list of link models);
	 */
	public function getDetailViewLinks($linkParams) {
            
            $linkModelList = parent::getDetailViewLinks($linkParams);
            
            $sendCredentialsToEmail = array(
                        'linktype' => 'DETAILVIEW',
                        'linklabel' => 'LBL_CREDENTIALS_TO_EMAIL',
//                        'linkurl' => '#',
                        'linkurl'   => 'javascript:Vtiger_Detail_Js.triggerSendEmail("index.php?module='.$this->getModule()->getName().'&view=MassActionAjax&mode=showComposeEmailForm&step=step1","Emails");',
                        'linkicon' => ''
                    );
                    $linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($sendCredentialsToEmail);
            
            return $linkModelList;
        }
}
