<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithMapping};

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return auth()->user()->tarefas()->get();
    }

    public function headings():array
    {
        return [
            'Id da Tarefa',
            'Tarefa',
            'Data Limite',
        ];
    }

    public function map($linha):array
    {
        return [
            $linha->id,
            $linha->tarefa,
            date('d/m/Y', strtotime($linha->data_limite_conclusao)),
        ];
    }
}
