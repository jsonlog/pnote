<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //定义关联的表
    protected $table = 'product';
    
    protected $fillable = ['tradetime','type','tradeobject','goodsname','tag','money','tradestate','storeid','comment'];
    
    protected $guarded = ['moneySource'];
    
    //禁用时间
    public $timestamps = false;
    
}
