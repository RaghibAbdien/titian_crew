<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_crew_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'id_crew', 'id_crew');
    }

    public function documents()
    {
        return $this->hasOne(Dokumen::class, 'id_crew', 'id_crew');
    }

}
