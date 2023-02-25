<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

  /**
     * Database table name
     */
    protected $table = 'wards';

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
        'district_id',
        'name'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * district
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    /**
     * contacts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(contacts::class, 'ward_id');
    }
}
