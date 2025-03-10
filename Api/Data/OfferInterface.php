<?php
/**
 * Created by PhpStorm.
 * User: hosein
 * Date: 2019-01-28
 * Time: 11:59
 */

namespace Cartshare\Offer\Api\Data;

interface OfferInterface
{
    /**
     * Constants for data arrays.
     */
    const ID           = 'entity_id';
    const QUOTE_ID     = 'quote_id';
    const CUSTOMER_ID  = 'customer_id';
    const EMAIL        = 'email';

    /**
     * Get Id
     * @return int|null
     */
    public function getId();

    /**
     * Set id
     * @param $entityId
     * @return \Cartshare\Offer\Api\Data\OfferInterface
     */
    public function setId($entityId);

    /**
     * Get Quote ID
     * @return int
     */
    public function getQuoteId();

    /**
     * Set Quote ID
     * @param $quoteId
     * @return \Cartshare\Offer\Api\Data\OfferInterface
     */
    public function setQuoteId($quoteId);

    /**
     * Get Email
     * @return mixed
     */
    public function getEmail();

    /**
     * Set Email
     * @param $email
     * @return \Cartshare\Offer\Api\Data\OfferInterface
     */
    public function setEmail($email);

    /**
     * Get Customer ID
     * @return mixed
     */
    public function getCustomerId();

    /**
     * Set Customer Id
     * @param $customerId
     * @return \Cartshare\Offer\Api\Data\OfferInterface
     */
    public function setCustomerId($customerId);
}
