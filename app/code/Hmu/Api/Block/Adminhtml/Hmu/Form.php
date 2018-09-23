<?php
namespace Hmu\Api\Block\Adminhtml\Hmu;
use \Magento\Framework\View\Element\Template;
class Form extends \Magento\Backend\Block\Template
{


    public function getCustomData(){

        $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
        $result1 = $connection->fetchAll("SELECT * FROM hmu_api");

        return $result1;

    }

    /**
     * Get form key
     *
     * @return string
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}