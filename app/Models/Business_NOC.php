<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business_NOC extends Model
{
    use SoftDeletes;
    protected $table='business_noc';
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
        'city_name',
        'survey_no',
        'cts_no',
        'part_no',
        'plot_no',
        'land_property_no',

        // ===== Necessary Particulars about above service
        'area_pincode',
        'shop_no',
        'building_height',
        'rooms_in_buld',
        'property_on_floor_buld',
        'no_of_accomodation_people',
        'area',
        'no_of_workers',
        'types_of_business',
        'from_date',
        'to_date',
        'no_of_workers_sleep_night',
        'fire_equips',
        'business_address',

        // ===== Other Document
        'location_map_doc',
        'electric_license_doc',
        'gas_license_doc',
        'shop_license_doc',
        'food_license',
        'tax_bill_paid_doc',
        'trade_license',
        'gas_certificate_doc',
        'commissioning_certificate',
        'affidavit_doc',

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
