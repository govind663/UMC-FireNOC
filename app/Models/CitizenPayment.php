<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CitizenPayment extends Model
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
        'mst_token',
        'payment_dt',
        'citizen_id',
        'payment_noc_mode',

        'l_name',
        'f_name',
        'father_name',
        'fee_construction_id',
        'fee_mode_operate_id',
        'wing_option',
        'fee_bldg_ht_id',
        'wing_rate',
        'new_area_meter',
        'meter_rate',
        'total_charges_cost',

        'citizen_payment_status',

        'inserted_by',
        'inserted_dt',
        'modified_by',
        'modified_dt',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
}
