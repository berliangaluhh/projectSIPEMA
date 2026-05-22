<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    /**
     * Display student dashboard.
     */
    public function dashboard()
    {
        $userId = Auth::id();
        $total = Pengaduan::where('user_id', $userId)->count();
        $diproses = Pengaduan::where('user_id', $userId)->where('status', 'Diproses')->count();
        $selesai = Pengaduan::where('user_id', $userId)->where('status', 'Selesai')->count();

        return view('pengguna.dashboard', compact('total', 'diproses', 'selesai'));
    }

    /**
     * Show complaint submission form.
     */
    public function showPengaduan()
    {
        return view('pengguna.pengaduan');
    }

    /**
     * Store new complaint.
     */
    public function storePengaduan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Fasilitas,Akademik,Pelayanan,Lainnya',
            'deskripsi' => 'required|string',
            'bukti' => 'nullable|file|image|max:5120', // Limit to 5MB
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        }

        Pengaduan::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'bukti' => $buktiPath,
            'status' => 'Belum Diproses',
        ]);

        return redirect('/riwayat')->with('success', 'Pengaduan berhasil dikirim!');
    }

    /**
     * Display user's complaints history.
     */
    public function riwayat()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pengguna.riwayat', compact('pengaduans'));
    }

    /**
     * Display specific complaint details.
     */
    public function detailRiwayat($id)
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())->findOrFail($id);
        return view('pengguna.detailriwayat', compact('pengaduan'));
    }

    /**
     * Display timeline status for all complaints.
     */
    public function status()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pengguna.status', compact('pengaduans'));
    }

    /**
     * Show profile page.
     */
    public function showProfil()
    {
        return view('pengguna.profil');
    }

    /**
     * Show profile edit page.
     */
    public function editProfil()
    {
        return view('pengguna.editprofil');
    }

    /**
     * Update user profile.
     */
    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:users,nim,' . $user->id,
            'program_studi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Fix because model fillable property is lowercase
        $user->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'email' => $request->email,
        ]);

        return redirect('/profil')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Show change password page.
     */
    public function showGantiPassword()
    {
        return view('pengguna.gantipassword');
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/profil')->with('success', 'Password berhasil diubah!');
    }
}
