<?php
namespace Oscblog\Blog\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'oscblog_blog_post';

    protected $_cacheTag = 'oscblog_blog_post';

    protected $_eventPrefix = 'oscblog_blog_post';

    protected function _construct()
    {
        $this->_init('Oscblog\Blog\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}