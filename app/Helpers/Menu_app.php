<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Menu_app
{
    private static function set_menu($module_name = NULL, $title = NULL, $css_class = NULL, $target = NULL)
    {
        $structure = NULL;
        if ($module_name !== NULL || $module_name !== '')
            if ($css_class === NULL) {
                $structure = "<li><a href='" . Url($module_name) . "' " . $target . "><span class='sub-item'></span>" . $title . "</a></li>";
            } else {
                $structure = "<li class='" . $css_class . "'><a href='" . Url($module_name) . "'><span class='sub-item'></span>" . $title . "</a></li>";
            }

        return $structure;
    } 

    private static function parent_dropdown($judul, $icon = NULL)
    {
        $structure = '';
        if ($icon === NULL) {
            $structure .= '<li class="nav-item">
            <a data-toggle="collapse" href="#tables">
                <i class="fas fa-list"></i>
                <p>' . $judul . '</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">';
        } else {
            $structure .= '<li class="nav-item">
            <a data-toggle="collapse" href="#tables">
                <i class="fas fa-' . $icon . '"></i>
                <p>' . $judul . '</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">';
        }
        return $structure;
    }
    public static function tutup_menu()
    {
        $structure = '</ul>
        </div>
    </li>';
        return $structure;
    }

    public static function list_menu()
    {
        $menu = '';
        // 1	Administrator
        // 2	Bidang Renbang	
        // 3	User Satker	  
        $user_id = Auth::user()->id;
        $query   = DB::table('user')
            ->select('user.id', 'user.username', 'tmuser_level.description', 'tmuser_level.mapping_sie', 'tmuser_level.id as level_id')
            ->join('tmuser_level', 'user.tmuser_level_id', '=', 'tmuser_level.id')
            ->where('user.id', $user_id)
            ->get();

        // $session = ($query->level_id) ? $query->level_id :  null; 
        // $menu .= '';
        foreach ($query as $ls) {
            switch ($ls->level_id) {
                case 1:
                    $menu .= '<li class="nav-item">
                    <a data-toggle="collapse" href="#setting">
                        <i class="fas fa-list"></i>
                        <p>Setting Pad </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="setting">
                        <ul class="nav nav-collapse">
                ';
                    $menu .= self::set_menu('pendapatan/target', 'Besaran Target');
                    $menu .= self::set_menu('setuptahunanggaran', 'Tahun Anggaran');
                    $menu .= self::set_menu('settingrek/rek', 'Setting akses user rekening');
                    $menu .= '
                      </ul>
                    </div>
                </li>';
                    $menu .= '<li class="nav-item">
                <a data-toggle="collapse" href="#rekening">
                    <i class="fas fa-database"></i>
                    <p>Rekening </p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="rekening">
                    <ul class="nav nav-collapse">
            ';
                    $menu .= self::set_menu(Url('bapenda/rekening/kodeakun'), 'Kode Akun');
                    $menu .= self::set_menu(Url('bapenda/rekening/kodekelompok'), 'Kode Kelompok');
                    $menu .= self::set_menu(Url('bapenda/rekening/kodejenis'), 'Kode Jenis');
                    $menu .= self::set_menu(Url('bapenda/rekening/kodeobjek'), 'Kode Object');
                    $menu .= self::set_menu(Url('bapenda/rekening/koderincianobjek'), 'Kode Rincian Object');
                    $menu .= self::set_menu(Url('bapenda/rekening/kodesubrincianobjek'), 'Kode Sub Rincian Object');
                    $menu .= '
                  </ul>
                </div>
            </li>'; 
                    $menu .= '<li class="nav-item">
            <a data-toggle="collapse" href="#laporan">
                <i class="fas fa-book"></i>
                <p>Pendapatan Daerah</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="laporan">
                <ul class="nav nav-collapse">';
                    $menu .= self::set_menu('pendapatan', 'Pelaporan Pendapatan (PAD)', '', 'target="content"');
                    $menu .= '
              </ul>
            </div>
        </li>';
                    $menu .= '<li class="nav-item">
        <a data-toggle="collapse" href="#penerimaan">
            <i class="fas fa-file"></i>
            <p>Report</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="penerimaan">
            <ul class="nav nav-collapse">';
                    $menu .= self::set_menu('laporan', 'Laporan Pendapatan'); 
                    $menu .= self::set_menu('laporan/perbulan', 'Laporan Pendapatan Keseluruhan');
                    //$menu .= self::set_menu('report_penerimaan', 'Laporan Penerimaan Per OPD');
                    $menu .= self::set_menu('grafik', 'Grafik Penerimaan');
                    $menu .= '
          </ul>
        </div>
    </li>';
                    //setting 
                    $menu .= '<li class="nav-item">
                    <a data-toggle="collapse" href="#levelakses">
                        <i class="fas fa-user"></i>
                        <p>Pegawai & level akses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="levelakses">
                        <ul class="nav nav-collapse">
                ';
                    $menu .= self::set_menu('pegawai', 'Master Pegawai');
                    $menu .= self::set_menu('user', 'User & Hak akses');
                    $menu .= self::set_menu('akses/level', 'Level Akses');

                    $menu .= '
                      </ul>
                    </div>
                </li>';
                    // 
                    $menu .= '<li class="nav-item">
                <a data-toggle="collapse" href="#identitas">
                    <i class="fas fa-wrench"></i>
                    <p>Identitas Aplikasi</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="identitas">
                    <ul class="nav nav-collapse">';
                    $menu .= self::set_menu('aplikasi/identitas', 'Identitas aplikasi');
                    $menu .= self::set_menu('aplikasi/satker', 'Satuan Kerja');
                    //$menu .= self::set_menu('opd', 'Data Dinas ');
                    $menu .= '
                  </ul>
                </div>
            </li>';
                    break;
                case 2:
                    $menu .= '<li class="nav-item">
                    <a data-toggle="collapse" href="#tmpegawai">
                        <i class="fas fa-user"></i>
                        <p>Master Pegawi & Hak akses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                ';
                    $menu .= self::set_menu('tmuser_level', 'Level Akses');
                    $menu .= self::set_menu('pegawai', 'Master Pegawai');
                    $menu .= '
                      </ul>
                    </div>
                </li>';
                    break; 
                case 3:

                    $menu .= '<li class="nav-item">
                    <a data-toggle="collapse" href="#retribusi">
                        <i class="fa fa-list"></i>
                        <p>Realisasi Pendapatan </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="retribusi">
                        <ul class="nav nav-collapse">';
                    $menu .= self::set_menu('pendapatan', 'Realisasai Pendapatan');
                    $menu .= '
                      </ul>
                    </div>
                </li>';
                    $menu .= '<li class="nav-item">
                <a data-toggle="collapse" href="#target">
                    <i class="fa fa-list"></i>
                    <p>Target Pendapatan.</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="target">
                    <ul class="nav nav-collapse">';
                    $menu .= self::set_menu('pendapatan/target', 'Target Pendapatan.');
                    $menu .= '
                  </ul>
                </div>
            </li>';
                    $menu .= '<li class="nav-item">
                <a data-toggle="collapse" href="#report">
                    <i class="fas fa-database"></i>
                    <p>Report</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="report">
                    <ul class="nav nav-collapse">';
                    $menu .= self::set_menu('laporan', 'Laporan Penerimaan'); 
                    $menu .= self::set_menu('laporan/perbulan', 'Laporan Pendapatan Keseluruhan');
                    $menu .= self::set_menu('grafik', 'Grafik Penerimaan');

                    $menu .= '
                  </ul>
                </div>
            </li>';
                    //setting  
                    //     $menu .= '<li class="nav-item">
                    //     <a data-toggle="collapse" href="#tables">
                    //         <i class="fas fa-table"></i>
                    //         <p>Tables</p>
                    //         <span class="caret"></span>
                    //     </a>
                    //     <div class="collapse" id="tables">
                    //         <ul class="nav nav-collapse">
                    // ';
                    //     $menu .= self::set_menu('tmpegawai', 'Master Pegawai');
                    //     $menu .= self::set_menu('tmuser_level', 'Level Akses');
                    //     $menu .= '
                    //       </ul>
                    //     </div>
                    // </li>';
                    break;

                default:
                    $menu .= '<li>Null Route Menu</li>';
                    break;
            }
        }
        return $menu;
    }
}
