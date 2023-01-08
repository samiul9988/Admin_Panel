<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    private static $user;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createUser($request){
        self::$user=new User();
        self::$user->name=$request->name;
        self::$user->email=$request->email;
        self::$user->password=bcrypt($request->password);
        self::$user->save();
    }
    public static function updateUser($request,$id){
        self::$user=User::find($id);
        self::$user->name=$request->name;
        self::$user->email=$request->email;
        self::$user->save();
    }
    public static function changePassword($request,$id){
        self::$user=User::find($id);
        self::$user->password=bcrypt($request->password);
        self::$user->save();
    }
    public static function deleteUser($id){
        self::$user=User::find($id);
        self::$user->delete();
    }
    public static function nameChangeFromEmployee($request){
        self::$user=User::find($request->user_id);
        self::$user->name=$request->name;
        self::$user->save();
    }

    public function roles(){
        return $this->hasMany(Role::class,'user_id','id');
    }

    public function hasRole($role){
        return (bool) $this->roles()->where('role_name',$role)->count();
    }
    public function hasRoleUserId($usrId){
        return (bool) $this->roles()->where('user_id',$usrId)->count();
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'id','user_id');
    }
}
