<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

  protected $table = 'products';

  protected $fillable = ['pro_link', 'pro_image', 'description'];

  protected $guarded = ['id', 'cat_id'];
}
