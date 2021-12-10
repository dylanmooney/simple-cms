<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'path',
        'original_name',
        'file_size',
        'mime_type',
        'alt_text',
    ];

    public function uploaded_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
