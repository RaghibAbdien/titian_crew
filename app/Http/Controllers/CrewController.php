<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\Lokasi;
use App\Models\Crew;
use App\Models\Dokumen;
use App\Models\Notification;
use Illuminate\Support\Carbon;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $lokasis = Lokasi::all();
        $crews = Crew::all();
        $docs = Dokumen::join('crews', 'dokumens.id_crew', '=', 'crews.id_crew')
        ->select('dokumens.*', 'crews.id_crew')
        ->get();
        $notifs = Notification::join('crews', 'notifications.id_crew', '=', 'crews.id_crew')
        ->where('notifications.is_read', false)
        ->select('notifications.*', 'crews.nama_crew')
        ->get();
        $NotifNotReadNum = Notification::where('is_read', false)->count();
        return view('crew', compact('crews', 'docs', 'notifs', 'NotifNotReadNum', 'lokasis') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    DB::beginTransaction();

    try {
        $request->validate([
            'id_crew' => 'required|string|max:16|unique:crews|regex:/^\d+$/',
            'nama_crew' => 'required|string|max:50|regex:/^[a-zA-Z\s]+$/',
            'alamat_crew' => 'required|string',
            'email_crew' => 'required|email|max:50|unique:crews',
            'nohp_crew' => 'required|string|min:12|max:13|unique:crews|regex:/^\d+$/',
            'lokasi_crew_id' => 'required|exists:lokasi,id',
            'cv_path' => 'required|mimes:pdf|max:2048',
            'ktp_path' => 'required|mimes:pdf|max:2048',
            'vaksin_path.*' => 'required|mimes:pdf',
            'pkwt_path' => 'required|mimes:pdf|max:2048',
            'sertifikat_path.*' => 'required|mimes:pdf',
            'ijazah_path' => 'required|mimes:pdf|max:2048',
            'foto-crew_path' => 'required|mimes:jpeg,jpg,png',
            'npwp_path' => 'required|mimes:pdf|max:2048',
            'skck_path' => 'required|mimes:pdf|max:2048',
            'no_rekening' => 'required|min:10|max:16|unique:dokumens|regex:/^\d+$/',
            'mcu_path' => 'required|mimes:pdf|max:2048',
            'tgl_mcu' => 'required|date',
            'expired_mcu' => 'required|date|after_or_equal:tgl_mcu',
            'awal_kontrak' => 'required|date',
            'berakhir_kontrak' => 'required|date|after_or_equal:awal_kontrak',
        ],
        [
            'expired_mcu.after_or_equal' => 'The expired_mcu date must be a date after or equal to tgl_mcu.',
            'berakhir_kontrak.after_or_equal' => 'The berakhir_kontrak date must be a date after or equal to awal_kontrak.',
        ]
        );

        // Ambil input dari request
        $nama = $request->input('nama_crew');
        $warn_mcu = Carbon::parse($request->input('expired_mcu'))->subMonths(1);
        $warn_kontrak = Carbon::parse($request->input('berakhir_kontrak'))->subMonths(1);

        // Dapatkan file  dari request
        $cvFile = $request->file('cv_path');
        $ktpFile = $request->file('ktp_path');
        $vaksinFiles = $request->file('vaksin_path.*');
        $pkwtFile = $request->file('pkwt_path');
        $sertifikatFiles = $request->file('sertifikat_path.*');
        $ijazahFile = $request->file('ijazah_path');
        $fotoFile = $request->file('foto-crew_path');
        $npwpFile = $request->file('npwp_path');
        $skckFile = $request->file('skck_path');
        $mcuFile = $request->file('mcu_path');

        // Tentukan nama file baru dengan nama input dan ekstensi asli
        $cvFileName = $nama . '_cv.' . $cvFile->getClientOriginalExtension();
        $ktpFileName = $nama . '_ktp.' . $ktpFile->getClientOriginalExtension();
        $pkwtFileName = $nama . '_pkwt.' . $pkwtFile->getClientOriginalExtension();
        $ijazahFileName = $nama . '_ijazah.' . $ijazahFile->getClientOriginalExtension();
        $fotoFileName = $nama . '_foto.' . $fotoFile->getClientOriginalExtension();
        $npwpFileName = $nama . '_npwp.' . $npwpFile->getClientOriginalExtension();
        $skckFileName = $nama . '_skck.' . $skckFile->getClientOriginalExtension();
        $mcuFileName = $nama . '_mcu.' . $mcuFile->getClientOriginalExtension();
 
        // Simpan file ke penyimpanan
        $cvPath = $cvFile->storeAs('public/uploads/cv', $cvFileName);
        $ktpPath = $ktpFile->storeAs('public/uploads/ktp', $ktpFileName);
        $pkwtPath = $pkwtFile->storeAs('public/uploads/pkwt', $pkwtFileName);
        $ijazahPath = $ijazahFile->storeAs('public/uploads/ijazah', $ijazahFileName);
        $fotoPath = $fotoFile->storeAs('public/uploads/foto', $fotoFileName);
        $npwpPath = $npwpFile->storeAs('public/uploads/npwp', $npwpFileName);
        $skckPath = $skckFile->storeAs('public/uploads/skck', $skckFileName);
        $mcuPath = $mcuFile->storeAs('public/uploads/mcu', $mcuFileName);
 

        // Simpan multiple file vaksin dan sertifikat sebagai array JSON
        $vaksinPaths = [];
        if(!empty($vaksinFiles)) {
            if(is_array($vaksinFiles)) {
                // Jika lebih dari 1 file unggahan
                foreach ($vaksinFiles as $index => $vaksinFile) {
                    $vaksinFileName = $nama . '_vaksin_' . $index+1 . '.' . $vaksinFile->getClientOriginalExtension();
                    $vaksinPaths[] = $vaksinFile->storeAs('public/uploads/vaksin', $vaksinFileName);
                }
            } else {
                // Jika hanya 1 file unggahan
                $vaksinFileName = $nama . '_vaksin' .$vaksinFiles->getClientOriginalExtension();
                $vaksinPaths[] = $vaksinFiles->storeAs('public/uploads/vaksin', $vaksinFileName);
            }
        }


        $sertifikatPaths = [];
        if (!empty($sertifikatFiles)) {
            if (is_array($sertifikatFiles)) {
                // Jika lebih dari satu file diunggah
                foreach ($sertifikatFiles as $index => $sertifikatFile) {
                    $sertifikatFileName = $nama . '_sertifikat_' . $index+1 . '.' . $sertifikatFile->getClientOriginalExtension();
                    $sertifikatPaths[] = $sertifikatFile->storeAs('public/uploads/sertifikat', $sertifikatFileName);
                }
            } else {
                // Jika hanya satu file diunggah
                $sertifikatFileName = $nama . '_sertifikat.' . $sertifikatFiles->getClientOriginalExtension();
                $sertifikatPaths[] = $sertifikatFiles->storeAs('public/uploads/sertifikat', $sertifikatFileName);
            }
        }


        // Buat record baru di tabel crews
        Crew::create([
            'id_crew' => $request->input('id_crew'),
            'nama_crew' => $request->input('nama_crew'),
            'alamat_crew' => $request->input('alamat_crew'),
            'email_crew' => $request->input('email_crew'),
            'nohp_crew' => $request->input('nohp_crew'),
            'lokasi_crew_id' => $request->input('lokasi_crew_id'),
        ]);

        Dokumen::create([
            'id_crew' => $request->input('id_crew'),
            'cv_path' => $cvPath, 
            'ktp_path' => $ktpPath,
            'vaksin_path' => json_encode($vaksinPaths),
            'pkwt_path' => $pkwtPath,
            'sertifikat_path' => json_encode($sertifikatPaths),
            'ijazah_path' => $ijazahPath,
            'foto-crew_path' => $fotoPath,
            'npwp_path' => $npwpPath,
            'skck_path' => $skckPath,
            'mcu_path' => $mcuPath,
            'tgl_mcu' => $request->input('tgl_mcu'),
            'expired_mcu' => $request->input('expired_mcu'),
            'warn_mcu' => $warn_mcu,
            'awal_kontrak' => $request->input('awal_kontrak'),
            'berakhir_kontrak' => $request->input('berakhir_kontrak'),
            'no_rekening' => $request->input('no_rekening'),
            'warn_kontrak' => $warn_kontrak,
        ]);

        DB::commit();

        return redirect()->route('crew')->with('success', 'Data berhasil ditambahkan');
    } catch (ValidationException $e) {
        // Jika terjadi kesalahan validasi, kembali ke halaman sebelumnya dengan pesan kesalahan
        return redirect()->back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        // Jika terjadi kesalahan lain, kembali ke halaman sebelumnya dengan pesan kesalahan umum
        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage())->withInput();
    }
}


    /**
     * Show the form for editing the specified resource.
     */
    public function UpdateNotif(Request $request)
    {
        $notification = Notification::find($request->id);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Notification not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
