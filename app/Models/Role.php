<?php

namespace App\Models;

use Amir\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
