<?php
/**
 * Enrise Restful Skeleton Application (http://enrise.com/)
 *
 * @link      https://github.com/Enrise/EnriseRestfulSkeletonApplication
 * @copyright Copyright (c) 2012 Dolf Schimmel - Freeaqingme (dolfschimmel@gmail.com)
 * @copyright Copyright (c) 2012 Enrise (www.enrise.com)
 * @license   New BSD License, see LICENSE.MD
 */

namespace Application\Controller\Api;


use Enrise\RestfulApi\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Enrise\RestfulApi\Mvc\Router\Http\Rest\RouteMatch;

class Website extends AbstractRestfulController
{

    /**
     *
     * @var string|array
     */
    protected static $resourceId = 'website';

    /**
     * @var string|array
     */
    protected static $collectionId = 'websites';

    public function passThroughResource(RouteMatch $routeMatch)
    {
        list($key, $value) = parent::passThroughResource($routeMatch);

        // $mapper = $this->_getMapper();
        // $obj = $mapper->findById($key);
        $obj  = (object) array('id' => $value);

        $this->getRequest()->setMetadata($key, $obj);
    }

    /**
     * Retrieve a collection of websites
     *
     * @return \Zend\View\Model\ViewModel
     *
     * @accept({"name":"StringTrim"})
     * @accept application/vnd.com.example.websites+xml; version=1.5
     * @accept application/vnd.com.example.websites+xml; version={curVersion}
     * @urlTemplate /api/websites
     * @guiGroup website/websites
     *
     */
    public function collectionGetAction()
    {
        var_dump(apache_request_headers()); exit;
        $website = $this->getRequest()->getMetadata('website');
        return new ViewModel();
    }

    /**
     * Retrieve a single website
     *
     * @return \Zend\View\Model\ViewModel
     *
     * @accept({"name":"StringTrim"})
     * @accept application/vnd.com.example.website+xml; version=1.5; randomString=RandomValue
     * @accept application/vnd.com.example.website+xml; version={curVersion}
     * @urlParam website_id The numeric website id
     * @urlTemplate /api/website/{website_id}
     * @guiGroup website/website
     */
    public function resourceGetAction()
    {
        echo 'Resource of website';
        exit;
    }

    /**
     * Update a single website
     *
     * @return \Zend\View\Model\ViewModel
     *
     * @accept application/vnd.com.example.website+xml; version=1.5
     * @accept application/vnd.com.example.website+xml; version={curVersion}
     * @urlParam website_id The numeric website id
     * @urlTemplate /api/website/{website_id}
     * @guiGroup website/website
     */
    public function resourcePatchAction()
    {
        echo 'Should be patchting the Resource of website';
        exit;
    }

}
