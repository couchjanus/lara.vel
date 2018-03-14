<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\Tag;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Sluggable;
    use Searchable;

    protected $fillable = ['title','category_id','content', 'slug', 'is_active'];
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
