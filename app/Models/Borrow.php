<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'reader_id',
        'book_id',
        'status',
        'request_processed_at',
        'request_managed_by',
        'deadline',
        'return_managed_by',
    ];

    public function reader() {
        return $this->belongsTo(User::class, 'reader_id', 'reader_id');
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function managerRequests() {
        return $this->belongsTo(User::class, 'request_managed_by', 'request_managed_by');
    }

    public function managerReturns() {
        return $this->belongsTo(User::class, 'return_managed_by', 'return_managed_by');
    }

}
