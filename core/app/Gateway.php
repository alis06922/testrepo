<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    protected $table = 'gateways';
    protected $fillable = array('name','gateimg', 'minamo', 'maxamo', 'fixed_charge',
	'percent_charge', 'rate', 'val1', 'val2', 'status');

    public function sell()
    {
        return $this->hasMany('App\Sell', 'id', 'gateway_id');
    }
}
