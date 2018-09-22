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
namespace Hmu\Api\Api\Data;

interface HmuInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID    = 'id';
    /**#@-*/

    /**
    * Get ID
    *
    * @return int|null
    */
    public function getId();

    /**
    * Set ID
    *
    * @param int $id
    *
    * @return \Webkul\UiForm\Api\Data\HmuInterface
    */
    public function setId($id);
}
