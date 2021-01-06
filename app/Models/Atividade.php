<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atividade extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'nome'
    ];

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function itens_atividade()
    {
        return $this -> hasMany(ItemAtividade::class) -> orderBy('ordem');
    }
}
