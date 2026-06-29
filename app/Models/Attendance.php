<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'date', 'check_in_time', 'check_out_time',
        'check_in_lat', 'check_in_lng', 'check_out_lat', 'check_out_lng',
        'check_in_address', 'check_out_address', 'status', 'notes'
    ];

    protected $casts = [
        'date' => 'date',
        'check_in_time' => 'datetime',
        'check_out_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'present' => 'Hadir',
            'absent' => 'Absen',
            'late' => 'Terlambat',
            'half_day' => 'Setengah Hari'
        ];
        
        return $texts[$this->status] ?? $this->status;
    }
}