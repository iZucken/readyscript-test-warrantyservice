<?php

namespace WarrantyService\Controller\Admin;

use \RS\Html\Table\Type as TableType,
    \RS\Html\Toolbar\Button as ToolbarButton,
    \RS\Html\Filter,
    \RS\Html\Table;
use warrantyservice\config\Vendor;

/**
 * Спамим точки
 */
class ServicePointMock extends \RS\Controller\Admin\Front
{
    function __construct () {
        parent::__construct();
    }

    function actionIndex () {
        Vendor::tryLoad();
        $mock_disable_reason = false;
        if ( !class_exists( \Faker\Factory::class ) ) {
            $mock_disable_reason =  "Не найден класс \Faker\Factory (не установлены зависимости или опция --no-dev)";
        }
        $count = 0;
        if ( !$mock_disable_reason ) {
            $count = min( max( intval( $this->request( "count", TYPE_INTEGER ) ), 0 ), 100 );
            $remaining = $count;
            while ( 0 < $remaining-- ) {
                $faker = \Faker\Factory::create( "ru_RU" );
                $model = new \WarrantyService\Model\Orm\ServicePoint();
                $model->title = $faker->sentence( 4, true );
                $model->address = $faker->address;
                $model->schedule = $faker->time();
                $model->founding_date = $faker->date();
                $model->description = $faker->paragraphs( 3, true );
                $model->insert();
            }
        }
        $this->view->assign( array (
            'mock_disable_reason' => $mock_disable_reason,
            'count' => $count,
        ) );
        return $this->result->setTemplate( 'service_point_mock.tpl' );
    }
}