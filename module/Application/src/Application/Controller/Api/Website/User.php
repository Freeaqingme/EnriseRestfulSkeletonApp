<?php
/**
 * Enrise Restful Skeleton Application (http://enrise.com/)
 *
 * @link      https://github.com/Enrise/EnriseRestfulSkeletonApplication
 * @copyright Copyright (c) 2012 Dolf Schimmel - Freeaqingme (dolfschimmel@gmail.com)
 * @copyright Copyright (c) 2012 Enrise (www.enrise.com)
 * @license   New BSD License, see LICENSE.MD
 */

namespace Application\Controller\Api\Website;

use Enrise\RestfulApi\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;

class User extends AbstractRestfulController
{

    /**
     *
     * @var string|array
     */
    protected static $resourceId = 'user';

    /**
     * @var string|array
     */
    protected static $collectionId = 'users';



    /**
     * Retrieve a collection of users
     *
     * @return \Zend\View\Model\ViewModel
     *
     * @accept text/xml; version=1.5
     * @accept application/vnd.com.example.website+xml; version=1.5
     * @accept application/vnd.com.example.website+xml; version={curVersion}
     * @urlParam websiteId The numeric website id
     * @urlTemplate /api/website/{websiteId}/users
     * @guiGroup accounts/users
     */
    public function collectionGetAction()
    {
//         $db = $this->getServiceLocator()->get('Global\Db\Adapter\Main');
//         var_dump($db->query('SELECT @@SESSION.sql_mode;'));
        $website = $this->getRequest()->getMetadata('website');
        return new ViewModel();
    }

    /**
     * @guiGroup accounts/user
     * @urlTemplate /api/website/{websiteId}/user/{user_id}
     * @urlParam websiteId The numeric website id
     * @urlParam user_id The numeric user id
     */
    public function resourceGetAction()
    {
        var_dump($this->getResourceId());
        exit;
    }

}
