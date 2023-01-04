<?php

namespace App\Models;

use \CodeIgniter\Model;

class PuPaket extends Model
{
    protected $table = 'pu_paket';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_pu', 'nama', 'sub_nama', 'tipe', 'tgl_berangkat', 'tgl_pulang', 'maskapai', 'lama_perjalanan', 'rute', 'penerbangan', 'visa', 'hotel', 'trasportasi', 'j_makkah', 'j_madinah', 'peziarah', 'harga_double', 'harga_triple', 'harga_quad', 'reservasi', 'gambar', 'catatan', 'populer', 'status', 'draft'];

    public function all()
    {
    }
}
