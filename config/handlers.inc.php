<?php

namespace WarrantyService\Config;

use \RS\Orm\Type as OrmType;

/**
 * Класс предназначен для объявления событий, которые будет прослушивать данный модуль и обработчиков этих событий.
 */
class Handlers extends \RS\Event\HandlerAbstract
{
    function init () {
        Vendor::tryLoad();
        $this
            ->bind( 'getmenus' )
            ->bind( 'getroute' );
    }

    /**
     * Возвращает пункты меню, которые следует добавить в админ. панель
     *
     * @return array of \RS\Router\Route
     */
    public static function getMenus ( array $items ) {
        $items[] = [
            'title' => 'Гарантийное обслуживание',
            'alias' => 'warrantyservice',
            'link' => '%ADMINPATH%/warrantyservice-servicepoints/',
            'typelink' => 'link',
            'parent' => 'modules',
        ];
        $items[] = [
            'title' => 'Точки гарантийного обслуживания',
            'alias' => 'warrantyservice-servicepoints',
            'link' => '%ADMINPATH%/warrantyservice-servicepoints/',
            'typelink' => 'link',
            'parent' => 'warrantyservice',
        ];
        if ( class_exists( \Faker\Factory::class ) ) {
            $items[] = [
                'title' => 'Сгенерировать',
                'alias' => 'warrantyservice-servicepointmock',
                'link' => '%ADMINPATH%/warrantyservice-servicepointmock/',
                'typelink' => 'link',
                'parent' => 'warrantyservice',
            ];
        }
        return $items;
    }

    public static function getRoute ( array $routes ) {
        $routes[] = new \RS\Router\Route(
            'warrantyservice-front-servicepointlist',
            [
                '/supportpoint/',
            ],
            null,
            'Точки гарантийного обслуживания'
        );
        $routes[] = new \RS\Router\Route(
            'warrantyservice-front-servicepoint',
            '/supportpoint/{id}/',
            null,
            'Точка гарантийного обслуживания по id'
        );
        return $routes;
    }
}