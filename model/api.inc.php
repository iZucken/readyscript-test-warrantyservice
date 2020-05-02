<?php

namespace WarrantyService\Model;
/**
 * API функции для работы с магазинами сети
 */
class Api extends \RS\Module\AbstractModel\EntityList
{
    function __construct () {
        parent::__construct( new Orm\ServicePoint(), ['multisite' => false] );
    }
}