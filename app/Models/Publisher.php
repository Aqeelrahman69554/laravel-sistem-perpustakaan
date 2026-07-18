<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = "publisher";

    protected $fillable = [
        "publisher_name",
        "publisher_email",
        "publisher_telp",
        "publisher_address",
    ];

    public $timestamps = true;
}
