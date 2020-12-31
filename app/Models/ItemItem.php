<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'nome', 'item_atividades_id'
    ];

    public function itemAtividade()
    {
        return $this -> belongsTo(ItemAtividade::class);
    }
}
