<?php

class Brainup_Cielo_LoginController extends Mage_Core_Controller_Front_Action
{
	
	public function oauthAction()
	{
		$session  = Mage::getSingleton('core/session');
		$request  = $this->getRequest();
		$oauthkey = $request->getPost('oauthkey');
		$customer = Mage::getModel("customer/customer");

		
		//Step 1 -  check presence  params oauthkey
		if( !$request->isPost() || empty(oauthkey) ) return;

		//Step 2 -  check oauthkey is valid 
		$customer_name = 'Ben Rainir';
		$customer_email = 'benrainir@gmail.com';

		//Step 3 -  check if user exist in magento database
		$customersByEmail = $customer->getCollection()->addFieldToFilter('email', $customer_email);

		//Step 4 -  create or load user data
		$customer = Mage::getModel('customer/customer');
        $customer->website_id = Mage::app()->getWebsite()->getId();
        $customer->setStore(Mage::app()->getStore());
        $customer->loadByEmail($customer_email);
        $customer->addData($customerData);
        $customer->save();

		//Ster 5 -  manually login user in magento
		$session = Mage::getSingleton('customer/session');
		$session->loginById($customer_id);
	}

}