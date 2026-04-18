<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
        public $timestamps = false;
        protected $fillable = [
            "name",
            "country",
            "race_id",
        ];

        public function race(): BelongsTo{
            return $this->belongsTo(Race::class);
        }
}
