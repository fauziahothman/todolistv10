<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Task extends Model
{
    use HasFactory, SoftDeletes;

    // type modcon pastu klik tab

    public $timestamps = true;

    protected $table = 'tasks';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id']; // field yg autogenerate

function getRouteKeyName()
{
    return 'uuid';
}





    /**
     * Get the user that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // belongsTo adalah singular
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    /**
     * Get all of the comments for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'task_id', 'id');
    }

}
