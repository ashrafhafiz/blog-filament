<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $description
 * @property boolean $activated
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Post[] $posts
 */
class Category extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['type', 'name', 'description', 'activated', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function postsByCategory()
    {
        return $this->belongsToMany('App\Models\Post', 'posts_has_categories');
    }
}
