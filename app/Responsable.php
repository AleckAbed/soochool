<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    //

    protected $guarded = ['id'];

    public function eleves(){
        return $this->belongsToMany('App\Eleve','lien_parentes');
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::created(function($res){
            User::create([
                'name'=>$res->nom_complet,
                'email'=>strtolower($res->nom).$res->id."@sigma.com",
                'password'=>bcrypt("12345678"),
                'responsable_id'=>$res->id,
                'role_id'=>12,



            ]);

        });

        self::deleted(function($delresp){
            $user= User::where("responsable_id",$delresp->id)->first();
            User::destroy($user->id);


        });


    }
    /*public function user(){
        return $this->belongsTo('App\User');
    }*/
}
