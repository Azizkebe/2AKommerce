<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo(CloudFile::class, 'cloudfile_id');
    }
    public function vendeur()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
