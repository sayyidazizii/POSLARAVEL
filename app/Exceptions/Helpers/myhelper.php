<?php

use App\Penjualan;
use Carbon\Carbon;
function no_invoice(){
    $cek_kode_hari_ini = penjualan::whereDate('created_at', Carbon::today())->count(); // 0
    if ($cek_kode_hari_ini == 0){
        $kode_penjualan = 'LM'. date('dmy'). '0001';
        return $kode_penjualan;
    } else{

    }
}
