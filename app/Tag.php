<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // The database table used by the model.
    protected $table = 'tags';
    // The attributes that are mass assignable.
    protected $fillable = [
    	'tag'
    ];
    /**
     * The article that belong to the tag.
     */
    public function article()
    {
        return $this->belongsToMany('App\Article');
    }
}
