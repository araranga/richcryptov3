<?php
define('MAGENTO', realpath(dirname(__FILE__)));
require_once MAGENTO . '/app/Mage.php';
umask(0);
Mage::app();
try {    
    $user = Mage::getModel('admin/user')
        ->setData(array(
            'username'  => 'ardee',
            'firstname' => 'ardee',
            'lastname'  => 'ardee',
            'email'     => 'ardee@ardee.com',
            'password'  => 'password1',
            'is_active' => 1
        ))->save();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
# Assign New Role
try {
    $user->setRoleIds(array(1))
        ->setRoleUserId($user->getUserId())
        ->saveRelations();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
?>