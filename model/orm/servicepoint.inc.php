<?php

namespace WarrantyService\Model\Orm;

use \RS\Orm\Type;

/**
 * Class ServicePoint
 * @package WarrantyService\Model\Orm
 * @property $title
 * @property $address
 * @property $schedule
 * @property $founding_date
 * @property $description
 */
class ServicePoint extends \RS\Orm\OrmObject
{
    protected static
        $table = 'warranty_service_points';

    /**
     * Инициализирует свойства ORM объекта
     *
     * @return void
     */
    function _init () {
        parent::_init()->append( [
            // ID implicit???
//            'site_id' => new Type\CurrentSite(),
            'title' => new Type\Varchar( [
                'maxLength' => '100',
                'description' => 'Название пункта'
            ] ),
            'address' => new Type\Varchar( [
                'description' => 'Адрес'
            ] ),
            'schedule' => new Type\Varchar( [
                'maxLength' => '100',
                'description' => 'Время работы'
            ] ),
            'founding_date' => new Type\Date( [
                'description' => 'Дата открытия'
            ] ),
            'description' => new Type\Richtext( [
                'description' => 'Описание'
            ] ),
        ] );
    }
}