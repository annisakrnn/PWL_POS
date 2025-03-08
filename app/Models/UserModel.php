<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'm_user'; //mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel yang digunakan

    //jobsheet 3
    //langkah 1 praktikum 1
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    //langkah 1 praktikum 2.7
    public function level(): BelongsTo{
        return $this->belongsTo(UserModel::class, 'level_id', 'level_id');
    }
}
