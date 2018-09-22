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
namespace Hmu\Api\Model;

use Hmu\Api\Api\Data\HmuInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Hmu extends \Magento\Framework\Model\AbstractModel implements HmuInterface, IdentityInterface
{
    /**
     * No route page id
     */
    const NOROUTE_ENTITY_ID = 'no-route';

    /**
     * UiForm Hmu cache tag
     */
    const CACHE_TAG = 'hmu_api';

    /**
     * @var string
     */
    protected $_cacheTag = 'hmu_api';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'hmu_api';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Hmu\Api\Model\ResourceModel\Hmu');
    }

    /**
     * Load object data
     *
     * @param int|null $id
     * @param string $field
     * @return $this
     */
    public function load($id, $field = null)
    {
        if ($id === null) {
            return $this->noRouteHmu();
        }
        return parent::load($id, $field);
    }

    /**
     * Load No-Route Hmu
     *
     * @return \Hmu\Api\Model\Hmu
     */
    public function noRouteHmu()
    {
        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \Hmu\Api\Api\Data\HmuInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }
}
