<?php
/**
 * Created by PhpStorm.
 * User: hosein
 * Date: 2019-01-16
 * Time: 15:16
 */

namespace Netzexpert\Offer\Block\Checkout\Cart;

use Magento\Email\Model\Template\Config;
use Magento\Framework\View\Element\Template;

class Form extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Config
     */
    private $emailConfig;

    /**
     * @var \Magento\Customer\Model\Session
     */
    private $customerSession;

    /**
     * @var \Magento\Customer\Api\GroupRepositoryInterface
     */
    private $groupRepository;

    /**
     * Form constructor.
     * @param \Magento\Customer\Model\Session $session
     * @param Template\Context $context
     * @param Config $config
     * @param \Magento\Customer\Api\GroupRepositoryInterface $groupRepository
     * @param array $data
     */
    public function __construct(
        \Magento\Customer\Model\Session $session,
        Template\Context $context,
        Config $config,
        \Magento\Customer\Api\GroupRepositoryInterface $groupRepository,
        array $data = [])
    {
        $this->customerSession = $session;
        $this->groupRepository = $groupRepository;
        parent::__construct($context, $data);
        $this->emailConfig = $config;
    }

    public function getAvailableTemplates() {
        $templates = $this->emailConfig->getAvailableTemplates();
        $module = 'Netzexpert_Offer';
        return array_filter($templates, function ($var) use ($module) {
            return ($var['group'] == $module);
        });
    }

    /**
     * @return string
     */
    public function getFormUrl()
    {
        return $this->getUrl('offer/quote/send');
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    protected function _toHtml()
    {
        $inGroup = null;
        if ($this->customerSession->isLoggedIn()) {
            $customer = $this->customerSession->getCustomer()->getGroupId();
            $inGroup = $this->groupRepository->getById($customer)->getCode();
        }
        if ($inGroup !== 'Mitarbeiter') {
            return '';
        }
        return parent::_toHtml();
    }
}