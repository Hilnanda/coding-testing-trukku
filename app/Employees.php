<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'employees';
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone'
    ];
    
    public function companie()
    {
        return $this->belongsTo('App\Companies', 'company', 'id');
        
    }
}
