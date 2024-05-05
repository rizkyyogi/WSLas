<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyek extends Model
{
    use HasFactory;
    protected $table = 'proyeks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'produk_id',
        'user_id',
        'nama_proyek',
        'nama_pelanggan',
        'telp',
        'lokasi',
        'galeri',
        'status',
        'harga_jual',
        'modal',
        'keuntungan',
        'detail',
        'bar_progress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }

    public function sms()
    {
        return $this->hasMany(smsGateway::class);
    }

    public function aktual()
    {
        return $this->hasMany(AktualBiaya::class);
    }

}
