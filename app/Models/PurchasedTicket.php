<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedTicket extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'purchased_tickets';
}
