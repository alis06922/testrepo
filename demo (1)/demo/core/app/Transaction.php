<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = array('receiver','rcid', 'sender','snid', 'amount','trxid');
}
