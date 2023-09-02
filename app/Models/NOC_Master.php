<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NOC_Master extends Model
{
    use SoftDeletes;
    protected $table='noc_master';
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'mst_token',
        'noc_a_date',
        'citizen_id',
        'noc_mode',

        'declare_by',
        'declare_date',
        'nominated_persion',
        'nominated_persion_name',
        'deliver_by',
        'd_last_name',
        'd_first_name',
        'd_father_name',
        'd_house_name',
        'd_flat_no',
        'd_wing_no',
        'd_road_name',
        'd_area_name',
        'd_taluka_name',
        'd_pincode',
        'd_email',

        'inserted_by',
        'inserted_dt',
        'modified_by',
        'modified_dt',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
    // protected $primaryKey = 'dept_id';

}
