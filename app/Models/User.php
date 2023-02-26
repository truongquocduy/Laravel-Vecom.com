<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'token_api',
        'email_verified',
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

    public function getAddress() {
        $listAddress = $this->address;
        if($listAddress === null) {
            $listAddress = array();
            return "Chưa cập nhật !!!";
        }
        else{
            $listAddress = unserialize($listAddress);
        }
        foreach($listAddress as $item){
            if($item->status) {
                $my_province = Province::where('province_id',$item->province_id)->first()->name;
                $my_district = District::where('district_id',$item->district_id)->first()->name;
                $my_ward = Ward::where('wards_id',$item->ward_id)->first()->name;
                return "$item->address, $my_ward, $my_district, $my_province";
            }
        }
    }

    public function getPhonePrimary() {
        $listAddress = $this->address;
        if($listAddress === null) {
            $listAddress = array();
            return "Chưa cập nhật !!!";
        }
        else{
            $listAddress = unserialize($listAddress);
        }
        foreach($listAddress as $item){
            if($item->status) {
                return $item->phone;
            }
        }
    }
}
