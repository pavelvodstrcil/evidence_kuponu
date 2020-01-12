@extends ('layout')

@section('content')


    <?php
        use App\produkty;

    if (!empty($_GET['cislo'])){
        $cislo = $_GET['cislo'];
        $produkt= produkty::find($cislo);
        $message = "Prodej:".$produkt->nazev;
        //echo "bude se prodavat ID".$produkt->nazev;
    }

    else{
        $cislo;
        $message = "Nebyl vybrán žádný produkt!";

    }
    ?>


<h3 align="center">{{$message}}</h3>



    @if($errors->any())
        <div align="center" class="alert alert-danger">
            {{$errors->first()}}
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif




    @if (!empty($produkt))
        <form class="form-horizontal" method="GET" action="prodej/next">


            <!-- Form Name -->
            <legend>Prodej nové poukázky</legend>

            <!-- Select Basic -->
 <!--           <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Artikl </label>
                <div class="col-md-4">
                    <select id="selectbasic" name="selectbasic" class="form-control">
                        <option value="1">Option one</option>
                        <option value="2">Option two</option>
                    </select>
                </div>
            </div>
-->


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="poukazka">Číslo poukázky</label>
                <div class="col-md-4">
                    <input id="poukazka" name="poukazka" type="text"  maxlength="10"  minlength="10" placeholder="10 čísel, vyber prosím správnou" class="form-control input-md"  required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cena">Cena</label>
                <div class="col-md-4">
                    <input id="cena" name="cena" type="text" value="{{$produkt->cena}}" class="form-control input-md" required="">
                    <span class="help-block">Předvyplněná cena se dá změnit!</span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tel">Telefonní kontakt</label>
                <div class="col-md-4">
                    <input id="tel" name="tel" type="text" placeholder="Tel na zákazníka " class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">E-mail</label>
                <div class="col-md-4">
                    <input id="email" name="email" type="text" placeholder="Email - není povinný" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="poznamka">Poznámka</label>
                <div class="col-md-4">
                    <input id="poznamka" name="poznamka" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <input type="hidden" value="{{$cislo}}" name="produkt">

            <!-- Button -->
            <div class="form-group">
                 <div class="col-md-4">
                     <button  type="submit" name="submit" value="Submit"  class="btn btn-primary">Další</button>
                </div>
            </div>


    </form>


@endif







    NEZAPOMEN kontorlova, ze ma 10 znaku -> bude se vracet



@endsection
