<?php
namespace Oscblog\Blog\Block;
use DOMDocument;
class Printblog extends \Magento\Framework\View\Element\Template
{

    public function updateBlog()

    {

        $html=file_get_contents('http://softwarecity.hr/feed');
        #$xml = simplexml_load_string($content);
        #$json = json_encode($xml);
        #$array = json_decode($json,TRUE;
        $html= str_replace(':encoded','',$html);
        $xml = simplexml_load_string($html, "SimpleXMLElement", LIBXML_NOCDATA);
        #print_r($xml);
        #die();
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        #print "<pre>";
        #print_r($array);
        #print "</pre>";

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();

        foreach($array['channel']['item'] as $k => $v)
        {
            #print_r($k);
            #die();
            #$connection->prepare("INSERT INTO oscblog_blog (id,title,content,pubDate) VALUES (:id,:title,:content,:pubDate)) ON DUPLICATE KEY UPDATE id=:id");
            #$connection->bindParam(':id', $v['id']);
            #$connection->bindParam(':title', $v['title']);
            #$connection->bindParam(':content', $v['content']);
            #$connection->bindParam(':pubDate', $v['pubDate']);
            #$connection->execute();
            $query="INSERT INTO oscblog_blog (id,title,content,pubDate) VALUES (:id,:title,:content,:pubDate) ON DUPLICATE KEY UPDATE id=:id";
            $binds = array(
                'id'    => $k,
                'title'   => $v['title'],
                'content' => $v['content'],
                'pubDate'    => $v['pubDate']
            );
            $connection->query($query, $binds);
        }
        return 'success';

    }

    public function getBlog()

    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();

        $query="select * from oscblog_blog";

        $result = $connection->fetchAll($query);
        #print "<pre>";
        #print_r($result);
        #print "</pre>";
        #die();
        return $result;

    }

}