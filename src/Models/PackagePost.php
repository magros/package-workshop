<?php

namespace Magros\PackageWorkshop\Models;


use Illuminate\Database\Eloquent\Model;

class PackagePost extends Model
{
    protected $fillable = ['name', 'body'];
}