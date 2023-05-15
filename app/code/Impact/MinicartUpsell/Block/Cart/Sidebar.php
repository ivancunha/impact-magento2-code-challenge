<?php

declare(strict_types=1);

namespace Impact\MinicartUpsell\Block\Cart;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Model\SessionFactory;
use Magento\Checkout\Model\Session;

class Sidebar extends Template
{
    /**
    * @var SessionFactory
    */
    protected $_customerSessionFactory;

    /**
    * @var Session
    */
    protected $_checkoutSession;

   /**
    * Sidebar constructor.
    * @param Context $context
     * @param SessionFactory
     * @param Session
    * @param array $data
    */
   public function __construct(
        Context $context,
        SessionFactory $customerSessionFactory,
        Session $checkoutSession,
        array $data = []
   ) {
        $this->_customerSessionFactory = $customerSessionFactory;
        $this->_checkoutSession = $checkoutSession;
       parent::__construct($context, $data);
   }

   /**
     * @return string
     */
    public function Methodname()
    {
        /*
         * this approach has a problem, if you add a product that was already in the minicart, it will not show that one, only a new one.
         */
        // $customer = $this->_customerSessionFactory->create();
        // $lastItemMinicart = $this->_checkoutSession->getQuote()->getAllItems();//->getLastAddedItem();
        // foreach($lastItemMinicart as $item) 
        // {
        //     echo 'ID: '.$item->getProductId().'<br />';
        //     echo 'Name: '.$item->getName().'<br />';
        //     echo 'Sku: '.$item->getSku().'<br />';
        //     echo 'Quantity: '.$item->getQty().'<br />';
        //     echo 'Price: '.$item->getPrice().'<br />';
        //     echo "<br />";            
        // }

            
        $itemsCollection = $this->_checkoutSession->getQuote()->getItemsCollection();
        $itemsCollection->getSelect()->order('updated_at DESC');
        $latestItem      = $itemsCollection->getLastItem(); 
        $product         = $latestItem->getProduct();
        echo 'ID: '.$latestItem->getProductId().'<br />';
        echo 'Name: '.$latestItem->getName().'<br />';
        echo 'Sku: '.$latestItem->getSku().'<br />';
        echo 'Quantity: '.$latestItem->getQty().'<br />';
        echo 'Price: '.$latestItem->getPrice().'<br />';
        echo "<br />";


        if (!isset($latestItem)) { 
            return __('Hello 1');
        }
        else {
            // The goal here is to show a message or show nothing, if the last added item has no up-sell products configured in the backoffice.
            return __('Hello 2');
        }
    }
}