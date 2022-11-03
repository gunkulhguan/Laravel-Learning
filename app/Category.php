<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //protected $table = 'categories'; //ถ้าไม่ได้ตั้งชื่อตารางแบบพหูพจน์ หรือ ไม่ได้เติม s
    //protected $primaryKet = 'ชื่อ filed id' //ถ้าไม่ได้ต้องชื่อ filed id เป็นชื่อ id
    //public $incrementing = false //ถ้าไม่ได้ตั้ง auto incrementing
    //protected $keyType = 'string' //ถ้าไม่ได้ตั้ง filed id เป็น Int
    //public $timestamps = false;//ถ้าไม่มี filed update and create

    public function products(){//reletion category
        return $this->hasMany(Product::class);
    }
}
