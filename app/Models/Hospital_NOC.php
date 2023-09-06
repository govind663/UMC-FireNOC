<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital_NOC extends Model
{
    use SoftDeletes;
    protected $table='hospital_noc';
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
        'hospital_name',
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
        'city_name',
        'survey_no',
        'cts_no',
        'part_no',
        'plot_no',
        'land_property_no',

        // ===== Necessary Particulars about above service
        'area_pincode',
        'types_of_hospital',
        'from_date',
        'to_date',
        'shop_no',
        'area_place_measurments',
        'total_staff',
        'total_sleeping_staff',
        'hospital_fireequip',
        'hospital_address',

        // ===== Other Document
        'property_doc',
        'location_doc',
        'electric_doc',
        'shop_license_doc',
        'paid_tax_bill_doc',
        'commissioning_certificate',
        'affidavit_doc',
        'corporation_certificate',

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
