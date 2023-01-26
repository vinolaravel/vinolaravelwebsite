<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BouteilleSaq extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
