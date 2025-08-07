<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ========== Static Pages ==========
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mitra', 'Mitra::index');
$routes->get('/formulir', 'Formulir::index');
$routes->get('/daftarmitra', 'Daftarmitra::index');
$routes->get('/home', 'DaftarMahasiswaController::adminIndex');

// ========== Daftar Mahasiswa ==========
$routes->get('/daftarmahasiswa', 'DaftarMahasiswaController::index');
$routes->get('/daftarmahasiswa/show/(:num)', 'DaftarMahasiswaController::show/$1');
$routes->get('/daftarmahasiswa/create', 'DaftarMahasiswaController::create');
$routes->post('/daftarmahasiswa/store', 'DaftarMahasiswaController::store');
$routes->get('/daftarmahasiswa/edit/(:num)', 'DaftarMahasiswaController::edit/$1');
$routes->post('/daftarmahasiswa/update/(:num)', 'DaftarMahasiswaController::update/$1');
$routes->post('/daftarmahasiswa/delete/(:num)', 'DaftarMahasiswaController::delete/$1');
$routes->get('/daftarmahasiswa/acc/(:num)', 'DaftarMahasiswaController::acc/$1');

// Mahasiswa yang Melamar untuk Mitra
$routes->get('/mitra/mahasiswa-melamar', 'DaftarMahasiswaController::indexForMitra');
$routes->post('/daftarmahasiswa/delete/(:num)', 'DaftarMahasiswaController::delete/$1'); // Duplikat, tapi tidak diubah

// ========== Login & Registrasi ==========
$routes->get('/registrasi', 'Registrasi::index');
$routes->post('/registrasi/save', 'Registrasi::save');
$routes->get('/masuk', 'Masuk::index');
$routes->post('/masuk/auth', 'Masuk::auth');

// ========== Role-based Access Filters ==========
$routes->get('/mahasiswa', 'Mahasiswa::index', [
    'filter' => ['auth', 'rolefilter:mahasiswa']
]);

$routes->get('/mitra', 'Mitra::index', [
    'filter' => ['auth', 'rolefilter:mitra']
]);

// ========== Halaman Error ==========
$routes->get('/unauthorized', function () {
    return view('errors/unauthorized');
});

// ========== Formulir Mitra ==========
$routes->get('formulir-mitra', 'FormulirMitra::index');
$routes->get('validasi', 'FormulirMitra::validasi'); // Duplikat route 'validasi'
$routes->post('formulir-mitra/simpan', 'FormulirMitra::simpan');

// ========== Validasi ==========
$routes->get('validasi', 'ValidasiController::index'); // Duplikat
$routes->get('validasiacc', 'ValidasiController::index');
$routes->get('validasi/acc/(:num)', 'ValidasiController::acc/$1');
$routes->get('validasi/delete/(:num)', 'ValidasiController::delete/$1');

// ========== Validasi Formulir ==========
$routes->get('validasi-formulir', 'ValidasiController::index');
$routes->get('validasiformulir', 'ValidasiFormulirController::index');

// ========== Data Mitra ==========
$routes->get('datamitra', 'DataMitra::index');

// ========== Tracker Study ==========
$routes->get('/validasiview', 'TrackerStudy::validasi');
$routes->get('trackerstudy', 'TrackerStudy::index');
$routes->post('trackerstudy/store', 'TrackerStudy::store');

// ========== Logout ==========
$routes->get('/logout', 'Auth::logout'); // Duplikat
$routes->get('/logout', 'Mitra::logout'); // Duplikat

// ========== Lowongan Mitra ==========
$routes->get('/listLowonganMitra', 'Lowongan::index'); // Duplikat

// ========== Notes ==========
/*
 * Catatan:
 * - Terdapat beberapa route yang **duplikat** (misalnya 'validasi', 'logout', 'listLowonganMitra').
 * - Tidak dilakukan penghapusan atau penggabungan karena permintaan untuk **tidak mengubah satu pun**.
 * - Dianjurkan membersihkan route duplikat di masa depan agar tidak terjadi konflik.
 */

// ========== TODO ==========
/*
 * - Autentikasi dan Hak Akses setiap aktor akan ditambahkan berikutnya.
 */
