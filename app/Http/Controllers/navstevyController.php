<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prodane;
use App\navstevy;
use Illuminate\Support\Facades\Redirect;


class navstevyController extends Controller
{
    function add(Request $request)
    {

        $cislo = $request->cislo;
        $prodany = prodane::where('cislo_poukaz', $cislo)->first();
        if(empty($prodany))
        {
            return Redirect::back()->withErrors(['Takový poukaz NEBYL prodán - prosím o kontrolu!']);
        }
        else
        {
            $produkt = prodane::where('cislo_poukaz', $cislo)->value("produkt");
            $produkt_pocet=\App\produkty::where('ID_produkty', $produkt)->value("pocet_navstev");
            $count = \App\navstevy::where('cislo_poukaz', $cislo)->count();
            $zbyva = $produkt_pocet - $count;

            if ($zbyva == 0){
                return Redirect::back()->withErrors(['Kupón je VYČERPANÝ!!! Návštěva nebyla zadána - prosím o fyzickou kontrolu kopónu!!! ']);
            }else {

                $navsteva = new navstevy;

                $navsteva->cislo_poukaz = $cislo;

                $navsteva->save();
                $zbyvaNove = $zbyva-1;
                return redirect()->back()->with('message', 'Návštěva úspěšně zadána - zbývá '.$zbyvaNove.' návštěv. Nezapomeň udělat dirku do kupónu!!!!');
            }
        }

    }
}
