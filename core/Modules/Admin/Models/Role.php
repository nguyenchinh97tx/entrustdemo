<?php
namespace Core\Modules\Admin\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [
        'name', 'display_name','description'
    ];

}