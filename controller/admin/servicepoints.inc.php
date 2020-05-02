<?php

namespace WarrantyService\Controller\Admin;

use \RS\Html\Table\Type as TableType,
    \RS\Html\Toolbar\Button as ToolbarButton,
    \RS\Html\Filter,
    \RS\Html\Table;

/**
 * Контроллер Управление списком магазинов сети
 */
class ServicePoints extends \RS\Controller\Admin\Crud
{
    function __construct () {
        parent::__construct( new \WarrantyService\Model\Api() );
    }

    function helperIndex () {
        $helper = parent::helperIndex();
        $helper->setTopTitle( 'Точки обслуживания' );
        $helper->setBottomToolbar( $this->buttons( ['multiedit', 'delete'] ) );
        $helper->addCsvButton('warrantyservice-servicepoints'); // shoplist-shopitem
//        $helper->addCsvButton( \WarrantyService\Model\CsvSchema\ServicePoints::class ); // \ShopList\Model\CsvSchema\ShopItem
        $helper->setTable( new Table\Element( [
            'Columns' => [
                new TableType\Checkbox( 'id', ['showSelectAll' => true] ),
                new TableType\Text( 'title', 'Название', ['Sortable' => SORTABLE_BOTH, 'href' => $this->router->getAdminPattern( 'edit', [':id' => '@id'] ), 'LinkAttr' => ['class' => 'crud-edit']] ),
                new TableType\Text( 'address', 'Адрес' ),
                new TableType\Text( 'schedule', 'Время работы' ),
                new TableType\Date( 'founding_date', 'Дата открытия', ['Sortable' => SORTABLE_BOTH] ),
//                new TableType\Text('id', '№', ['Sortable' => SORTABLE_BOTH, 'CurrentSort' => SORTABLE_ASC, 'TdAttr' => ['class' => 'cell-sgray']] ),
                new TableType\Actions( 'id', [
                    //Опишем инструменты, которые нужно отобразить в строке таблицы пользователю
                    new TableType\Action\Edit( $this->router->getAdminPattern( 'edit', [':id' => '~field~'] ), null, [
                        'attr' => [
                            '@data-id' => '@id'
                        ]] ),
                ],
                    //Включим отображение кнопки настройки колонок в таблице
                    ['SettingsUrl' => $this->router->getAdminUrl( 'tableOptions' )]
                ),
            ]
        ] ) );
        $helper->setFilter( new Filter\Control( [
            'Container' => new Filter\Container( [
                'Lines' => [
                    new Filter\Line( ['Items' => [
                        new Filter\Type\Text( 'id', '№', ['attr' => ['class' => 'w50']] ),
                        new Filter\Type\Text( 'address', 'Адрес', ['searchType' => '%like%'] ),
                        new Filter\Type\DateRange( 'founding_date', 'Дата открытия' ),
                    ]] ),
                ]
            ] ),
            'Caption' => 'Поиск по точкам'
        ] ) );
        return $helper;
    }
}