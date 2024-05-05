<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktualBiaya extends Model
{
    use HasFactory;
    protected $table = 'aktual_biayas';
    protected $primaryKey = 'id';
    protected $fillable = ['proyek_id','tanggal','aktual','biaya'];

    public function proyek()
    {
        return $this->belongsTo(proyek::class);
    }
}
