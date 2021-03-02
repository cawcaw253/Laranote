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
}
