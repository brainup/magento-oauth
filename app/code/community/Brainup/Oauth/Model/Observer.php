<?php


class Brainup_Oauth_Model_Observer
{

    public function indexPreDispatch(Varien_Event_Observer $observer)
    {
        $controller = $observer->getEvent()->getControllerAction();

        $controllerName = $controller->getRequest()->getControllerName();
        $actionName = $controller->getRequest()->getActionName();
        $moduleName = $controller->getRequest()->getModuleName();

        if ($moduleName == 'xoauth' && $controllerName == 'index' && $actionName == 'login')
            return;
        if ($moduleName == 'cms' && $controllerName == 'index' && $actionName == 'noRoute')
            return;

        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
            $controller->norouteAction();
            return;
        }

    }
}