<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exporter extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'nationality',
        'gender',
        'license',
        'commercial_book',
        'commercial_room',
        'block_time',
        'block_reason',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    public function card()
    {
        return $this->hasOne(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function supports()
    {
        return $this->hasMany(Support::class);
    }
}
