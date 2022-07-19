<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'course_sub_category';

    protected $fillable = [
        'title', 'description', 'course_category_id', 'thumbnail'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
