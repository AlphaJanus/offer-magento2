<?php
/**
 * Created by PhpStorm.
 * User: hosein
 * Date: 2019-03-07
 * Time: 11:25
 */

namespace Netzexpert\Offer\Block\Checkout\Cart;

use Magento\Email\Model\Template\Config;
use Magento\Framework\View\Element\Template;

class FormSendMyAccount extends \Magento\Framework\View\Element\Template
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
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $_request;

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
        \Magento\Framework\App\RequestInterface $request,
        array $data = [])
    {
        $this->customerSession = $session;
        $this->groupRepository = $groupRepository;
        $this->_request = $request;
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

    public function getFormUrl()
    {
        return $this->getUrl('offer/quote/sendcartmyaccount');
    }

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

    public function getOfferId()
    {
        $currentEntityId = $this->_request->getParam('entity_id');
        return $currentEntityId;
    }
}