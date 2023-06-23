<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Auditable\AuditableTrait;

abstract class AbstractBaseModel extends Model
{
    use SoftDeletes, AuditableTrait;

    protected $hidden = [
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
}