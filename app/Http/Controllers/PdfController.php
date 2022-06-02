<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Hutang;
use App\Models\Budgeting;
use App\Models\Dana_Impian;
use App\Models\Harta;
use App\Models\Harta_Sub;
use App\Models\Saham;
use App\Models\Reksadana;
use App\Models\Bukti_Potong;
use App\Models\SPT_1770SS;
use App\Models\SPT_1770S;

class PdfController extends Controller
{
    //
    public function Pemasukan_PDF(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tgl_start = $request->pilStart;
        $tgl_end   = $request->pilEnd;

        if($tgl_start == "" || $tgl_end == "")
        {
            $pemasukan    =\DB::select("SELECT *, coa_sub.nama as Jenis from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan where pemasukan.Tanggal and ID_WP ='".$id_wp."' and pemasukan.show_status = 1 order by pemasukan.Tanggal");
            $data = [
                        'title' => 'Export Pemasukan',
                        'rec' => $pemasukan
                    ];
        }
        else
        {
            $pemasukan    =\DB::select("SELECT *, coa_sub.nama as Jenis from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan where pemasukan.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and ID_WP ='".$id_wp."' and pemasukan.show_status = 1 order by pemasukan.Tanggal");
    	    $data = [
                    'title' => 'Export Pemasukan ' . '<br> Tanggal : ' . $tgl_start . " - " . $tgl_end,
                    'rec' => $pemasukan
                ];
        }
        $pdf = PDF::loadView('WP.PDF.Pemasukan_PDF', $data);

        return $pdf->download('ContohGenerate.pdf');
    }

