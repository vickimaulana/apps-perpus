<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BangunRuangController extends Controller
{
    public function index()
    {
        return view('layouts.bangunruang.index');
    }

    public function kubus(Request $request)
    {
        $sisi = $request->input('sisi');
        $volume = null;
        $luas = null;

        if ($sisi !== null && is_numeric($sisi)) {
            $volume = pow($sisi, 3);
            $luas = 6 * pow($sisi, 2);
        }

        return view('layouts.bangunruang.kubus', compact('sisi', 'volume', 'luas'));
    }

    public function balok(Request $request)
    {
        $p = $request->input('p');
        $l = $request->input('l');
        $t = $request->input('t');
        $volume = null;
        $luas = null;

        if ($p !== null && $l !== null && $t !== null && is_numeric($p) && is_numeric($l) && is_numeric($t)) {
            $volume = $p * $l * $t;
            $luas = 2 * (($p * $l) + ($p * $t) + ($l * $t));
        }

        return view('layouts.bangunruang.balok', compact('p', 'l', 't', 'volume', 'luas'));
    }

    public function limas(Request $request)
    {
        $s = $request->input('s');
        $t = $request->input('t');
        $volume = null;

        if ($s !== null && $t !== null && is_numeric($s) && is_numeric($t)) {
            $volume = (1/3) * pow($s, 2) * $t;
        }

        return view('layouts.bangunruang.limas', compact('s', 't', 'volume'));
    }

    public function tabung(Request $request)
    {
        $r = $request->input('r');
        $t = $request->input('t');
        $volume = null;
        $luas = null;

        if ($r !== null && $t !== null && is_numeric($r) && is_numeric($t)) {
            $volume = (22/7) * pow($r, 2) * $t;
            $luas = 2 * (22/7) * $r * ($r + $t);
        }

        return view('layouts.bangunruang.tabung', compact('r', 't', 'volume', 'luas'));
    }

    public function bola(Request $request)
    {
        $r = $request->input('r');
        $volume = null;
        $luas = null;

        if ($r !== null && is_numeric($r)) {
            $volume = (4/3) * (22/7) * pow($r, 3);
            $luas = 4 * (22/7) * pow($r, 2);
        }

        return view('layouts.bangunruang.bola', compact('r', 'volume', 'luas'));
    }
}
