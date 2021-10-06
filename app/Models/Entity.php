<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use HasFactory;
    protected $table = 'entities';
    use SoftDeletes;
    protected $primaryKey = 'country_id';
    protected $fillable = ['country_id', 'background', 'description'];
}
