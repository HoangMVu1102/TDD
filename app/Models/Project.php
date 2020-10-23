<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public static function create(\Illuminate\Http\Request $request)
    {
    }
    public function path()
    {
        return "/project/{$this->id}";
    }


}
