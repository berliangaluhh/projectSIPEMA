<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function dashboard()
    {
        $total = Pengaduan::count();
        $belumDiproses = Pengaduan::where('status', 'Belum Diproses')->count();
        $diproses = Pengaduan::where('status', 'Diproses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();

        return view('admin.dashboardadmin', compact('total', 'belumDiproses', 'diproses', 'selesai'));
    }

    /**
     * Display all complaints.
     */
    public function datapengaduan(Request $request)
    {
        $search = $request->input('search');

        $pengaduans = Pengaduan::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.datapengaduan', compact('pengaduans'));
    }

    /**
     * Display pending complaints.
     */
    public function belumdiproses()
    {
        $pengaduans = Pengaduan::with('user')
            ->where('status', 'Belum Diproses')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.belumdiproses', compact('pengaduans'));
    }

    /**
     * Display in-progress complaints.
     */
    public function diproses()
    {
        $pengaduans = Pengaduan::with('user')
            ->where('status', 'Diproses')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.diproses', compact('pengaduans'));
    }

    /**
     * Display completed complaints.
     */
    public function selesai()
    {
        $pengaduans = Pengaduan::with('user')
            ->where('status', 'Selesai')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.selesaiadmin', compact('pengaduans'));
    }

    /**
     * Display details for processing.
     */
    public function detailpengaduan($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        return view('admin.detailpengaduan', compact('pengaduan'));
    }

    /**
     * Display completed complaint details.
     */
    public function detailpengaduanselesai($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        return view('admin.detailpengaduanselesai', compact('pengaduan'));
    }

    /**
     * Update complaint status.
     */
    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Belum Diproses,Diproses,Selesai',
        ]);

        $pengaduan->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
