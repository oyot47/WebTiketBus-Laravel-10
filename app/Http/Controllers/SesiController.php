<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Jadwal;
use App\Models\Kota;
use App\Models\Route;
use App\Models\Terminal;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{
    function index()
    {
        return view('/home');
    }

    function index2()
    {
        return view('/sesi/login');
    }


    function login(Request $request){
        $request ->validate([
            'email'=>'required|email',
            'password'=>'required',

        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',

        ]);

        $infologin= [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'user'){
                return redirect('/user/homepage');
            } elseif (Auth::user()->role == 'admin'){
                return redirect('/admin');
            }

        }else{
            return redirect('')->withErrors('Username dan Password Tidak Sesuai')->withInput();
        }
    }

    function logout(){
        auth::logout();
        return redirect('');

    }

    function register(){
        return view('sesi/register');
    }
    function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],[ 
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email Sudah Terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password harus lebih dari 6 karakter'
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
    
        // Simpan pengguna baru
        $user = User::create($data);
    
        // Cek apakah pengguna berhasil terautentikasi setelah mendaftar
        if ($user) {
            // Redirect pengguna ke halaman login
            return redirect('sesi/login')->with('success', 'Registrasi berhasil! Silakan masuk dengan email dan password Anda.');
        } else {
            // Redirect pengguna kembali ke halaman registrasi dengan pesan kesalahan
            return redirect('/register')->withErrors('Registrasi gagal. Silakan coba lagi.')->withInput();
        }
    }


    function createadmi(Request $request) {
        $validator = Validator::make($request->all(),[
            'email'=> 'required|email|unique:users',
            'nama' => 'required',
            'password' => 'required|min:6',
            'role'=> 'required'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
 
        $data['email'] = $request->email;
        $data['nama'] = $request->name;
        $data['password'] = bcrypt($request->password);
        


        User::create($data);

        return redirect()->route('admin');

    }

    function createadmin(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ],[ 
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email Sudah Terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password harus lebih dari 6 karakter'
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];
    
        // Simpan pengguna baru
        $user = User::create($data);
    
        // Cek apakah pengguna berhasil terautentikasi setelah mendaftar
        if ($user) {
            // Redirect pengguna ke halaman login
            return redirect('admin')->with('success', 'Registrasi berhasil! Silakan masuk dengan email dan password Anda.');
        } else {
            // Redirect pengguna kembali ke halaman registrasi dengan pesan kesalahan
            return redirect('admin.halcreate')->withErrors('Registrasi gagal. Silakan coba lagi.')->withInput();
        }
    }


    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'email' => 'required|email|unique:users,email,'. $id,
            'name' => 'required',
            'password' => 'nullable|min:6', 
            'role' => 'required',
        ],[
            'email.unique' => 'Email telah digunakan oleh pengguna lain.',
        ]);

        // Temukan user yang akan diperbarui
        $user = User::findOrFail($id);

        if ($request->email !== $user->email && User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email telah digunakan oleh pengguna lain.'])->withInput();
        }

        // Tetapkan nilai baru untuk atribut yang diperlukan
        $user->email = $request->email;
        $user->name = $request->name;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;

        // Simpan perubahan ke database
        $user->save();

        // Redirect kembali ke halaman yang diinginkan setelah berhasil diperbarui
        return redirect()->route('admin')->with('success', 'User berhasil diperbarui.');
    }


    public function delete(Request $request,$id)
    {
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin');
    }


    public function createkota(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kota,nama,',
        ],[
            'nama.required' => 'Nama kota harus diisi.',
            'nama.unique' => 'Nama kota Sudah Terdata.',
        ]);
    
        Kota::create([
            'nama' => $request->nama,
        ]);
    
        return redirect()->route('admin')->with('success', 'Data kota berhasil ditambahkan!');
    }


    public function updatekota(Request $request, $id)
    {
        
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required|string|max:255|unique:kota,nama,' . $id,
        ], [
            'nama.unique' => 'Nama kota Sudah Terdata.',
        ]);

        // Temukan kota yang akan diperbarui
        $kota = Kota::findOrFail($id);

        // Tetapkan nilai baru untuk atribut yang diperlukan
        $kota->nama = $request->nama;

        // Simpan perubahan ke database
        $kota->save();

        // Redirect kembali ke halaman yang diinginkan setelah berhasil diperbarui
        return redirect()->route('admin')->with('success', 'Kota berhasil diperbarui.');
    }


    public function deletekota(Request $request,$id)
    {
        $data = Kota::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin');
    }

    public function createterminal(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kota_id' => 'required|exists:kota,id',
            'address' => 'nullable|string|max:255',
            'maps_link' => 'nullable|string|max:255',
        ]);
    
        // Periksa apakah nama terminal sudah ada sebelumnya
        $existingTerminal = Terminal::where('nama', $validatedData['nama'])->first();
        if ($existingTerminal) {
            return redirect()->back()->withInput()->withErrors(['nama' => 'Nama terminal sudah ada']);
        }
    
        // Buat objek terminal baru berdasarkan data yang diterima
        $terminal = new Terminal();
        $terminal->nama = $validatedData['nama'];
        $terminal->kota_id = $validatedData['kota_id'];
        $terminal->address = $validatedData['address'];
        $terminal->maps_link = $validatedData['maps_link'];
        $terminal->save();
    
        // Redirect pengguna ke halaman dengan konfirmasi sukses
        return redirect()->route('admin')->with('success', 'Data terminal berhasil ditambahkan');
    }

    public function updateterminal(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required|string|max:255|unique:terminal,nama,' . $id,
            'kota_id' => 'required|exists:kota,id',
            'address' => 'nullable|string|max:255',
            'maps_link' => 'nullable|string|max:255',
        ], [
            'nama.required' => 'Nama terminal harus diisi.',
            'nama.unique' => 'Nama terminal sudah terdaftar.',
            'kota_id.required' => 'Kota harus dipilih.',
            'kota_id.exists' => 'Kota yang dipilih tidak valid.',
           
        ]);
    
        // Temukan terminal yang akan diperbarui
        $terminal = Terminal::findOrFail($id);
    
        // Tetapkan nilai baru untuk atribut yang diperlukan
        $terminal->nama = $request->nama;
        $terminal->kota_id = $request->kota_id;
        $terminal->address = $request->address;
        $terminal->maps_link = $request->maps_link;
    
        // Simpan perubahan ke database
        $terminal->save();

        // Redirect kembali ke halaman yang diinginkan setelah berhasil diperbarui
        return redirect()->route('admin')->with('success', 'Data terminal berhasil diperbarui.');
    }

    public function deleteterminal(Request $request,$id)
    {
        $data = Terminal::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin');
    }



    public function createBus(Request $request)
    {
        $validatedData = $request->validate([
            'image'=> 'nullable|mimes:png,jpg,jpeg|max:5048',
            'nomor_plat' => 'required|string|max:255|unique:bus,nomor_plat',
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah_kursi' => 'required|integer|min:1',
            'format_kursi' => 'required|string|max:255',
            'fasilitas' => 'nullable|array',
            'keterangan' => 'nullable|string',
        ], [
            'nomor_plat.required' => 'Nomor plat wajib diisi.',
            'nomor_plat.unique' => 'Nomor plat sudah ada.',
            'nama.required' => 'Nama wajib diisi.',
            'jenis.required' => 'Jenis wajib diisi.',
            'jumlah_kursi.required' => 'Jumlah kursi wajib diisi.',
            'jumlah_kursi.min' => 'Jumlah kursi harus lebih dari 0.',
            'format_kursi.required' => 'Format kursi wajib diisi.',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d').$image->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/photo-bus', $filename);
            $validatedData['image'] = $filename;
        }
    
        $validatedData['fasilitas'] = implode(', ', $request->fasilitas);
    
        $existingBus = Bus::where('nomor_plat', $validatedData['nomor_plat'])->first();
        if ($existingBus) {
            return redirect()->back()->withInput()->withErrors(['nomor_plat' => 'Nomor plat sudah ada']);
        }
    
        $bus = new Bus();
        $bus->fill($validatedData);
        $bus->save();
    
        return redirect()->route('admin')->with('success', 'Bus berhasil ditambahkan.');
    }
    

    public function updatebus(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg|max:5048',
            'nomor_plat' => 'required|string|max:255|unique:bus,nomor_plat,' . $id,
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah_kursi' => 'required|integer|min:1',
            'format_kursi' => 'required|string|max:255',
            'fasilitas' => 'nullable|array',
            'keterangan' => 'nullable|string',
        ], [
            'nomor_plat.required' => 'Nomor plat wajib diisi.',
            'nomor_plat.unique' => 'Nomor plat sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'jenis.required' => 'Jenis wajib diisi.',
            'jumlah_kursi.required' => 'Jumlah kursi wajib diisi.',
            'jumlah_kursi.min' => 'Jumlah kursi minimal 1.',
            'format_kursi.required' => 'Format kursi wajib diisi.',
        ]);

        $bus = Bus::findOrFail($id);

        if ($request->hasFile('image')) {
            // Validasi dan simpan gambar baru
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/photo-bus', $filename);
            $validatedData['image'] = $filename;
        
            // Hapus gambar lama jika ada
            if ($bus->image) {
                Storage::delete('public/photo-bus/' . $bus->image);
            }
        
            // Perbarui nama file gambar di model Bus
            $bus->image = $filename;
        }

        // Konversi array fasilitas menjadi string
        $validatedData['fasilitas'] = implode(', ', $request->fasilitas);

        // Cari data bus berdasarkan ID
       
        
        // Update data bus dengan data yang divalidasi
        $bus->update($validatedData);
        
        // Redirect pengguna ke halaman dengan konfirmasi sukses
        return redirect()->route('admin')->with('success', 'Data bus berhasil diperbarui');
    }




    public function deletebus(Request $request,$id)
    {
        $data = Bus::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin');
    }


    public function createroute(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'terminal_asal_id' => 'required',
            'terminal_tujuan_id' => 'required',
            'waktu_destinasi' => 'required',
        ], [
            'terminal_asal_id.required' => 'Bidang terminal asal harus diisi.',
            'terminal_tujuan_id.required' => 'Bidang terminal tujuan harus diisi.',
            'waktu_destinasi.required' => 'Bidang waktu destinasi harus diisi.',
        ]);
    
        // Pastikan terminal asal dan tujuan benar-benar ada
        $terminalAsal = Terminal::find($validatedData['terminal_asal_id']);
        $terminalTujuan = Terminal::find($validatedData['terminal_tujuan_id']);
    
        if (!$terminalAsal || !$terminalTujuan) {
            return back()->with('error', 'Terminal asal atau tujuan tidak valid.');
        }
    
        // Buat data rute baru
        Route::create($validatedData);
    
        return redirect()->route('admin')->with('success', 'Data rute berhasil disimpan');
    }


    public function updateroute(Request $request, $id)
    {
        $validatedData = $request->validate([
            'terminal_asal_id' => 'required',
            'terminal_tujuan_id' => 'required',
            'waktu_destinasi' => 'required',
        ],[
            'terminal_asal_id.required' => 'Bidang terminal asal harus diisi.',
            'terminal_tujuan_id.required' => 'Bidang terminal tujuan harus diisi.',
            'waktu_destinasi.required' => 'Bidang waktu destinasi harus diisi.',
        ]);

        // Update data route
        $route = Route::findOrFail($id);
        $route->update($validatedData);

        return redirect()->route('admin')->with('success', 'Route updated successfully');
    }
    public function createjadwal(Request $request)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'kota_asal_id' => 'required',
            'kota_tujuan_id' => 'required',
            'terminal_asal_id' => 'required',
            'terminal_tujuan_id' => 'required',
            'tanggal_keberangkatan' => 'required',
            'tanggal_sampai' => 'required',
            'jam_keberangkatan' => 'required',
            'jam_sampai' => 'required',
            'destinasi_waktu' => 'required',
            'bus_id' => 'required',
            'jumlah_tiket_tersedia' => 'required',
            'harga_tiket' => 'required',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan data ke database
        $jadwal = new Jadwal();
        $jadwal->kota_asal_id = $request->kota_asal_id;
        $jadwal->kota_tujuan_id = $request->kota_tujuan_id;
        $jadwal->terminal_asal_id = $request->terminal_asal_id;
        $jadwal->terminal_tujuan_id = $request->terminal_tujuan_id;
        $jadwal->tanggal_keberangkatan = $request->tanggal_keberangkatan;
        $jadwal->tanggal_sampai = $request->tanggal_sampai;
        $jadwal->jam_keberangkatan = $request->jam_keberangkatan;
        $jadwal->jam_sampai = $request->jam_sampai;
        $jadwal->destinasi_waktu = $request->destinasi_waktu;
        $jadwal->bus_id = $request->bus_id;
        $jadwal->jumlah_tiket_tersedia = $request->jumlah_tiket_tersedia;
        $jadwal->harga_tiket = $request->harga_tiket;
        $jadwal->save();

        // Redirect ke halaman atau tindakan yang sesuai setelah penyimpanan berhasil
        return redirect()->route('admin');
    }


    public function updatejadwal(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kota_asal_id' => 'required',
            'kota_tujuan_id' => 'required',
            'terminal_asal_id' => 'required',
            'terminal_tujuan_id' => 'required',
            'tanggal_keberangkatan' => 'required',
            'tanggal_sampai' => 'required',
            'jam_keberangkatan' => 'required',
            'jam_sampai' => 'required',
            'destinasi_waktu' => 'required',
            'bus_id' => 'required',
            'jumlah_tiket_tersedia' => 'required',
            'harga_tiket' => 'required',
            'status' => 'required'
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Ambil jadwal yang akan diupdate
        $jadwal = Jadwal::find($id);

        // Perbarui nilai atribut jadwal berdasarkan data yang diterima dari formulir
        $jadwal->kota_asal_id = $request->kota_asal_id;
        $jadwal->kota_tujuan_id = $request->kota_tujuan_id;
        $jadwal->terminal_asal_id = $request->terminal_asal_id;
        $jadwal->terminal_tujuan_id = $request->terminal_tujuan_id;
        $jadwal->tanggal_keberangkatan = $request->tanggal_keberangkatan;
        $jadwal->tanggal_sampai = $request->tanggal_sampai;
        $jadwal->jam_keberangkatan = $request->jam_keberangkatan;
        $jadwal->jam_sampai = $request->jam_sampai;
        $jadwal->destinasi_waktu = $request->destinasi_waktu;
        $jadwal->bus_id = $request->bus_id;
        $jadwal->jumlah_tiket_tersedia = $request->jumlah_tiket_tersedia;
        $jadwal->harga_tiket = $request->harga_tiket;
        // Perbarui nilai atribut jadwal berdasarkan data yang diterima dari formulir
        $jadwal->status = $request->status;


        // Simpan perubahan
        $jadwal->save();

        // Redirect pengguna ke halaman yang sesuai, misalnya halaman detail jadwal
        return redirect()->route('admin', ['id' => $jadwal->id])->with('success', 'Jadwal berhasil diperbarui.');
    }


    public function deletejadwal(Request $request,$id)
    {
        $data = Jadwal::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin');
    }

    public function getKota()
    {
        $kota = Kota::pluck('nama')->toArray();
        return response()->json($kota);
    }

    public function createpesan(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'jadwal_id' => 'required|exists:jadwal,id',
            'title.*' => 'required',
            'nama.*' => 'required',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);
    
        // Periksa apakah jumlah penumpang sesuai dengan jumlah opsi dan nama yang dimasukkan
        $seats = $request->seats;
        $num_titles = count($request->title);
        $num_namas = count($request->nama);
    
        if ($seats != $num_titles || $seats != $num_namas) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Jumlah penumpang dan jumlah data tidak sesuai']);
        }
    
        // Ambil jadwal berdasarkan ID
        $jadwal = Jadwal::findOrFail($request->jadwal_id);
    
        // Cek apakah masih tersedia kursi
        if ($seats > $jadwal->jumlah_tiket_tersedia) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Jumlah tiket yang dipilih melebihi jumlah tiket yang tersedia']);
        }
    
        // Ambil nomor kursi yang sudah digunakan pada jadwal tertentu
        $used_seat_numbers = Transaksi::where('jadwal_id', $jadwal->id)
                                       ->pluck('no_kursi')
                                       ->toArray();
    
        // Membuat nomor kursi secara berurutan dimulai dari 1 hingga jumlah tiket tersedia
        $available_seat_numbers = range(1, $jadwal->jumlah_tiket_tersedia);
    
        // Cari nomor kursi yang masih tersedia (tidak digunakan)
        $available_seat_numbers = array_diff($available_seat_numbers, $used_seat_numbers);
        $available_seat_numbers = array_values($available_seat_numbers);
    
        // Cek apakah ada nomor kursi yang tersedia
        if (empty($available_seat_numbers)) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Semua tiket untuk jadwal ini telah terjual']);
        }
    
        // Ambil nomor kursi berikutnya yang tersedia
        $next_seat_numbers = array_slice($available_seat_numbers, 0, $seats);
    
        // Simpan transaksi ke database
        foreach ($next_seat_numbers as $seat_number) {
            $transaksi = new Transaksi();
            $transaksi->user_id = auth()->id(); // atau cara Anda untuk mendapatkan ID pengguna yang memesan
            $transaksi->jadwal_id = $jadwal->id;
            $transaksi->titel = $request->title[$seat_number - 1];
            $transaksi->nama = $request->nama[$seat_number - 1];
            $transaksi->harga_tiket = $jadwal->harga_tiket;
            $transaksi->tanggal_transaksi = now()->toDateString();
            $transaksi->no_kursi = $seat_number;
    
            $transaksi->save();
        }
    
        // Arahkan pengguna ke halaman pembayaran dengan ID transaksi
        return redirect()->route('pembayaran5', ['id_transaksi' => $transaksi->id_transaksi]);
    }
    


