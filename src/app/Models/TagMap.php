<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagMap extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'tag_map';

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'note_id', 'tag_id',
  ];
}
