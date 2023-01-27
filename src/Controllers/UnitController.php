<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaUnit\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\UnitGroup;

final class UnitController extends Controller
{
    public static function getPairsByGroupSlug($groupSlug = null)
    {
        $query = Unit::where(['deleted_at' => null, 'status' => Unit::STATUS_ENABLED]);

        if ($groupSlug) {
            if (!is_array($groupSlug)) {
                $groupSlug = [$groupSlug];
            }
            $groupIds = UnitGroup::whereIn('slug', $groupSlug)->pluck('title', 'id');
            $query->whereIn('group_id', array_keys($groupIds->toArray()));
        }

        $list = $query->orderBy('sort')->get();

        $return = [];

        foreach ($list as $item) {
            if (!$groupSlug || count($groupSlug) > 1) {
                $return[$item->id] = ['label' => $item->title . ' (' . $item->symbol . ')', 'group' => $groupIds[$item->group_id]];
            } else {
                $return[$item->id] = ['label' => $item->title . ' (' . $item->symbol . ')'];
            }
        }

        return $return;
    }


    public static function selectOptions()
    {
        $groups = UnitGroup::where(['status' => true])->get()->keyBy('id');
        $list = Unit::whereIn('group_id', array_keys($groups->toArray()))->where(['status' => true])->orderBy('group_id')->orderBy('sort')->orderBy('coefficient')->get();

        $return = [];

        foreach ($list as $item) {
            $return[$item->id] = ['label' => $item->title . ' - ' . $item->symbol, 'group' => $groups[$item->group_id]->title];
        }

        return $return;
    }
}
