<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){//reletion category
        return $this->belongsTo(Category::class);
    }


    public function getVatproductAttribute(){//function คำนวณ vat
        return $this->price * 0.07." Bath";
    }
    public function getNameproductsAttribute(){//function ตัด name product
        return Str::limit($this->name,10);
    }


    public function cart(){//reletion cart
        return $this->belongsToMany(User::class,'carts','product_id','user_id')->withPivot('qty')->withTimestamps();
    }

}
