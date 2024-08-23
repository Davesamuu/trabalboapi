<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocaleModel extends Model
{
    use HasFactory;

    protected $table = '_locale';

    protected $fillable = [
        'street',
        'neighborhood',
        'number',
        'CEP',
        'city',
        'state',
        'country'
        
    ];
}
