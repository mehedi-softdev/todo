<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    
    protected $fillable = [
        'id',
        'todo_item',
    ];

}
