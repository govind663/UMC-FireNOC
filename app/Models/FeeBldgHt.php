<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeBldgHt extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'building_ht',
        'fee_construction_id',
        'fee_mode_operate_id',
        'inserted_by',
        'inserted_dt',
        'modified_by',
        'modified_dt',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];


    public function fee_construction()
    {
        return $this->belongsTo(FeeConstruction::class);
    }

    public function fee_mode_operate()
    {
        return $this->belongsTo(FeeModeOperate::class);
    }
}
