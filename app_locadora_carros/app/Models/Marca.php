<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ["nome", "imagem"];
    
    public function rules()
    {
        return [
            'nome'=>'required|unique:marcas,nome,'.$this->id.'|min:3',
            'imagem'=>'required:file|mimes:png,jpeg,jpg'
        ];
    }

    public function feedback()
    {
        return [
            'required'=>'O Campo :attribute é obrigatório',
            'nome.unique'=> 'O nome da marca já existe',
            'nome.min'=>'O nome deve ter pelo menos 3 caracteres',
            'imagem.mimes'=>'Imagem em formato incorreto. Aceito Png, Jpeg e Jpg'
        ];
    }
    public function modelos()
    {
        return $this->hasMany('App\Models\Modelo');
    }
}
