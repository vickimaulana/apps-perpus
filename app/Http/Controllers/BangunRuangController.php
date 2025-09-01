<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BangunRuangController extends Controller
{
    public function BangunRuang(Request $request)
    {
        // Kubus
        $sisi = $request->input('sisi');
        $volume = null;
        $luas = null;
        if ($sisi !== null && is_numeric($sisi)) {
            $volume = pow($sisi, 3);
            $luas = 6 * pow($sisi, 2);
        }

        // Balok
        $p = $request->input('p');
        $l = $request->input('l');
        $t = $request->input('t');
        $vol_balok = null;
        $lp_balok = null;
        if ($p !== null && $l !== null && $t !== null && is_numeric($p) && is_numeric($l) && is_numeric($t)) {
            $vol_balok = $p * $l * $t;
            $lp_balok = 2 * (($p * $l) + ($p * $t) + ($l * $t));
        }

        // Limas Segi Empat
        $s_limas = $request->input('s_limas');
        $t_limas = $request->input('t_limas');
        $vol_limas = null;
        if ($s_limas !== null && $t_limas !== null && is_numeric($s_limas) && is_numeric($t_limas)) {
            $luas_alas = pow($s_limas, 2);
            $vol_limas = (1/3) * $luas_alas * $t_limas;
        }

        // Tabung
        $r_tabung = $request->input('r_tabung');
        $t_tabung = $request->input('t_tabung');
        $vol_tabung = null;
        $lp_tabung = null;
        if ($r_tabung !== null && $t_tabung !== null && is_numeric($r_tabung) && is_numeric($t_tabung)) {
            $vol_tabung = (22/7) * pow($r_tabung, 2) * $t_tabung;
            $lp_tabung = 2 * (22/7) * $r_tabung * ($r_tabung + $t_tabung);
        }

        // Bola
        $r_bola = $request->input('r_bola');
        $vol_bola = null;
        $lp_bola = null;
        if ($r_bola !== null && is_numeric($r_bola)) {
            $vol_bola = (4/3) * (22/7) * pow($r_bola, 3);
            $lp_bola = 4 * (22/7) * pow($r_bola, 2);
        }

        return view('layout.bangunruang', compact(
            'sisi', 'volume', 'luas',
            'p', 'l', 't', 'vol_balok', 'lp_balok',
            's_limas', 't_limas', 'vol_limas',
            'r_tabung', 't_tabung', 'vol_tabung', 'lp_tabung',
            'r_bola', 'vol_bola', 'lp_bola'
        ));
    }
}
