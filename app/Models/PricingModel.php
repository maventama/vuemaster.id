<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pricings';
    protected $guarded = [];
    public function pricing_features()
    {
        return $this->hasMany(PricingFeatureModel::class, 'pricing_id', 'id');
    }
}
