<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'product_details';

    protected $fillable = [
        'color', 'size'
    ];

}
