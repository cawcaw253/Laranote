<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/** appends attribute */
	protected $appends = ['contrast_font_color'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'color_code',
	];

	/**
	 * Get the contrast color code.
	 *
	 * @return string
	 */
	public function getContrastFontColorAttribute()
	{
		return contrastFontColor($this->attributes['color_code']);
	}

	/**
	 * Create new tag from parameters and return array of tag id
	 *
	 * @param array $tags
	 * @return Collection
	 */
	public static function createNewTag(array $tags)
	{
		$updatedTags = [];

		foreach ($tags as $tag) {
			$tempTag = Tag::firstOrCreate(
				['title' => $tag['value']],
				['color_code' => $tag['color']]
			);
			array_push($updatedTags, $tempTag->id);
		}

		return Tag::whereIn('id', $updatedTags)->get();
	}
}
