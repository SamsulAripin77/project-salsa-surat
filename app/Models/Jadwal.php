<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    public const HARI_SELECT = [
        'senin'  => 'Senin',
        'selasa' => 'Selasa',
        'rabu'   => 'Rabu',
        'kamis'  => 'Kamis',
        'jumat'  => 'Jum\'at',
        'sabtu'  => 'Sabtu',
        'minggu' => 'Minggu',
    ];

    public $table = 'jadwals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hari',
        'id_shift_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_shift()
    {
        return $this->belongsTo(Shift::class, 'id_shift_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
