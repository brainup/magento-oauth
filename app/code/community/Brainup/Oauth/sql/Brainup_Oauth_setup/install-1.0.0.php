<?php

$installer = $this;
$attributeId  = array(
    'type' => 'text',
    'visible' => false,
    'required' => false,
    'user_defined' => 0,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'default' => '0',
    'used_in_forms' => array(
        'adminhtml_customer',
    ),
    'note' => 'Id Oauth.',
);

$attributeToken  = array(
    'type' => 'text',
    'visible' => false,
    'required' => false,
    'user_defined' => 0,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'default' => '0',
    'used_in_forms' => array(
        'adminhtml_customer',
    ),
    'note' => 'Id Oauth.',
);

$installer->addAttribute('customer', 'brainup_oauth_oid', $attributeId);
$installer->addAttribute('customer', 'brainup_oauth_otoken', $attributeToken);


$installer->endSetup();