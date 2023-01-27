<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaUnit\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

final class UnitGroup extends BaseModel
{
    use SoftDeletes;


    public const STATUS_DISABLED = 0;
    public const STATUS_ENABLED = 1;


    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function units(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Unit::class, 'group_id');
    }
}
