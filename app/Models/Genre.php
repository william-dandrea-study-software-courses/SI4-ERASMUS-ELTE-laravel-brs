<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /*
     * $table->string('name', 255);
     * $table->enum('style', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']);
     */
    use HasFactory;

    protected $fillable = ['name', 'style'];



}
