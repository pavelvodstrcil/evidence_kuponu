@extends ('layout')

@section('content')


    <?php
    $produkty= \App\produkty::all();
    use App\prodane;

    function getplatnost($value){
       if ($value == 1)
           {
               return "Ano";
           }else
               {
                   return "Neplatné - nelze prodat!";
               }

    }
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Název</th>
            <th scope="col">Cena</th>
            <th scope="col">Počet prodaných</th>
            <th scope="col">Prodat</th>
            <th scope="col">Platnost</th>



        </tr>
        </thead>
        <tbody>
        @foreach($produkty as $row)
            <?php
            $pocet = prodane::where("produkt", $row->ID_produkty)->count();
            ?>
            <tr>
                <td>{{$row->nazev }}</td>
                <td>{{$row->cena}}</td>
                <td>{{$pocet}}</td>
                <td><a href="prodej?cislo={{$row->ID_produkty}}">PRODAT </a></td>
                <td>{{getplatnost($row->platnost)}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
<p align="center">Cena jde v dalším kroku změnit - zde je jen "ceníková"!</p>

    @endsection
