<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetCollection extends Model
{
    use HasFactory;
    protected $table = 'asset_collections';
    use SoftDeletes;
    protected $fillable = ['category_id', 'name', 'image'];
}
