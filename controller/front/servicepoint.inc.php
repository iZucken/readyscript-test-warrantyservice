<?php

namespace WarrantyService\Controller\Front;
class ServicePoint extends \RS\Controller\Front
{
    function actionIndex () {
        $id = $this->url->get( 'id', TYPE_INTEGER );
        $api = new \WarrantyService\Model\Api();
        $this->view->assign( array (
            'service_point' => $api->getById( $id )
        ) );
        return $this->result->setTemplate( 'service_point.tpl' ); // \RS\Controller\Result\Standard
    }
}
