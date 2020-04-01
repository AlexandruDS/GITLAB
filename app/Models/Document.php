<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documents';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

}

