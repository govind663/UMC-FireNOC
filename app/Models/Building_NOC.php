<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building_NOC extends Model
{
    use SoftDeletes;
    protected $table='building_noc';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'noc_mst_id',

        // ===== Basic Details
        'l_name',
        'f_name',
        'father_name',
        'society_name',
        'designation',

        // ===== Address Details
        'house_name',
        'flat_no',
        'wing_name',
        'road_name',
        'area_name',
        'taluka_name',
        'pincode',
        'ward_no',
        'electrol_panel_no',
        'contact_persion',
        'tel_no',
        'email',

        // ===== Information of Property
        'types_of_property',
        'property_no',

        // ====== Information of Land
        'peermission_no',
        'permission_date',
        'renewal_date',

        // ===== Other Document
        'maps_of_proposed_doc',
        'city_survey_doc',
        'sanad_doc',
        'competent_authority_doc',
        'dues_certificate_doc',
        'fire_equipments_install_doc',

        'status',

        'application_status',
        'approved_dt',
        'approved_by',
        'rejected_dt',
        'rejected_by',
        'remarks',

        'payment_status',
        'payment_dt',
        'payment_by',

        'certificate_status',
        'certificate_dt',


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
