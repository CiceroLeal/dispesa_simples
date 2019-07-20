<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Conta extends Model
{
    use HasUuid;

    protected $fillable = ['uuid','descricao','parcelas','fixo','status','tipo','dt_vencimento','qtd_pagos','valor','conta_id','user_id'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];
    protected $table = 'contas';

    public function conta(){
        return $this->hasOne('App\Conta');
    }

    public function usuario(){
        return $this->hasOne('App\User');
    }
}
