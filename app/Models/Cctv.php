<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    use HasFactory;

    protected $table = 't_cctv'; // Nama tabel di database

    protected $primaryKey = 'fc_id'; // Primary key

    public $incrementing = true; // Auto increment

    protected $keyType = 'int'; // Tipe data primary key

    public $timestamps = true; // Jika tabel menggunakan timestamps

    protected $fillable = [
        'fc_id_cctv',
        'fv_divisi',
        'fv_sys_type',
        'fv_principle',
        'fv_branch_Name',
        'fv_anydesk',
        'fv_teamviewer',
        'fv_ultraviewer',
        'fv_link_add',
        'fv_link_temp',
        'fc_user_it',
        'fc_password_it',
        'fc_user_sysadm',
        'fc_password_sysadm',
        'fv_status_hdd_ext',
        'fc_username',
        'fc_serial',
        'fc_user',
        'fc_password',
        'fn_qty_cam',
        'fc_region',
        'fc_status',
        'fv_ket_error'
    ];
}
