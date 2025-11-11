<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HobiController;

use App\Models\Wali;
use App\Models\Mahasiswa;
use App\Models\Hobi;
use App\Models\ProdukStok;


Route::get('/', function () {
    return view('welcome');
});

//basic
Route::get('about', function () {
    return '<h1>Hallo </h1>' .
        '<br>Selamat Datang di Perpustakaan Digital';
});

Route::get('aku', function () {
    return 'Nama : Maryana Tri Purnama Putri' .
        '<br> Kelas : XI RPL 3' .
        '<br> Alamat : Tarate Mekar V';
});

Route::get('buku', function () {
    return view('buku');
});

Route::get('menu', function () {
    $data = [
        ['nama_makanan' => 'Bala-bala', 'harga' => 1000, 'jumlah' => 10],
        ['nama_makanan' => 'Gehu Pedas', 'harga' => 2000, 'jumlah' => 15],
        ['nama_makanan' => 'Cireng Isi Ayam', 'harga' => 2500, 'jumlah' => 5],
    ];
    $resto = "Resto MPL - Makanan Penuh Lemak";
    //compact fungsinya untuk mengirim collection data(array)
    //yang ada di variabel ke dalam sebuah view
    return view('menu', compact('data', 'resto'));
});

//route Parameter (Nilai)
Route::get('books/{judul}', function ($a) {
    return 'Judul Buku : ' . $a;
});

// Route::get('post/{title}/{category}', function ($a, $b) {
//     //compact assosiatif
//     return view('post', ['judul' => $a, 'cat' => $b]);
// });

//route opsional Parameter
//di tandai dengan ?
Route::get('profile/{nama?}', function ($a = "guest") {
    return 'Halo nama saya ' . $a;
});

Route::get('order/{item?}', function ($a = "Nasi") {
    return view('order', compact('a'));
});

Route::get('/barang-total', function () {
    $barang = [
        ['nama' => 'Buku', 'harga' => 15000, 'qty' => 2],
        ['nama' => 'Pensil', 'harga' => 3000, 'qty' => 5],
        ['nama' => 'Penggaris', 'harga' => 7000, 'qty' => 1],
    ];
    return view('barang-total', compact('barang'));
});

Route::get('/nilai/{nama}/{mapel}/{nilai}', function ($nama, $mapel, $nilai) {
    return view('nilai', compact('nama', 'mapel', 'nilai'));
});

Route::get('/grading/{nama?}/{nilai?}', function ($nama = 'Guest', $nilai = 0) {
    $grade = 'E';
    if ($nilai >= 90) {
        $grade = 'A';
    } elseif ($nilai >= 80) {
        $grade = 'B';
    } elseif ($nilai >= 70) {
        $grade = 'C';
    } elseif ($nilai >= 60) {
        $grade = 'D';
    }

    return view('grading', compact('nama', 'nilai', 'grade'));
});

Route::get('/nilai-ratarata', function () {
    $siswa1 = ['nama' => 'Andi', 'nilai' => 85];
    $siswa2 = ['nama' => 'Budi', 'nilai' => 70];
    $siswa3 = ['nama' => 'Citra', 'nilai' => 95];

    $totalNilai  = $siswa1['nilai'] + $siswa2['nilai'] + $siswa3['nilai'];
    $jumlahSiswa = 3;

    $rataRata = $totalNilai / $jumlahSiswa;
    $status   = $rataRata >= 75 ? 'Lulus' : 'Remedial';

    return view('nilai-ratarata', [
        'siswa'    => [$siswa1, $siswa2, $siswa3],
        'rataRata' => $rataRata,
        'status'   => $status,
    ]);
});

Route::get('test-model', function () {
    //menampilkan semua data dari model Post
    $data = App\Models\Post::all();
    return $data;
});

Route::get('create-data-post', function () {
    //membuat data baru melalui model
    $data = App\Models\Post::create([
        'title'  => 'Belajar PHP 2',
        'content' => 'Lorem Ipsum',
    ]);
    return $data;
});

Route::get('show-data', function ($id) {
    //menambahkan data berdasarkan prameter 'id'
    $data = App\Models\Post::find($id);
    return $data;
});

Route::get('edit-data/{id}', function ($id) {
    // mengupdate data berdasarkan id
    $data        = App\Models\Post::find($id);
    $data->title = "Membangun Project dengan Laravel";
    $data->save();
    return $data;
});

Route::get('delete-data/{id}', function ($id) {
    // menghapus data berdasarkan parameter id
    $data = App\Models\Post::find($id);
    $data->delete();
    // di kembalikan (alihkan) ke halaman test model
    return redirect('test-model');
});

Route::get('search/{cari}', function ($query) {
    //mencari data berdasarkan tittle yang mirip seperti (like) ......
    $data = App\Models\Post::where('tittle', 'like', '%' . $query . '%')->get();
    return $data;
});

// pemanggil url menggunakan controller
Route::get('greetings', [MyController::class, 'hello']);
Route::get('student', [MyController::class, 'siswa']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//post
Route::get('post', [PostController::class, 'index'])->name('post.index');

// tambah data post
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');

// edit data post
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');

// show data post
Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');

// hapus data
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');

// produk
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

// biodata
Route::resource('biodata', BiodataController::class);

// relasi
// one to one
Route::get('/one-to-one', [RelasiController::class, 'index']);
Route::get('/wali-ke-mahasiswa', function () {
    $wali = App\Models\Wali::with('mahasiswa')->first();
    return "{$wali->nama} adalah wali dari {$wali->mahasiswa->nama}";
});
// one to many
Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);
Route::get('/mahasiswa-ke-dosen', function () {
    $mhs = Mahasiswa::where('nim', '123456')->first();
    return "{$mhs->nama} dibimbing oleh {$mhs->dosen->nama}";
});
// many to many
Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);
Route::get('/hobi/bola', function () {
    $hobi = Hobi::where('nama_hobi', 'Bermain Bola')->first();
    foreach ($hobi->mahasiswas as $mhs) {
        echo $mhs->nama . '<br>';
    }
});

Route::get('eloquent', [RelasiController::class, 'eloquent']);

Route::resource('dosen', DosenController::class);

Route::resource('hobi', HobiController::class);

Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class);

Route::resource('wali', App\Http\Controllers\WaliController::class);

 Route::get('/transaksi/search', [App\Http\Controllers\TransaksiController::class, 'search'])->name('transaksi.search');
Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
Route::resource('produk', App\Http\Controllers\ProdukController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('pembayaran', App\Http\Controllers\PembayaranController::class);