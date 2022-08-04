<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['title', 'parent_id'];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
