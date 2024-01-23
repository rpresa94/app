<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmResponsibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'personnel_id',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'personnel_id');
    }
}
