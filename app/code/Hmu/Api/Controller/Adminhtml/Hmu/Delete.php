<?php
/*
 * SussexDev_Sample

 * @category   SussexDev
 * @package    SussexDev_Sample
 * @copyright  Copyright (c) 2018 Scott Parsons
 * @license    https://github.com/ScottParsons/module-sampleuicomponent/blob/master/LICENSE.md
 * @version    1.0.0
 */
namespace Hmu\Api\Controller\Adminhtml\Hmu;

use Hmu\Api\Controller\Adminhtml\Hmu;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use \Magento\Backend\App\Action;

class Delete extends Action
{
    /**
     * Delete the data entity
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */


    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
         $dataId = $this->getRequest()->getParam('id');
        if ($dataId) {
            try {
                $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
                    ->get('Magento\Framework\App\ResourceConnection');
                $connection= $this->_resources->getConnection();

                $themeTable = $this->_resources->getTableName('hmu_api');
                $sql = "DELETE FROM $themeTable WHERE id={$dataId}";
                // exit;
                $connection->query($sql);
                $this->messageManager->addSuccessMessage(__('The data has been deleted.'));
                $resultRedirect->setPath('hmuadmin/hmu/index');
                return $resultRedirect;
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('The data no longer exists.'));
                return $resultRedirect->setPath('hmuadmin/hmu/index');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('hmuadmin/hmu/index', ['id' => $dataId]);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('There was a problem deleting the data'));
                return $resultRedirect->setPath('hmuadmin/hmu/edit', ['id' => $dataId]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find the data to delete.'));
        $resultRedirect->setPath('hmuadmin/hmu/index');
        return $resultRedirect;
    }
}
