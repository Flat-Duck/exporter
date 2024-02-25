<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'city',
        'address',
        'phone',
        'url',
        'export_type',
        'exporter_id',
    ];

    protected $searchableFields = ['*'];

    public function exporter()
    {
        return $this->belongsTo(Exporter::class);
    }
}
