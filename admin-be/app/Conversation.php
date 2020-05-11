<?php

namespace App;

use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use TCG\Voyager\Traits\Translatable;

class Conversation extends Model
{
 protected $table='conversations';
    public $fillable = [
        'user_one',
        'user_two',
        'status',
    ];

    /*
     * make a relation between message
     *
     * return collection
     * */
    public function messages()
    {
        return $this->hasMany('App\Message', 'conversation_id')
            ->with('sender')->orderBy('id','desc');
    }

    /*
     * make a relation between first user from conversation
     *
     * return collection
     * */
    public function userone()
    {
        return $this->belongsTo(config('talk.user.model', 'App\User'),  'user_one', config('talk.user.ownerKey'));
    }

    /*
   * make a relation between second user from conversation
   *
   * return collection
   * */
    public function usertwo()
    {
        return $this->belongsTo(config('talk.user.model', 'App\User'),  'user_two', config('talk.user.ownerKey'));
    }
}
