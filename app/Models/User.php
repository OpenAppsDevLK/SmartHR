<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'password' => 'hashed',
    ];

    static public function getRecord(){
        //This code will select all the users in the database.
        //This code will call at employees/list.blade.php file.
        // $return = self::select('users.*')
        //           ->orderBy('id', 'desc')
        //           ->paginate(5);

        //           return $return;

        $return = self::select('users.*');

            //Employee Search  box Start

            //Request is comming from employees/list.blade.php file, and the request will compare with database.
                if(!empty(Request::get('id')))
                {
                    $return = $return->where('id', '=', Request::get('id'));
                }

                if(!empty(Request::get('name')))
                {
                    $return = $return->where('name', 'like', '%' .Request::get('name'). '%');
                }

                if(!empty(Request::get('last_name')))
                {
                    $return = $return->where('last_name', 'like', '%' .Request::get('last_name'). '%');
                }

                if(!empty(Request::get('email')))
                {
                    $return = $return->where('email', 'like', '%' .Request::get('email'). '%');
                }
            //Employee Search box End
            
            $return = $return->orderBy('id', 'desc')
                      ->paginate(5);
                      return $return;

    }

    //We use this relationship to get Job Title on employees/view.blade.php file.
    public function get_job_single()
    {
        return $this->belongsTo(JobsModel::class, "job_id");
    }

    //We use this relationship to get Manager Name on employees/view.blade.php file.
    public function get_manager_name_single()
    {
        return $this->belongsTo(ManagerModel::class, "manager_id");
    }

    //We use this relationship to get Manager Name on employees/view.blade.php file.
    public function get_department_name_single()
    {
        return $this->belongsTo(DepartmentsModel::class, "department_id");
    }


        //We use this relationship to get Position Name on position/view.blade.php file.
        public function get_position_name_single()
        {
            return $this->belongsTo(PositionModel::class, "position_id");
        }

}
