<?php
/**
 * Created by PhpStorm.
 * User: radcom
 * Date: 6/14/2019
 * Time: 5:45 PM
 */

namespace App\Helpers;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;

class Helper
{

    public static function fromCamelCaseToSnakeCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }


    public static function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $options['path'] = Request::url();
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator(array_values($items->forPage($page, $perPage)->toArray()), $items->count(), $perPage, $page, $options);
    }

    public static function getTextValue($texts, $identifier)
    {
        foreach ($texts as $text) {
            if ($text->identifier === $identifier) {
                return $text->value;
            }
        }
        return  $identifier;
    }
}