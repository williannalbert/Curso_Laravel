<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Notícia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($noticias as $item)
            <tr>
                <td>{{$item->titulo}}</td>
                <td>{{$item->noticia}}</td>
            </tr>
        @endforeach
    </tbody>
</table>