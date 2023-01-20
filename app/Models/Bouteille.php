<?php

namespace App\Models;

use App\Models\Cellier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bouteille extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function celliers()
    {
        return $this->belongsToMany(Cellier::class);
    }
}
