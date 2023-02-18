<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'salaries';

    protected $dates = [
        'date',
        'date_2',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hodim_id',
        'salary',
        'date',
        'date_2',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hodim()
    {
        return $this->belongsTo(User::class, 'hodim_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDate2Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDate2Attribute($value)
    {
        $this->attributes['date_2'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
