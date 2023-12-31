<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function todoLists()
    {
        return $this->hasMany(TodoList::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function invoices_items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function hostings()
    {
        return $this->hasMany(Hosting::class);
    }

    protected $appends = [
        'profile_photo_url',
    ];
}
