<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedProp extends Model
{
    use HasFactory;

    
    protected $table = "savedprops";

    protected $fillable = [
        'prop_id',
        'user_id',
        'title',
        'image',
        'price',
        'location',
    ];

    public  $timestamps = true;

}
