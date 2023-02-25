<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    
       /**
     * Database table name
     */
    protected $table = 'districts';

    /**
     * Use timestamps 
     *
     * @var boolean
     */
    public $timestamps = true;

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'city_id',
        'name'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * city
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * wards
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id');
    }
}
