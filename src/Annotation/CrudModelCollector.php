<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Mine\Annotation;

use Hyperf\Di\MetadataCollector;

class CrudModelCollector extends MetadataCollector
{
    protected static array $container = [];

    public static function collect(string $mapper, string $model)
    {
        static::$container['crud_collect_model'][$mapper] = $model;
    }

    public static function collectMapper(string $service, string $mapper): void
    {
        static::$container['crud_collect_mapper'][$service] = $mapper;
    }

    public static function mapperList(): array
    {
        return static::$container['crud_collect_mapper'] ?? [];
    }

    public static function list(): array
    {
        return parent::list()['crud_collect_model'] ?? []; // TODO: Change the autogenerated stub
    }
}
