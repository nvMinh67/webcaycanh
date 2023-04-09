<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
     /**
     * Tên bảng, nếu không có thuộc tính này 
     * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
     *
     * @var string
     */
    protected $table = 'order';
     /**
     * Sử dụng các thuộc tính created_at và updated_at trong bảng
     *
     * @var boolean
     */
    public $timestamps = true;

    public $errors = [];
    public $fillable = ['user_id','order_name','email','phone','address'];

    protected $dates = [];
    //     /**
    //  * user
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function user()
    // {
    //     return $this->hasMany(User::class, 'id','user_id');
    // }

    
    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // /**
    //  * order_product
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function contacts()
    // {
    //     return $this->hasMany(order_product::class, 'id_order');
    // }
}
