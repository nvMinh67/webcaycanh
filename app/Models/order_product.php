<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;
       /**
     * Database table name
     */
    protected $table = 'order_product';
    public $errors = [];
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_order','id_product','total_price','total_amount','Status'];
   

    protected $dates = [];
        /**
     * orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
      /**
     * Sử dụng các thuộc tính created_at và updated_at trong bảng
     *
     * @var boolean
     */
    public $timestamps = true;
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'id_order');
    }

      /**
     * product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Product() 
    {
        return $this->belongsTo(Products ::class, 'id_product');
    }

    public static function getorder(){
        $product = order_product::select(order_product::raw('id_order, sum(total_price) as price ,sum(total_amount) as amount,max(created_at) as date,max(Status) as status'))
        ->groupBy('id_order',)
        ->orderBy('id_order','desc')->paginate(8);
        return $product;
    }
}
    