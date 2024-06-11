<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::get('/sesi/login',[SesiController::class,'index2'])->name('login');
    Route::post('/sesi/login',[SesiController::class,'login']); 
    Route::get('/register',[SesiController::class,'register'])->name('login');
    Route::post('/sesi/create',[SesiController::class,'create']); 
});
Route::get('/home',function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::get('/home',[AdminController::class,'user']);
    Route::get('user/homepage',[AdminController::class,'userlog']);
    Route::get('/logout',[SesiController::class, 'logout'])->name('Logout');

/*MENU USERS WEB ADMIN*/
/* BAGIAN ADMIN PROSES SERTA TAMPILAN */
    Route::get('/halcreate',[AdminController::class, 'halcreate'])->name('admin.halcreate');
    Route::post('/createadmin',[SesiController::class, 'createadmin'])->name('admin.create');
    Route::get('/edit/{id}',[AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [SesiController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}',[SesiController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/users/adminview',[AdminController::class, 'adminview'])->name('admin.view');

/* BAGIAN USER PROSES SERTA TAMPILAN */
    Route::get('/admin/users/userview',[AdminController::class, 'userview'])->name('user.view');
    Route::get('/halUser',[AdminController::class, 'halcreateuser'])->name('user.halcreate');
    Route::get('/useredit/{id}',[AdminController::class, 'useredit'])->name('user.edit');




/*MENU PRODUK*/
/*BAGIAN BUS PROSES SERTA TAMPILAN*/
    /*KOTA*/
    Route::get('/admin/bus/kotaview',[AdminController::class, 'kotaview'])->name('kota.view');
    Route::get('/halcreatekota',[AdminController::class, 'halcreatekota'])->name('kota.halcreate');
    Route::post('/createkota',[SesiController::class, 'createkota'])->name('kota.create');
    Route::get('/kotaedit/{id}',[AdminController::class, 'editkota'])->name('kota.edit');
    Route::put('/updatekota/{id}', [SesiController::class, 'updatekota'])->name('kota.update');
    Route::delete('/kotadelete/{id}',[SesiController::class, 'deletekota'])->name('kota.delete');

    /*TERMINAL*/
    Route::get('/admin/bus/terminalview',[AdminController::class, 'terminalview'])->name('terminal.view');
    Route::get('/halcreateterminal',[AdminController::class, 'halcreateterminal'])->name('terminal.halcreate');
    Route::post('/createterminal',[SesiController::class, 'createterminal'])->name('terminal.create');
    Route::get('/terminaledit/{id}',[AdminController::class, 'editterminal'])->name('terminal.edit');
    Route::put('/updateterminal/{id}', [SesiController::class, 'updateterminal'])->name('terminal.update');
    Route::delete('/terminaldelete/{id}',[SesiController::class, 'deleteterminal'])->name('terminal.delete');

    /*BUS*/
    Route::get('/admin/bus/busview', [AdminController::class, 'busview'])->name('bus.view');
    Route::get('/halcreatebus',[AdminController::class, 'halcreatebus'])->name('bus.halcreate');
    Route::post('/createbus',[SesiController::class, 'createbus'])->name('bus.create');
    Route::get('/busedit/{id}',[AdminController::class, 'editbus'])->name('bus.edit');
    Route::put('/updatebus/{id}', [SesiController::class, 'updatebus'])->name('bus.update');
    Route::delete('/busdelete/{id}',[SesiController::class, 'deletebus'])->name('bus.delete');

    /*ROUTE*/
    Route::get('/admin/bus/routeview', [AdminController::class, 'routeview'])->name('route.view');
    Route::get('/halcreateroute',[AdminController::class, 'halcreateroute'])->name('route.halcreate');
    Route::post('/createroute',[SesiController::class, 'createroute'])->name('route.create');
    Route::get('/routeedit/{id}',[AdminController::class, 'editroute'])->name('route.edit');
    Route::put('/updateroute/{id}', [SesiController::class, 'updateroute'])->name('route.update');
    Route::delete('/routedelete/{id}',[SesiController::class, 'deleteroute'])->name('route.delete');
    Route::get('/search-terminal', [SesiController::class, 'searchTerminal']);

    /*JADWAL*/
    Route::get('/admin/bus/jadwalview', [AdminController::class, 'jadwalview'])->name('jadwal.view');
    Route::get('/halcreatejadwal',[AdminController::class, 'halcreatejadwal'])->name('jadwal.halcreate');
    Route::get('/jadwaledit/{id}',[AdminController::class, 'editjadwal'])->name('jadwal.edit');
    Route::get('/dapat-terminal-edit-berdasarkan-kota/{cityId}', [AdminController::class, 'dapatTerminalEdit']);
    Route::put('/updatejadwal/{id}', [SesiController::class, 'updatejadwal'])->name('jadwal.update');
    Route::delete('/jadwaldelete/{id}',[SesiController::class, 'deletejadwal'])->name('jadwal.delete');

    Route::get('/get-terminals-by-city/{cityId}', [AdminController::class, 'getTerminalsByCity']);
    Route::post('/createjadwal',[SesiController::class, 'createjadwal'])->name('jadwal.create');
    Route::get('/jadwal/detail/{id}', [AdminController::class, 'jadwaldetail'])->name('jadwal.detail');

    /*TRANSAKSI*/
    Route::get('/admin/data-pembayaran', [AdminController::class, 'dataPembayaran'])->name('admin.data_pembayaran');
    Route::get('/admin/data-pembayaranAccept', [AdminController::class, 'dataPembayaranterima'])->name('admin.data_pembayaranAccept');
    Route::get('/pembayaran/{id}', [AdminController::class, 'detail'])->name('pembayaran.detail');
    Route::post('/pembayaran/{id}/terima', [SesiController::class, 'terima'])->name('terima_pembayaran');
    Route::get('/admin/keuntungan', [AdminController::class, 'keuntungan'])->name('admin.keuntungan');
    Route::delete('/admin/pembayaran/{id}', [SesiController::class, 'hapusPembayaran'])->name('admin.hapus_pembayaran');
    Route::get('/pesanan', [AdminController::class, 'lihatPesanan'])->name('pesanan.lihat');







/*MENU USER*/
    /*HOMEPAGE*/
    Route::get('/tes}', [AdminController::class, 'tes'])->name('tes');
    Route::get('/get-kota',  [SesiController::class, 'getKota'])->name('getKota');
    /*TIKET*/
    Route::post('/cari-jadwal',  [AdminController::class, 'cari'])->name('cari-jadwal');

    /*PESAN*/
    Route::get('/pesan', [AdminController::class, 'pesan'])->name('pesan');
    Route::get('/pesan-form', [AdminController::class, 'pesanview'])->name('pesan.form');
    Route::post('/kirim-reservation', [SesiController::class, 'createpesan'])->name('kirim.form');
    Route::get('/bayar/{id_transaksi}', [AdminController::class, 'pembayaranview'])->name('pembayaran5');

    Route::delete('/batalkan-pemesanan', [SesiController::class,'batalkanPemesanan'])->name('pemesanan.batalkan');
    Route::post('/pembayaran', [SesiController::class,'pembayaran'])->name('pembayaran2');
    Route::get('/e-ticket/{user_id}/{jadwal_id}', [AdminController::class, 'showETicket'])->name('e-ticket.show');
    Route::get('/homee', [SesiController::class,'backhome'])->name('home2');







   




} );
