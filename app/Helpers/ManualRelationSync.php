<?php
/**
 * Created by PhpStorm.
 * Date: 12/09/2017
 * Time: 13:57
 */

namespace App\Helpers;


class ManualRelationSync
{
    /**
     * Used to manual sync many to many relationship
     * with soft delete.
     *
     * The sync function provided by Eloquent can't
     * soft delete.
     *
     * @param $mainModelIdName
     * @param $mainModelId
     * @param $relationClass
     * @param $secondModelIdName
     * @param $newItems
     * @return mixed
     */
    public static function sync($mainModelIdName, $mainModelId, $relationClass,
                                $secondModelIdName, $newItems)
    {
        $currentIds = $relationClass::where($mainModelIdName, $mainModelId)
            ->pluck("$secondModelIdName");
        $currentIds = is_array($currentIds) ? collect($currentIds) : $currentIds;

        $newIds = array_column($newItems, 'id');
        // filter ids that need to be deleted
        $idsToDelete = $currentIds->filter(function ($el) use ($newIds) {
            return !in_array($el, $newIds);
        });

        // delete them from database
        if (count($idsToDelete) > 0) {
            $relationClass::whereIn($secondModelIdName, $idsToDelete)
                ->where($mainModelIdName, $mainModelId)
                ->delete();
        }

        foreach ($newItems as $newItem) {
            $newId = is_array($newItem) ? $newItem['id'] : $newItem->id;
            $data = [
                "$secondModelIdName" => $newId,
                "$mainModelIdName" => $mainModelId,
            ];

            if (isset($newItem['pivotAttributes'])) {
                $data = array_merge($data, $newItem['pivotAttributes']);
            }

            if (!in_array($newId, $currentIds->toArray())) {
                $relationClass::create($data);
            } else {
                $relationClass::where($secondModelIdName, $newId)
                    ->where($mainModelIdName, $mainModelId)
                    ->update($data);
            }

        }
    }
}