<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $fillable = ['mobile','password','first_name','last_name'];

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function type()
    {
        return 'admin';
    }
}
