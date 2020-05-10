<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Load extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['city_from_id', 'city_to_id', 'name', 'volume', 'photo'];

    public function fromCity()
    {
        return $this->belongsTo('App\City', 'city_from_id');
    }

    public function toCity()
    {
        return $this->belongsTo('App\City', 'city_to_id');
    }
}
