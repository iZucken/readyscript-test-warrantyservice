<?php

namespace WarrantyService\Model\CsvSchema;

use \RS\Csv\Preset;
use WarrantyService\Model\Orm\ServicePoint;

/**
 * Схема экспорта/импорта в CSV
 */
class ServicePoints extends \RS\Csv\AbstractSchema
{
    function __construct () {
        parent::__construct(
        //Добавит колонки, соответствующие полям ORM объекта ShopItem
            new Preset\Base( [
                'ormObject' => new ServicePoint(),
                'excludeFields' => ['id'],
                'multisite' => false,
                'searchFields' => ['city', 'address'] //Уникальный идентификатор для магазина, если данные по этим полям
                //уже будут присутствовать в базе, то запись будет просто обновлена, а не добавлена.
            ] ),
            []
        );
    }
}