    public function Pengeluaran_PDF(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tgl_start = $request->pilStart;
        $tgl_end   = $request->pilEnd;

        if($tgl_start == "" || $tgl_end == "")
        {
            $pengeluaran            =\DB::select("SELECT pengeluaran.* , sumber_dana.Jenis as sdj, sumber_dana.Inisial as sdi, coa.Nama as cn, coa_sub.Nama as scn
                                                FROM pengeluaran, sumber_dana, coa, coa_sub
                                                WHERE pengeluaran.ID_WP = '".$id_wp."' and
                                                pengeluaran.Sumber_Dana = Sumber_Dana.ID_Record and
                                                pengeluaran.Nomor_Perkiraan = coa.Nomor_Perkiraan and
                                                pengeluaran.Sub_Nomor_Perkiraan = coa_sub.ID and pengeluaran.show_status = 1");
            $data = [
                        'title' => 'Export Pengeluaran',
                        'rec' => $pengeluaran
                    ];
        }
        else
        {
            $pengeluaran            =\DB::select("SELECT pengeluaran.* , sumber_dana.Jenis as sdj, sumber_dana.Inisial as sdi, coa.Nama as cn, coa_sub.Nama as scn
                                                FROM pengeluaran, sumber_dana, coa, coa_sub
                                                WHERE pengeluaran.ID_WP = '".$id_wp."' and
                                                pengeluaran.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and
                                                pengeluaran.Sumber_Dana = Sumber_Dana.ID_Record and
                                                pengeluaran.Nomor_Perkiraan = coa.Nomor_Perkiraan and
                                                pengeluaran.Sub_Nomor_Perkiraan = coa_sub.ID and pengeluaran.show_status = 1");
    	    $data = [
                    'title' => 'Export Pengeluaran ' . '<br> Tanggal : ' . $tgl_start . " - " . $tgl_end,
                    'rec' => $pengeluaran
                ];
        }
        $pdf = PDF::loadView('WP.PDF.Pengeluaran_PDF', $data);

        return $pdf->download('ContohGenerate.pdf');
    }

    public function Hutang_PDF(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tgl_start = $request->pilStart;
        $tgl_end   = $request->pilEnd;

        if($tgl_start == "" || $tgl_end == "")
        {
            $hutang    =\DB::select("SELECT * from hutang where ID_WP ='".$id_wp."' and show_status = '1' order by hutang.Tanggal");
            $data = [
                        'title' => 'Export Hutang',
                        'rec' => $hutang
                    ];
        }
        else
        {
            $hutang    =\DB::select("SELECT * from hutang where ID_WP ='".$id_wp."' and hutang.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and show_status = '1' order by hutang.Tanggal");
    	    $data = [
                    'title' => 'Export Hutang ' . "<br>". ' Tanggal : ' . $tgl_start . " - " . $tgl_end,
                    'rec' => $hutang
                ];
        }
        $pdf = PDF::loadView('WP.PDF.Hutang_PDF', $data);

        return $pdf->download('ContohGenerate.pdf');
    }

    public function Aset_PDF(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tgl_start = $request->pilStart;
        $tgl_end   = $request->pilEnd;

        if($tgl_start == "" || $tgl_end == "")
        {
            $aset               =\DB::select("select harta.*, coa_sub.nama as jenis, coa.Nama as nama_katbesar from harta LEFT JOIN coa_sub on coa_sub.id = harta.Kategori_Sub_Harta LEFT JOIN coa on coa.Nomor_Perkiraan = harta.Kategori_Harta where harta.ID_WP ='".$id_wp."' and harta.show_status=1 order by harta.Tanggal");

            $array =
            [
                'Tanggal' => [],
                'jenis' => [],
                'nama_katbesar' => [],
                'Nilai' => [],
                'Deskripsi' => [],
                'Keterangan' => [],
            ];

            foreach($aset as $rowaset)
            {
                array_push($array['Tanggal'], $rowaset->Tanggal);
                array_push($array['jenis'], $rowaset->jenis);
                array_push($array['nama_katbesar'], $rowaset->nama_katbesar);
                array_push($array['Nilai'], $rowaset->Nilai);
                $detail_aset = \DB::select("select * from harta_sub where ID_Parent = '". $rowaset ->ID_Record."' and ID_WP ='".$id_wp."' ");
                foreach($detail_aset as $rowdetail_aset)
                {
                    if($rowdetail_aset->Jenis == "Tahun")
                    {
                        array_push($array['Deskripsi'], $rowdetail_aset->Deskripsi);
                    }
                }
                array_push($array['Keterangan'], $rowaset->Keterangan);
            }

            $data = [
                        'title' => 'Export Aset',
                        'rec' => $array
                    ];
        }
        else
        {
            $aset               =\DB::select("select harta.*, coa_sub.nama as jenis, coa.Nama as nama_katbesar from harta LEFT JOIN coa_sub on coa_sub.id = harta.Kategori_Sub_Harta LEFT JOIN coa on coa.Nomor_Perkiraan = harta.Kategori_Harta where harta.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and harta.ID_WP ='".$id_wp."' and harta.show_status=1 order by harta.Tanggal");

            $array =
            [
                'Tanggal' => [],
                'jenis' => [],
                'nama_katbesar' => [],
                'Nilai' => [],
                'Deskripsi' => [],
                'Keterangan' => [],
            ];

            foreach($aset as $rowaset)
            {
                array_push($array['Tanggal'], $rowaset->Tanggal);
                array_push($array['jenis'], $rowaset->jenis);
                array_push($array['nama_katbesar'], $rowaset->nama_katbesar);
                array_push($array['Nilai'], $rowaset->Nilai);
                $detail_aset = \DB::select("select * from harta_sub where ID_Parent = '". $rowaset ->ID_Record."' and ID_WP ='".$id_wp."' ");
                foreach($detail_aset as $rowdetail_aset)
                {
                    if($rowdetail_aset->Jenis == "Tahun")
                    {
                        array_push($array['Deskripsi'], $rowdetail_aset->Deskripsi);
                    }
                }
                array_push($array['Keterangan'], $rowaset->Keterangan);
            }

            $data = [
                        'title' => 'Export Aset',
                        'rec' => $array
                    ];
        }
        $pdf = PDF::loadView('WP.PDF.Aset_PDF', $data);

        return $pdf->download('ContohGenerate.pdf');
    }

    function abc()
    {
        echo "hai hai hai";
    }
}
