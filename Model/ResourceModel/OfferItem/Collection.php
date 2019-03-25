<?php
/**
 * Created by PhpStorm.
 * User: hosein
 * Date: 2019-02-05
 * Time: 17:50
 */

namespace Netzexpert\Offer\Model\ResourceModel\OfferItem;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Netzexpert\Offer\Model\OfferItem', '\Netzexpert\Offer\Model\ResourceModel\OfferItem');
    }
}