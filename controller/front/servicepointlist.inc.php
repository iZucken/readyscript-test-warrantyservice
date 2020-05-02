<?php

namespace WarrantyService\Controller\Front;
class ServicePointList extends \RS\Controller\Front
{
    function actionIndex () {
        $api = new \WarrantyService\Model\Api();
        $this->view->assign( array (
            'service_point_list' => $api->getList( 1 )
        ) );
        return $this->result->setTemplate( 'service_point_list.tpl' );
    }
}
