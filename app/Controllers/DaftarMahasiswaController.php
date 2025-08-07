<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarMahasiswaModel;

class DaftarMahasiswaController extends BaseController
{
    protected $modeldaftarmahasiswa;

    public function __construct()
    {
        $this->modeldaftarmahasiswa = new DaftarMahasiswaModel();
    }

    // Mahasiswa melihat pendaftaran sendiri
    public function index()
    {
        $data = [
            'daftarmahasiswa' => $this->modeldaftarmahasiswa
                ->where('user_id', session()->get('user_id')) // filter berdasarkan user login
                ->findAll()
        ];
        return view('mhs/daftarmahasiswa', $data);
    }

    // Mitra melihat daftar pelamar
    public function indexForMitra()
    {
        // DEBUG LOGIN SEBAGAI MITRA
        session()->set([
            'user_id'   => 999,
            'username'  => 'debug-mitra',
            'role'      => 'mitra',
            'isLoggedIn' => true,
        ]);

        $data = [
            'daftarmahasiswa' => $this->modeldaftarmahasiswa->findAll()
        ];
        return view('mitra/mahasiswaygmelamar', $data);
    }

    public function create()
    {
        // Ambil mitra yang sudah di-ACC
        $db = \Config\Database::connect();
    $mitraAcc = $db->table('mitra')->where('status_acc', 1)->get()->getResultArray();

    return view('mhs/create', ['mitraAcc' => $mitraAcc]);
        return view('mhs/create');
    }

    public function store()
    {

        // log_message('debug', 'SESSION SAAT STORE: ' . json_encode(session()->get()));

        //     dd(session()->get());

        $userId = session()->get('user_id');
        $username = session()->get('username');

        if (!$userId) {
            return redirect()->to('/masuk')->with('error', 'Silakan login terlebih dahulu');
        }

        $data = [
            'user_id'              => $userId,
            'username'             => $username, // <-- tambahan agar username tersimpan
            'nama'                 => $this->request->getPost('nama'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'alamat'               => $this->request->getPost('alamat'),
            'nim'                  => $this->request->getPost('nim'),
            'jurusan'              => $this->request->getPost('jurusan'),
            'posisi'               => $this->request->getPost('posisi'),
            'mitra'                => $this->request->getPost('mitra'),
        ];

        $this->modeldaftarmahasiswa->save($data);
        return redirect()->to('/daftarmahasiswa');
    }

    public function edit($id)
    {
        $data['daftarmahasiswa'] = $this->modeldaftarmahasiswa->find($id);
        return view('mhs/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'user_id'              => session()->get('user_id'),
            'username'             => session()->get('username'), // <-- tambahan agar ikut di-update
            'id'                   => $id,
            'nama'                 => $this->request->getPost('nama'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'alamat'               => $this->request->getPost('alamat'),
            'nim'                  => $this->request->getPost('nim'),
            'jurusan'              => $this->request->getPost('jurusan'),
            'posisi'               => $this->request->getPost('posisi'),
            'mitra'                => $this->request->getPost('mitra'),
        ];

        $this->modeldaftarmahasiswa->save($data);
        return redirect()->to('/daftarmahasiswa');
    }

    public function delete($id)
    {
        $this->modeldaftarmahasiswa->delete($id);
        return redirect()->to('/daftarmahasiswa');
    }

    public function acc($id)
    {
        $this->modeldaftarmahasiswa->update($id, [
            'status_acc' => 'Sudah Diacc'
        ]);
        return redirect()->to('/home')->with('success', 'Mahasiswa berhasil di-ACC');
    }

    public function adminIndex()
    {
        $data = [
            'daftarmahasiswa' => $this->modeldaftarmahasiswa->findAll() // admin lihat semua
        ];
        return view('admin/home', $data);
    }
}
