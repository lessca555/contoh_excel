<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfImport extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'file'
    ];
}
