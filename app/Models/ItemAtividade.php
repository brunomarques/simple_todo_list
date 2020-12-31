<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemAtividade extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'nome', 'atividade_id'
    ];

    public function atividade()
    {
        return $this -> belongsTo(Atividade::class);
    }

    public function itensItens()
    {
        return $this -> hasMany(ItemItem::class);
    }
}
