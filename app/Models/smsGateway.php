<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smsGateway extends Model
{
    use HasFactory;
    protected $table = 'sms_gateways';
    protected $primaryKey = 'id';
    protected $fillable = [
        'proyek_id',
        'tanggal',
        'pesan',
        'penerima'
    ];

    public function proyek()
    {
        return $this->belongsTo(proyek::class);
    }
}
