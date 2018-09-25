<?php

namespace App;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
        public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }
    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if ($role->name == $name) return true;
        }
        return false;
    }
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function isAdmin() 
    {
        return $this->roles()->where('name', 'admin')->exists();
    }
    public function isUser() 
    {
        return $this->roles()->where('name', 'user')->exists();
    }
    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }
}
