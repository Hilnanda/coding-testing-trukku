<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'companies';
    protected $fillable = [
        'name',
        'email',
        'website'
    ];
    
    public function employee()
    {
        return $this->hasMany('App\Employees','company');
    }
}
