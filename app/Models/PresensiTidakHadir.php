<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PresensiTidakHadir extends Model
{
    use SoftDeletes;

    public $table = 'presensi_tidak_hadirs';

    protected $dates = [
        'cdate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cdate',
        'id_pegawai_id',
        'keterangan_id',
        'keterangan_lanjut',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getCdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCdateAttribute($value)
    {
        $this->attributes['cdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function id_pegawai()
    {
        return $this->belongsTo(User::class, 'id_pegawai_id');
    }

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'keterangan_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
