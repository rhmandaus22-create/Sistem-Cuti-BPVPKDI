<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveApplication;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class LeaveFormController extends Controller
{
    public function dashboard()
    {
        $history = LeaveApplication::orderBy('created_at', 'desc')->simplePaginate(10);
        $total = LeaveApplication::count();
        $disetujui = LeaveApplication::where('status', 'Disetujui')->count();
        $menunggu = LeaveApplication::where('status', 'Menunggu')->count();
        $ditolak = LeaveApplication::where('status', 'Ditolak')->count();

        return view('dashboard', compact('history', 'total', 'disetujui', 'menunggu', 'ditolak'));
    }

    public function index()
    {
        return view('leave-form');
    }

    public function submit(Request $request)
    {
        LeaveApplication::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'jenis_cuti' => $request->jenis_cuti_text,
            'alasan' => $request->alasan,
            'mulai' => $request->mulai,
            'sampai' => $request->sampai,
            'status' => 'Menunggu'
        ]);

        return redirect()->route('dashboard')->with('success', 'Pengajuan cuti berhasil dikirim!');
    }

    public function edit($id)
    {
        $leave = LeaveApplication::findOrFail($id);
        return view('edit-leave', compact('leave'));
    }

    public function update(Request $request, $id)
    {
        $leave = LeaveApplication::findOrFail($id);
        $leave->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Data pengajuan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $leave = LeaveApplication::findOrFail($id);
        $leave->delete();

        return redirect()->route('dashboard')->with('success', 'Data pengajuan berhasil dihapus!');
    }

    public function izinCuti() { return view('izin-pelaksanaan-cuti'); }
    public function downloadWord(Request $request) { return response()->json(['msg' => 'download']); }
}
