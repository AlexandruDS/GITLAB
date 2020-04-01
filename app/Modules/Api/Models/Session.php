<?php


namespace App\Modules\Api\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public function session_users()
    {
        return $this->hasMany(SessionUser::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
