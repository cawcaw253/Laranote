<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use \Illuminate\Database\Eloquent\Relations;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id', 'contents'
    ];

    /**
     * @inheritdoc
     * @return Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @inheritdoc
     * @return Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, TagMap::class, 'note_id', 'tag_id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeFromCurrentUser($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    /**
     * @param Collection|null $tags
     * @return void
     */
    public function upsertTagMap(Collection|null $tags)
    {
        if ($tags) {
            $tagMap = [];
            foreach ($tags as $tag) {
                array_push($tagMap, [
                    'note_id' => $this->id,
                    'tag_id' => $tag->id
                ]);
            }
            TagMap::upsert($tagMap, ['note_id'], ['tag_id']);
        }
    }
}