// Fungsi di SesiController
public function batalkanPemesanan(Request $request)
{
    // Validasi data
    $request->validate([
        'id_transaksi' => 'required|exists:transaksis,id_transaksi',
    ]);

    // Temukan transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($request->id_transaksi);

    // Hapus transaksi dengan user_id yang sama dengan user yang sedang login
    // dan jadwal_id yang sama dengan jadwal_id pada transaksi yang akan dihapus
    Transaksi::where('user_id', Auth::id())
             ->where('jadwal_id', $transaksi->jadwal_id)
             ->delete();

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return view('user.homepage')->with('success', 'Pemesanan berhasil dibatalkan.');
}

public function pembayaran(Request $request)
{
    // Validasi request
    $request->validate([
        'screenshot' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan gambar ke dalam direktori storage/app/public/bukti_transfer
    $gambar = $request->file('screenshot');
    $namaFile = $gambar->getClientOriginalName();
    $gambar->storeAs('public/bukti_transfer', $namaFile);

    // Ambil nilai dari input hidden
    $user_id = $request->input('user_id');
    $jadwal_id = $request->input('jadwal_id');
    $totalHargaTiket = session('total_harga_tiket');

    // Simpan pembayaran ke dalam database dan dapatkan ID yang baru dibuat
    $id_pembayaran = Pembayaran::insertGetId([
        'user_id' => $user_id,
        'jadwal_id' => $jadwal_id,
        'metode_pembayaran' => 'Transfer Bank',
        'jumlah' => $totalHargaTiket,
        'bukti_transfer' => $namaFile,
        'status' => 'pending',
    ]);

    // Generate ID e-ticket berdasarkan ID pembayaran yang baru dibuat
    $eticketID = $this->generateEticketID($jadwal_id, $id_pembayaran);

    // Update kolom e_ticket_id dengan ID e-ticket yang baru dibuat
    Pembayaran::where('id', $id_pembayaran)->update(['e_ticket_id' => $eticketID]);

    // Kurangi jumlah tiket tersedia berdasarkan jumlah transaksi pada jadwal tersebut
    $transaksiJadwal = Transaksi::where('jadwal_id', $request->jadwal_id)->count();
    $jadwal = Jadwal::findOrFail($request->jadwal_id);
    $jadwal->jumlah_tiket_tersedia -= $transaksiJadwal;
    $jadwal->save();

    // Redirect ke halaman e-ticket
    return redirect()->route('e-ticket.show', ['user_id' => $user_id, 'jadwal_id' => $jadwal_id])
                     ->with('success', 'Bukti transfer berhasil dikirim. Menunggu konfirmasi dari admin.');
}

// Fungsi untuk generate ID e-ticket unik
// Fungsi untuk generate ID e-ticket unik
public function generateEticketID($jadwal_id, $id_pembayaran) {
    // Generate nomor acak dengan panjang 4 digit
    $randomNumber = mt_rand(1000, 9999);
    
    // Gabungkan ID jadwal dengan nomor acak dan ID pembayaran
    $eticketID = 'ET' . $jadwal_id . $randomNumber . $id_pembayaran;
    
    return $eticketID;
}

public function backhome()
{

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return view('user.homepage')->with('success', 'Pemesanan berhasil dibatalkan.');
}

public function terima($id)
{
    // Temukan pembayaran berdasarkan ID
    $pembayaran = Pembayaran::findOrFail($id);

    // Lakukan pengecekan apakah pembayaran memiliki status 'pending'
    if ($pembayaran->status === 'pending') {
        // Ubah status pembayaran menjadi 'accepted'
        $pembayaran->status = 'accepted';
        $pembayaran->save();

        // Redirect kembali ke halaman detail pembayaran dengan pesan sukses
        return redirect()->back()->with('success', 'Pembayaran telah diterima.');
    } else {
        // Redirect kembali ke halaman detail pembayaran dengan pesan error jika status bukan 'pending'
        return redirect()->back()->with('error', 'Status pembayaran tidak valid.');
    }
}

public function hapusPembayaran($id)
    {
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Data pembayaran tidak ditemukan.');
        }

        if ($pembayaran->status !== 'pending') {
            return redirect()->back()->with('error', 'Hanya pembayaran yang masih dalam status pending yang dapat dihapus.');
        }

        $pembayaran->delete();

        return redirect()->back()->with('success', 'Data pembayaran berhasil dihapus.');
    }








    

    

    







}
