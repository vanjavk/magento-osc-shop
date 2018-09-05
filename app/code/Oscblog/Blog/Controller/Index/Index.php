<?php
namespace Oscblog\Blog\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,\Oscblog\Blog\Model\PostFactory $postFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {



        #$post = $this->_postFactory->create();
        #$collection = $post->getCollection();
        #foreach($collection as $item){
        #    echo "<pre>";
        #    print_r($item->getData());
        #    echo "</pre>";
        #}
        #exit();
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}