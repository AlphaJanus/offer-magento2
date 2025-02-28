<?php
/**
 * Created by PhpStorm.
 * User: hosein
 * Date: 2019-02-05
 * Time: 17:50
 */

namespace Cartshare\Offer\Model\ResourceModel\OfferItem;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Cartshare\Offer\Model\OfferItem', '\Cartshare\Offer\Model\ResourceModel\OfferItem');
    }
}
