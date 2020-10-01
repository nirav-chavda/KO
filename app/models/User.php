<?php

namespace App\Models;

use Ninja\Auth;
use Illuminate\Database\Eloquent\Model as Model;
use Ninja\Request;

class User extends Model {

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */

    protected $hidden = [
        'password',
    ];

    public static function checkEmail($email) {
        $row = User::select('id')->where('email',$email)->first();
        if($row)
            return 1;
        else
            return 0;
    }
    
    public static function checkEmail(Request $request) {
        $row = User::select('id')->where('email',$request->email)->first();
        if($row)
            return 1;
        else
            return 0;
    }

    public static function validate($email,$password) {
        
        $row = User::where('email',$email)->first();

        if($row && password_verify($password,$row->password)) {
            Auth::set($row->id);
            return 1;
        }
        return 0;
    }
}
