<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;

class C_Sdm extends Controller
{
    public function __construct()
    {
        $this->url_api_dosen = 'https://gateway.telkomuniversity.ac.id/b5f34c2db0d36b68ef987a1a23f50ccb/7/0/0/0/0/0/dosen';
        $this->url_api_tpa = 'https://gateway.telkomuniversity.ac.id/b5f34c2db0d36b68ef987a1a23f50ccb/7/0/0/0/0/0/tpa';
    }

    public function index()
    {
        $total_dosen = 0;
        $jumlah_dosen_perprodi = array(0, 0, 0, 0, 0, 0, 0, 0);
        $jumlah_jfa = array(0, 0, 0, 0, 0);

        // get data
        // kalau pakai session, ada 500 | session error :(
        // $data = Http::withToken(session('token'))->get($this->url_api_dosen)->body();

        // jadi get datanya pakai cara ini
        // get token
        $response = Http::asForm()->post('https://gateway.telkomuniversity.ac.id/issueauth', [
            'username' => session('username'),
            'password' => session('password'),
        ]);

        $data = Http::withToken($response['token'])->get($this->url_api_dosen)->body();

        // hitung jumlah perprodi
        foreach (json_decode($data) as $value) {
            $total_dosen += 1;
            switch ($value->studyprogramname) {
                case 'S1 Informatika':
                    $jumlah_dosen_perprodi[0] += 1;
                    break;
                case 'S1 Teknologi Informasi':
                    $jumlah_dosen_perprodi[1] += 1;
                    break;
                case 'S1 Rekayasa Perangkat Lunak':
                    $jumlah_dosen_perprodi[2] += 1;
                    break;
                case 'S1 Data Sains':
                    $jumlah_dosen_perprodi[3] += 1;
                    break;
                case 'S1 Informatika PJJ':
                    $jumlah_dosen_perprodi[4] += 1;
                    break;
                case 'S2 Informatika':
                    $jumlah_dosen_perprodi[5] += 1;
                    break;
                case 'S2 Ilmu Forensik':
                    $jumlah_dosen_perprodi[6] += 1;
                    break;
                case 'S3 Informatika':
                    $jumlah_dosen_perprodi[7] += 1;
                    break;
            }
        }

        // hitung jumlah per jfa
        foreach (json_decode($data) as $value) {
            switch ($value->academicfuncposition) {
                case 'GB':
                    $jumlah_jfa[0] += 1;
                    break;
                case 'LK':
                    $jumlah_jfa[1] += 1;
                    break;
                case 'L':
                    $jumlah_jfa[2] += 1;
                    break;
                case 'NJFA':
                    $jumlah_jfa[3] += 1;
                    break;
                case 'AA':
                    $jumlah_jfa[4] += 1;
                    break;
            }
        }

        return view('sdm.dashboard', [
            // just for active menu selector
            'title' => 'SDM | Dashboard',
            'barcount' => $jumlah_dosen_perprodi,
            'piecount' => $jumlah_jfa,
            'total_dosen' => $total_dosen,
        ]);
    }

    public function table_dosen()
    {
        $response = Http::asForm()->post('https://gateway.telkomuniversity.ac.id/issueauth', [
            'username' => session('username'),
            'password' => session('password'),
        ]);

        $data = Http::withToken($response['token'])->get($this->url_api_dosen)->body();
        $total_dosen = count(json_decode($data));

        return view('sdm.dosen.table', [
            // just for active menu selector
            'title' => 'SDM | Data Dosen',
            'data' => $data,
            'total_dosen' => $total_dosen,
        ]);
    }

    public function table_dosen_filtered(Request $request)
    {
        $jfa = $request->jfa;
        $prodi = $request->prodi;
        $url = 'https://gateway.telkomuniversity.ac.id/b5f34c2db0d36b68ef987a1a23f50ccb/7/0/0/' . $jfa . '/0/' . $prodi . '/0';

        $response = Http::asForm()->post('https://gateway.telkomuniversity.ac.id/issueauth', [
            'username' => session('username'),
            'password' => session('password'),
        ]);

        $data = Http::withToken($response['token'])->get($url)->body();
        $total_dosen = count(json_decode($data));

        return view('sdm.dosen.table_filtered', [
            // just for active menu selector
            'title' => 'SDM | Data Dosen',
            'data' => $data,
            'total_dosen' => $total_dosen,
            'jfa' => $jfa,
            'prodi' => $prodi,
        ]);
    }

    public function profile_dosen(Request $request)
    {
        $name = $request->name;
        $url = 'https://gateway.telkomuniversity.ac.id/b5f34c2db0d36b68ef987a1a23f50ccb/0/' . $name;

        $response = Http::asForm()->post('https://gateway.telkomuniversity.ac.id/issueauth', [
            'username' => session('username'),
            'password' => session('password'),
        ]);

        $data = Http::withToken($response['token'])->get($url)->body();

        // hitung masa kerja
        $data_decode = json_decode($data);
        $date1 = date_create(now());
        $date2 = date_create($data_decode[0]->workstartdate);
        $difference = date_diff($date1, $date2);

        $masa_kerja = $difference->y . ' tahun, ' . $difference->m . ' bulan, ' . $difference->d . ' hari';

        // jfa
        $jfa = '';
        switch ($data_decode[0]->academicfuncposition) {
            case 'GB':
                $jfa = 'Guru Besar';
                break;
            case 'LK':
                $jfa = 'Lektor Kepala';
                break;
            case 'L':
                $jfa = 'Lektor';
                break;
            case 'NJFA':
                $jfa = 'NJFA';
                break;
            case 'AA':
                $jfa = 'Asisten Ahli';
                break;
        }

        return view('sdm.dosen.profile', [
            'title' => 'SDM | Profile Dosen',
            'data' => $data,
            'masa_kerja' => $masa_kerja,
            'jfa' => $jfa,
        ]);
    }

    public function table_tpa()
    {
        $response = Http::asForm()->post('https://gateway.telkomuniversity.ac.id/issueauth', [
            'username' => session('username'),
            'password' => session('password'),
        ]);

        $data = Http::withToken($response['token'])->get($this->url_api_tpa)->body();

        $total_tpa = count(json_decode($data));
        // dd(count(json_decode($data)));

        return view('sdm.tpa.table', [
            // just for active menu selector
            'title' => 'SDM | Data TPA',
            'data' => $data,
            'total_tpa' => $total_tpa,
        ]);
    }

    public function profile_tpa(Request $request)
    {
        $name = $request->name;
        $unitname = $request->unitname;
        $employmentstatus = $request->employmentstatus;
        $url = 'https://gateway.telkomuniversity.ac.id/b5f34c2db0d36b68ef987a1a23f50ccb/0/' . $name . '/0/0/' . $unitname . '/0/' . $employmentstatus;

        $response = Http::asForm()->post('https://gateway.telkomuniversity.ac.id/issueauth', [
            'username' => session('username'),
            'password' => session('password'),
        ]);

        $data = Http::withToken($response['token'])->get($url)->body();

        // hitung masa kerja
        $data_decode = json_decode($data);
        $date1 = date_create(now());
        $date2 = date_create($data_decode[0]->workstartdate);
        $difference = date_diff($date1, $date2);

        $masa_kerja = $difference->y . ' tahun, ' . $difference->m . ' bulan, ' . $difference->d . ' hari';

        return view('sdm.tpa.profile', [
            'title' => 'SDM | Profile TPA',
            'data' => $data,
            'masa_kerja' => $masa_kerja,
        ]);
    }
}
