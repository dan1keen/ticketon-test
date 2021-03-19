<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'path', 'piece_identifier', 'partition_no',
    ];

    public function getPath()
    {
        return 'userdata/'.$this->path;
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
