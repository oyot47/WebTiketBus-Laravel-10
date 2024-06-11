<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Jadwal;
use App\Models\Kota;
use App\Models\Route;
use App\Models\Terminal;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class AdminController extends Controller
{
    
function index()
{
    $userCount = User::where('role', 'user')->count();
    $adminCount = User::where('role', 'admin')->count();
    $kotaCount = Kota::count();
    $terminalCount = Terminal::count();
    $busCount = Bus::count();
    $routeCount = Route::count();
    $jadwalcount = Jadwal::count();

    // Hitung jumlah pembayaran yang masih pending
    $pendingCount = Pembayaran::where('status', 'pending')->count();

    // Hitung jumlah pembayaran yang sudah diterima
    $acceptCount = Pembayaran::where('status', 'accepted')->count();

    // Hitung total keuntungan
    $totalKeuntungan = Pembayaran::where('status', 'accepted')->sum('jumlah');

    $users = User::where('role', 'admin')->get();

    return view('admin.homepage', compact('userCount', 'users', 'kotaCount', 'adminCount', 'terminalCount', 'busCount', 'routeCount', 'jadwalcount', 'pendingCount', 'acceptCount', 'totalKeuntungan'));
}

    public function homepage()
    {
        $users = User::all(); // 
        return view('admin.homepage', ['users' => $users]);
    }


    function user()
    {
        return view('home');
    }

    function userlog()
    {
        $terminal = Terminal::all(); // Mengambil semua data terminal
        $kota = Kota::all(); // Mengambil semua data kota

        // Mengirim data terminal dan kota ke view userlog.blade.php
        return view('user.homepage', ['terminal' => $terminal, 'kota' => $kota]);
    }

    public function adminview()
    {
        $users = User::where('role', 'admin')->get();
        return view('..\admin\users\adminview', compact('users'));
    }

    public function userview()
    {
        $users = User::where('role', 'user')->get();
        return view('..\admin\users\userview', compact('users'));
    }


    public function halcreate()
    {
        return view('..\admin\users\datauser\admincreate');
    }

    public function halcreateuser()
    {
        return view('..\admin\users\datauser\usercreate');
    }

    public function edit(Request $request,$id )
    {
        $data = User::find($id);
        
        return view('admin.users.datauser.edit',compact('data'));

    }

    public function useredit(Request $request,$id )
    {
        $data = User::find($id);
        
        return view('admin.users.datauser.useredit',compact('data'));
    }


    public function kotaview(Request $request)
    {
        $query = $request->input('q');
        $cities = Kota::query(); 

        if ($query) {
            $cities->where('nama', 'like', '%' . $query . '%');
        }

        $cities = $cities->get();

        return view('admin.bus.kotaview', compact('cities'));
    }

    public function halcreatekota()
    {
        return view('..\admin\bus\sesi\kotacreate');
    }

    public function terminalview()
    {
        $terminal = Terminal::all();
        return view('admin.bus.terminalview', compact('terminal'));
    }

    public function halcreateterminal()
    {
        $cities = Kota::all();
        return view('..\admin\bus\sesi\terminalcreate', compact('cities'));
    }

    public function editkota(Request $request,$id)
    {
        // Temukan kota berdasarkan ID
        $kota = Kota::findOrFail($id);
        
        // Tampilkan halaman edit dengan data kota yang sesuai
        return view('admin.bus.sesi.kotaedit', compact('kota'));
    }

    public function editterminal(Request $request,$id)
    {
        $terminal = Terminal::findOrFail($id);
        $kota = Kota::all();
        
        return view('admin.bus.sesi.terminaledit', compact('terminal','kota'));
    }

    public function halcreatebus()
    {
        $bus = Bus::all();
        return view('..\admin\bus\sesi\buscreate', compact('bus'));
    }


    public function busview()
    {
        $bus = Bus::all();
        return view('admin.bus.busview', compact('bus'));
    }

    public function editbus(Request $request,$id)
    {
        $bus = Bus::findOrFail($id);
        
        
        return view('admin.bus.sesi.busedit', compact('bus'));
    }

    public function routeview()
    {
        $routes = Route::all();
        return view('admin.bus.routeview', compact('routes'));
    }

    public function halcreateroute()
    {
        $terminal = Terminal::all();
        return view('..\admin\bus\sesi\routecreate', compact('terminal'));
    
    }

    public function editroute(Request $request,$id)
    {
        $routes = Route::findOrFail($id);
        $terminal = Terminal::all();
        return view('admin.bus.sesi.routeedit', compact('routes', 'terminal'));
    }

    public function jadwalview()
    {
        $kota = Kota::all();
        $terminal = Terminal::all();
        $bus = Bus::all();
        $jadwal = Jadwal::all();
    
        return view('admin.bus.jadwalview', compact('kota', 'terminal', 'bus','jadwal'));
    }

    public function halcreatejadwal()
    
    {
        $kota = Kota::all();
        $bus = Bus::all();
        $selectedCityId = null; // Inisialisasi variable untuk menyimpan ID kota yang dipilih
        $terminals = collect(); // Inisialisasi koleksi terminal

        // Cek apakah ada kota yang dipilih
        if (request()->has('kota_asal_id')) {
            $selectedCityId = request('kota_asal_id');
            // Ambil terminal berdasarkan kota yang dipilih
            $terminals = Terminal::where('kota_id', $selectedCityId)->get();
        }

        return view('..\admin\bus\sesi\jadwalcreate', compact('kota', 'bus', 'selectedCityId', 'terminals'));
    }

    public function getTerminalsByCity($cityId)
    {
        $terminals = Terminal::where('kota_id', $cityId)->get();
        return response()->json($terminals);
    }

    public function jadwaldetail($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $bus = $jadwal->bus;
        
        // Pisahkan string fasilitas menjadi sebuah array
        $fasilitasArray = explode(', ', $bus->fasilitas);
    
        return view('..\admin\bus\sesi\jadwaldetail', [
            'jadwal' => $jadwal,
            'fasilitasArray' => $fasilitasArray,
        ]);
    }

    public function editjadwal($id)
    {
        $jadwal = Jadwal::find($id);
        $kota = Kota::all();
        $bus = Bus::all();
        $selectedCityId = $jadwal->kota_asal_id ?? null; // Menyimpan ID kota yang dipilih, jika sebelumnya sudah ada
        $terminals = collect(); // Inisialisasi koleksi terminal

        // Cek apakah ada kota yang dipilih dari form sebelumnya
        if (request()->has('kota_asal_id')) {
            $selectedCityId = request('kota_asal_id');
            // Ambil terminal berdasarkan kota yang dipilih
            $terminals = Terminal::where('kota_id', $selectedCityId)->get();
        } elseif ($selectedCityId) {
            // Jika kota asal sudah ada sebelumnya, pilih terminal berdasarkan kota asal default
            $terminals = Terminal::where('kota_id', $selectedCityId)->get();
        }

        // Mengirim data jadwal, kota, terminal, dan bus ke tampilan jadwaledit.blade.php
        return view('admin.bus.sesi.jadwaledit', compact('jadwal', 'kota', 'terminals', 'bus', 'selectedCityId'));
    }
    

    public function tes()
    {
        $jadwal = Jadwal::all();

        // Mengonversi string fasilitas menjadi array untuk setiap jadwal
        foreach ($jadwal as $j) {
            $j->fasilitasArray = explode(', ', $j->bus->fasilitas);
        }
    
        return view('admin.bus.tes', compact('jadwal'));
        
    }

    public function cari(Request $request)
{
    $jadwal = Jadwal::whereHas('kotaAsal', function ($query) use ($request) {
            $query->where('nama', $request->from);
        })
        ->whereHas('kotaTujuan', function ($query) use ($request) {
            $query->where('nama', $request->to);
        })
        ->whereDate('tanggal_keberangkatan', $request->date)
        ->get(); // Saya menambahkan ->get() di sini

    foreach ($jadwal as $j) {
        $j->fasilitasArray = explode(', ', $j->bus->fasilitas);
    }
    
    Date::setLocale('id'); // Atur bahasa menjadi Indonesia
    $tanggal_keberangkatan = Date::parse($request->date)->format('l, j F Y');

    // Menggabungkan semua variabel ke dalam satu array
    $data = [
        
        'jadwal' => $jadwal,
        'from' => $request->from,
        'to' => $request->to,
        'tanggal_keberangkatan' => $tanggal_keberangkatan,
        'seats' => $request->seats,
    ];

    // Mengirimkan data ke view
    return view('user.tiketbus', $data);
}

public function pesan()
{
    return view('user.pemesanan.pesan');
}

public function pesanview(Request $request)
{
    $jadwal_id = $request->input('jadwal_id');
    $seats = $request->input('seats');

    return view('user.pemesanan.pesan', ['jadwal_id' => $jadwal_id, 'seats' => $seats]);
}


public function pembayaranview($id_transaksi)
{
    // Temukan transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id_transaksi);

    // Temukan data transaksi berdasarkan user_id dan jadwal_id yang sama
    $transaksiLain = Transaksi::where('user_id', $transaksi->user_id)
                         ->where('jadwal_id', $transaksi->jadwal_id)
                         ->get();

    // Inisialisasi array kosong untuk nama dan titel penumpang
    $namaTitelPenumpang = [];

    // Iterasi melalui setiap transaksi lain yang ditemukan
    foreach ($transaksiLain as $transaksiItem) {
        // Pisahkan nama dan titel penumpang
        $namaPenumpang = explode(',', $transaksiItem->nama);
        $titelPenumpang = explode(',', $transaksiItem->titel);

        // Gabungkan data nama dan titel penumpang ke dalam satu array
        for ($i = 0; $i < count($namaPenumpang); $i++) {
            $namaTitelPenumpang[] = [
                'nama' => $namaPenumpang[$i],
                'titel' => $titelPenumpang[$i]
            ];
        }
    }

    // Menghitung total harga tiket
    $totalHargaTiket = $transaksi->jadwal->harga_tiket * count($namaTitelPenumpang);
    $totalHargaTiketFormatted = "Rp " . number_format($totalHargaTiket, 0, ',', '.');
    session()->put('total_harga_tiket', $totalHargaTiket);

    // Kemudian, lemparkan data transaksi dan namaTitelPenumpang ke halaman pembayaran
    return view('user.pemesanan.bayarr', compact('transaksi', 'namaTitelPenumpang', 'totalHargaTiketFormatted', 'totalHargaTiket'));
}


public function showETicket($user_id, $jadwal_id)
{
    // Temukan transaksi berdasarkan user_id dan jadwal_id
    $transaksi = Transaksi::where('user_id', $user_id)
                          ->where('jadwal_id', $jadwal_id)
                          ->firstOrFail();

    // Temukan data transaksi lain berdasarkan user_id dan jadwal_id yang sama
    $transaksiLain = Transaksi::where('user_id', $user_id)
                              ->where('jadwal_id', $jadwal_id)
                              ->get();

    $pembayaran = Pembayaran::where('user_id', $user_id)
                              ->where('jadwal_id', $jadwal_id)
                              ->firstOrFail();
 
    // Tampilkan e-ticket ID dari data pembayaran
    $e_ticket_id = $pembayaran->e_ticket_id;

    // Inisialisasi array untuk nama dan titel penumpang
    $namaTitelPenumpang = [];
    $nomorKursi = []; // Tambahkan array untuk menyimpan nomor kursi

    // Iterasi melalui setiap transaksi yang ditemukan
    foreach ($transaksiLain as $transaksiItem) {
        $namaPenumpang = explode(',', $transaksiItem->nama);
        $titelPenumpang = explode(',', $transaksiItem->titel);
        $nomorKursiPenumpang = explode(',', $transaksiItem->no_kursi); // Ambil nomor kursi dari transaksi

        for ($i = 0; $i < count($namaPenumpang); $i++) {
            $namaTitelPenumpang[] = [
                'nama' => $namaPenumpang[$i],
                'titel' => $titelPenumpang[$i]
            ];
            $nomorKursi[] = $nomorKursiPenumpang[$i]; // Simpan nomor kursi ke dalam array
        }
    }

    // Hitung total harga tiket
    $totalHargaTiket = $transaksi->jadwal->harga_tiket * count($namaTitelPenumpang);
    $totalHargaTiketFormatted = "Rp " . number_format($totalHargaTiket, 0, ',', '.');
    $status_pembayaran = $pembayaran->status;

    // Tampilkan halaman E-Ticket
    return view('user.pemesanan.eticket', compact('transaksi', 'namaTitelPenumpang', 'totalHargaTiketFormatted', 'totalHargaTiket', 'e_ticket_id', 'nomorKursi','status_pembayaran'));
}

public function dataPembayaran()
{
    // Logika untuk mengambil data pembayaran dari database
    $dataPembayaran = Pembayaran::all(); // Contoh, sesuaikan dengan struktur database Anda

    return view('admin.transaksi.data_pembayaran', ['dataPembayaran' => $dataPembayaran]);
}

public function dataPembayaranterima()
{
    // Logika untuk mengambil data pembayaran dari database
    $dataPembayaran = Pembayaran::all(); // Contoh, sesuaikan dengan struktur database Anda

    return view('admin.transaksi.data_pembayaranTerima', ['dataPembayaran' => $dataPembayaran]);

}
public function detail($id)
{
    $pembayaran = Pembayaran::with('transaksi', 'user')->findOrFail($id);

    // Mendapatkan transaksi yang memiliki user_id dan jadwal_id yang sama
    $transaksiLainnya = Transaksi::where('user_id', $pembayaran->user_id)
                                 ->where('jadwal_id', $pembayaran->jadwal_id)
                                 ->get();

    return view('admin.transaksi.sesi.detail_pembayaran', compact('pembayaran','transaksiLainnya'));
}

public function keuntungan(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $dataPembayaran = Pembayaran::where('status', 'accepted');

        if ($startDate && $endDate) {
            $dataPembayaran->whereBetween('updated_at', [$startDate, $endDate]);
        }

        $totalKeuntungan = $dataPembayaran->sum('jumlah');

        return view('admin.transaksi.keuntungan', [
            'totalKeuntungan' => $totalKeuntungan
        ]);
    }

    public function lihatPesanan()
    {
        // Ambil ID pengguna yang saat ini masuk
        $userId = Auth::id();
    
        // Ambil pesanan yang dimiliki oleh pengguna yang saat ini masuk
        $pesanan = Pembayaran::where('user_id', $userId)->with('jadwal')->get();
    
        // Loop through each pesanan
        foreach ($pesanan as $pembayaran) {
            // Parse tanggal keberangkatan ke dalam objek Carbon
            $pembayaran->jadwal->tanggal_keberangkatan = Carbon::parse($pembayaran->jadwal->tanggal_keberangkatan);
        }
    
        return view('user.pesanan', compact('pesanan'));
    }
       
       




    


}