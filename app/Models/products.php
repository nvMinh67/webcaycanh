<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    use HasFactory;
    /**
  * Database table name
  */
 protected $table = 'products';
    /**
     * Sử dụng các thuộc tính created_at và updated_at trong bảng
     *
     * @var boolean
     */
  public $timestamps = true;
  public $errors = [];
    public $fillable = ['id','name','price','image','slug'];

    protected $dates = [];
public static function getproduct(){
  $product = products::paginate(4);
  return $product;
}
public static function getProductDetail($id){
  $product = products::where('id','!=',$id)->paginate(4);
    return $product;
    
}


    
}
