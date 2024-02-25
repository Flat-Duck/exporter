<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['description', 'support_type_id', 'exporter_id'];

    protected $searchableFields = ['*'];

    public function supportType()
    {
        return $this->belongsTo(SupportType::class);
    }

    public function exporter()
    {
        return $this->belongsTo(Exporter::class);
    }
}
