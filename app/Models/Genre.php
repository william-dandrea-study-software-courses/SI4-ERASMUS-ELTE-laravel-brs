<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    /*
     * $table->string('name', 255);
     * $table->enum('style', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']);
     */
    use HasFactory;

    protected $fillable = ['name', 'style'];


    public function books() {
        return $this->belongsToMany(Book::class);
    }
}
