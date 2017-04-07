<?php

class Brainup_Oauth_IndexController extends Mage_Core_Controller_Front_Action
{
	
	public function loginAction()
	{
		$session  = Mage::getSingleton('core/session');
		$request  = $this->getRequest();

		$oauthkey = $request->getPost('key');
		$customer = Mage::getModel("customer/customer");
        $isAuthenticated = false;
        $isParamsValid = false;
		
		//MOCK -]Step 1 -  check presence  params oauthkey
        $isParamsValid = true; //(!$request->isPost() || empty($oauthkey));

		if( !$isParamsValid ) return; //TODO: redirect to 404 page

        //MOCK - Step 2 - check key
        $isAuthenticated = true;

        if (! $isAuthenticated) return; //TODO: redirect to 404 page

		//MOCK - Step 3 -  get user info by oauth
		$customer_name = 'Ben Rainir';
		$customer_email = 'benrainir@gmail.com';

		//Step 4 -  check if user exist in magento database
		$customersByEmail = $customer->getCollection()->addFieldToFilter('email', $customer_email)->getData();

		//Step 5 -  create or load user data
        if (empty($customersByEmail)) {
            $customer->setWebsiteId(Mage::app()->getWebsite()->getId());
            $customer->setStore(Mage::app()->getStore());
            $customer->setFirstname($customer_name);
            $customer->setLastname('');
            $customer->setEmail($customer_email);
            $customer->setPassword('somepassword');
            $customer->save();
        } else {
            $customer = Mage::getModel("customer/customer");
            $customer->setWebsiteId(Mage::app()->getWebsite()->getId());
            $customer->loadByEmail($customer_email);
        }

		//Step 6 -  manually login user in magento
		$session = Mage::getSingleton('customer/session');
		$session->loginById($customer->getId());

        //Step 7 - Redirect
        $this->_redirect('/index');
	}

}