<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaUnit\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

final class Unit extends BaseModel implements Sortable
{
    use SoftDeletes;
    use SortableTrait;


    public const STATUS_DISABLED = 0;
    public const STATUS_ENABLED = 1;


    public $sortable = [
        'order_column_name' => 'sort',
        'sort_when_creating' => false,
        'sort_on_has_many' => true,
        'sort_on_belongs_to' => true,
        'nova_order_by' => 'ASC',
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UnitGroup::class, 'group_id');
    }
}
