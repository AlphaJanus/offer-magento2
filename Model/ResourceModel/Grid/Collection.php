<?php
/**
 * Created by PhpStorm.
 * User: hosein
 * Date: 2019-02-15
 * Time: 11:24
 */

namespace Cartshare\Offer\Model\ResourceModel\Grid;

use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface;
use Psr\Log\LoggerInterface;


/**
 * Class Collection
 * @package Cartshare\Offer\Model\ResourceModel\Grid
 */
class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    private $checkoutSession;

    /**
     * Collection constructor.
     * @param \Magento\Checkout\Model\Session $session
     * @param EntityFactory $entityFactory
     * @param LoggerInterface $logger
     * @param FetchStrategy $fetchStrategy
     * @param ManagerInterface $eventManager
     * @param string $mainTable
     * @param string $resourceModel
     * @param null $identifierName
     * @param null $connectionName
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function __construct(
        \Magento\Checkout\Model\Session $session,
        EntityFactory $entityFactory,
        LoggerInterface $logger,
        FetchStrategy $fetchStrategy,
        ManagerInterface $eventManager,
        $mainTable = 'offer_quote',
        $resourceModel = 'Cartshare\Offer\Model\ResourceModel\Offer',
        $identifierName = null,
        $connectionName = null
    )
    {
        $this->checkoutSession = $session;
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $mainTable,
            $resourceModel,
            $identifierName,
            $connectionName
        );
    }

    protected function _initSelect(){
        parent::_initSelect();
        $customerId = $this->checkoutSession->getQuote();
        $this->addFieldToFilter('customer_id', $customerId->getData('customer_id'));
        return $this;
    }
}
