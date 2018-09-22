<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_UiForm
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Hmu\Api\Controller\Adminhtml\Hmu;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
 
class Save extends Action
{
    /**
     * @param Action\Context $context
     * @param \Hmu\Api\Model\HmuFactory $hmu
     */
    public function __construct(
        Action\Context $context,
        \Hmu\Api\Model\HmuFactory $hmu
    ) {
        $this->_hmu = $hmu;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if (!$this->getRequest()->isPost()) {
            $this->messageManager->addError(__("Something went wrong"));
            return $resultRedirect->setPath('*/*/');
        }
        $data = $this->getRequest()->getPostValue();
        $id = (int) $this->getRequest()->getParam("id");
        if ($id > 0) {
            $this->_hmu->create()->addData($data)->setId($id)->save();
        } else {
            $this->_hmu->create()->setData($data)->save();
        }
        $this->messageManager->addSuccess(__('Data saved succesfully'));
        return $resultRedirect->setPath('*/*/');
    }
}