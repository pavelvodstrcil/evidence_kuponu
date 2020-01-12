<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prodane;
use App\produkty;
use Illuminate\Support\Facades\Redirect;

class prodaneController extends Controller
{
    //
    function add(Request $request)

    {
        $cislo = $request->poukazka;
        $poukaz = prodane::where('cislo_poukaz', '=', $cislo)->first();
        $produkt = produkty::where('ID_produkty', $request->produkt)->first();


        if (empty($poukaz)) {

            $chars = preg_split('//', $cislo, -1, PREG_SPLIT_NO_EMPTY);
            $pocet = $chars[4] . $chars[5];
            $poukazka_produkt = $chars[2] . $chars[3];
            // 2 a 3 -> ID produktu
            // 4 a 5 -> pocet navstev

            //spana poukazaka -> spatne ID a pocet
            if ($poukazka_produkt == $request->produkt) {
                if ($pocet == $produkt->pocet_navstev) {

                    $prodej = new prodane;
                    $prodej->cislo_poukaz = $cislo;
                    $prodej->cena = $request->cena;
                    $prodej->tel = $request->tel;
                    $prodej->email = $request->email;
                    $prodej->datum =date("Y-m-d");
                    $prodej->poznamka = $request->poznamka;
                    $prodej->uzivatel = 1;
                    $prodej->zakaznik = 1;
                    $prodej->produkt = $request->produkt;
                    $prodej->save();
                    return redirect()->back()->with('message', 'Prodej byl úspešný. Kupon: '.$prodej->cislo_poukaz.'. Cena: '.$prodej->cena.'Kč. Produkt: '.$produkt->nazev.' ');
                } else {
                    //spatny pocet na poukazu
                    return Redirect::back()->withErrors(['Kupón ' . $cislo . ' NEZLE použít!!! Špatný počet návštěv!!!']);
                }
            } else {
                //spana poukazaka -> spatne ID
                return Redirect::back()->withErrors(['Kupón ' . $cislo . ' NEZLE použít!!! Byl zvolen špatný, na jinou službu!']);
            }
        } else {

            return Redirect::back()->withErrors(['Kupón ' . $cislo . ' NEZLE prodat!!! Již byl prodán ' . $poukaz->datum . '']);
        }


        return "test";
    }


}
