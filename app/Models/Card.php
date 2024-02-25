<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status', 'issued_at', 'expires_at', 'exporter_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'issued_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function exporter()
    {
        return $this->belongsTo(Exporter::class);
    }
}
