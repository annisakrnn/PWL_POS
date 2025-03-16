<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Pastikan nama tabel sesuai dengan database
    protected $primaryKey = 'level_id';

    protected $fillable = [
        'level_kode',
        'level_nama'
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'level_id', 'level_id');
    }
}
