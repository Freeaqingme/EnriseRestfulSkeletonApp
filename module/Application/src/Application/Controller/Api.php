<?php
/**
 * Enrise Restful Skeleton Application (http://enrise.com/)
 *
 * @link      https://github.com/Enrise/EnriseRestfulSkeletonApplication
 * @copyright Copyright (c) 2012 Dolf Schimmel - Freeaqingme (dolfschimmel@gmail.com)
 * @copyright Copyright (c) 2012 Enrise (www.enrise.com)
 * @license   New BSD License, see LICENSE.MD
 */

namespace Application\Controller;

use Enrise\RestfulApi\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;

class Api extends AbstractRestfulController
{

    public function rootGetAction()
    {
        $view = new ViewModel(array('foo' => 'bar'));
        return $view;
    }

}
