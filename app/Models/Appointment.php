<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'app_time' => 'datetime',
            'app_date' => 'datetime',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

   
}
