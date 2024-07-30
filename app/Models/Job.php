<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;

    protected $table = "job_listings";

    // protected $fillable = ["title","salary"];
    protected $guarded = [];

    public static function findOrAbort(int $id)
    {
        $record = static::find($id);
        if(!$record)
            abort(404);
        return $record;
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,foreignPivotKey : "job_listing_id");
    }
}
