<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model {

  protected $table = 'boards';

  protected $fillable = ['name'];

  protected $guarded = ['id', 'cat_id'];
}
