<?php
namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostStatsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
            return Post::select('title', 'views', 'likes', 'comments', 'created_at')->get();
        
    }

    public function headings(): array
    {
        return [
            'Titre du post',
            'Auteur',
            'Nombre de vues',
            'Nombre de likes',
            'Nombre de commentaires',
        ];
    }
}

