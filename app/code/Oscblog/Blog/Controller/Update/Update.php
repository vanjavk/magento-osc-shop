<?php
namespace Oscblog\Blog\Controller\Index;

use Magento\Framework\App\Action\Context;

class Update extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        die("hey");
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}