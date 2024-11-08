<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Department;
use App\Models\Salary;
use App\Models\Task;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'title',
        'firstName',
        'lastName',
        'username',
        'nick_name',
        'extension',
        'gender',
        'employee_id',
        'phone',
        'department',
        'position',
        'joining_Date',
        'address',
        'picture',
        'role',
        'email',
        'password',
        'dob',
        'birth_day',
        'blood_group',
        'father_name',
        'marital_status',
        'marital_date',
        'spouse_name',
        'nationality',
        'residential_status',
        'place_of_date',
        'place_of_birth',
        'country_of_origin',
        'religion',
        'international_emp',
        'physically_challened',
        'is_director',
        'personal_email',
        'join_confrimation_date',
        'joining_status',
        'probation_period',
        'notice_period',
        'current_company_experience',
        'pre_company_experiecne',
        'total_experience',
        'referred_by',
        'division',
        'grade',
        'location',
        'reporting',
        'attendance_marking_option',
        'city',
        'state',
        'pin',
        'country',
        'phone1',
        'phone2',
        'fax',
    
    ];

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }
    public static function generateEmployeeId()
    {
        do {
            // Generate a random six-digit number
            $employeeId = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (self::where('employee_id', $employeeId)->exists());

        return $employeeId;
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }
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
}
