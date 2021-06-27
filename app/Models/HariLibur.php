<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HariLibur extends Model
{
    use SoftDeletes;

    public $table = 'hari_liburs';

    protected $dates = [
        'tgl',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tgl',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTglAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglAttribute($value)
    {
        $this->attributes['tgl'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
