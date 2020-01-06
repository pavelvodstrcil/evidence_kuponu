@extends ('layout')

@section('content')

<?php
$prodane=\App\prodane::all();

    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Produkt</th>
            <th scope="col">Počet použití</th>
            <th scope="col">Počet zbývá</th>
            <th scope="col">poukaz</th>
            <th scope="col">Datum prodeje</th>
            <th scope="col">Poznámka</th>
            <th scope="col">Přidat návštěvu</th>
            <th scope="col">zobrazit návštěvy</th>


        </tr>
        </thead>
        <tbody>
        @foreach($prodane as $row)
            <?php
                $produkt=\App\produkty::where('ID_produkty', $row->produkt)->value("nazev");
                $produkt_pocet=\App\produkty::where('ID_produkty', $row->produkt)->value("pocet_navstev");
                $count = \App\navstevy::where('cislo_poukaz', $row->cislo_poukaz)->count();
                $zbyva = $produkt_pocet - $count;
            ?>
        <tr>
            <th scope="row">{{$row->ID_prodane}}</th>
            <td>{{$produkt}}</td>
            <td>{{$count}}</td>
            <td>{{$zbyva}}</td>
            <td>{{$row->cislo_poukaz}}</td>
            <td>{{$row->datum}}</td>
            <td>{{$row->poznamka}}</td>
            <td><a href="navsteva?cislo={{$row->cislo_poukaz}}">Přidat</td>
            <td>zobrazit</td>
        </tr>
    @endforeach
        </tbody>
    </table>


@endsection

