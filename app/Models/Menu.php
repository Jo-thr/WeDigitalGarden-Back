<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'nova_menu_menus';

    /**
     * Set the children menu.
     *
     * @param  string  $value
     * @return void
     */
    public function setChildrenAttribute($value)
    {
        $this->attributes['children'] = $value;
    }
}
