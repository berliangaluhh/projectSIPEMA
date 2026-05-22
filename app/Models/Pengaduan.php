<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengaduans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'deskripsi',
        'bukti',
        'status',
    ];

    /**
     * Get the student (user) who submitted the complaint.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
