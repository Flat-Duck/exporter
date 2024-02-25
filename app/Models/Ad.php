<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['body', 'image'];

    protected $searchableFields = ['*'];
}
