@extends ('layout')

@section('content')

<?php
    if (!empty($_GET['cislo'])){
    $cislo = $_GET['cislo'];
    }

    else{
        $cislo="nevyplneno";
    }
?>


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



<h1 align="center">Zadání návštěvy</h1>


<form class="form-horizontal" method="POST" action="navsteva/add">
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Číslo poukazu:</label>
            <div class="col-md-4">
                <input id="cislo" name="cislo"  value="{{$cislo}}" type="text"  class="form-control input-md">
            </div>
        </div>
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>



        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button  type="submit" name="submit" value="Submit"  class="btn btn-primary">Uložit</button>
            </div>
        </div>

    </fieldset>
</form>





@endsection
