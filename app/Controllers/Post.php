<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\KategoriModel;
use App\Models\PenulisModel;
use App\Models\KomentarModel;

class Post extends BaseController
{
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->kategoriModel = new KategoriModel();
        $this->penulisModel = new PenulisModel();
        $this->komentarModel = new KomentarModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $post = $this->postModel->pencarianPost($keyword);
        } else {
            $post = $this->postModel;
        }

        $data = [
            'title' => 'Post',
            'post' => $post->paginate(4, 'post'),
            'pager' => $post->pager,
            'keyword' => $keyword,
            'postterbaru1' => $this->postModel->postTerbaru(1),
            'postterbaru3' => $this->postModel->postTerbaru(3),
            'postterbaru5' => $this->postModel->postTerbaru(5),
            'allkategori' => $this->kategoriModel->findAll()
        ];

        return view('public/dashboard/dashboard', $data);
    }

    public function detail($slug)
    {
        $post = $this->postModel->getDataPostBySlug($slug);
        $data = [
            'post' => $post,
            'penulis' => $this->penulisModel->where(['idpenulis' => $post["idpenulis"]])->first(),
            'kategori' => $this->kategoriModel->where(['idkategori' => $post["idkategori"]])->first(),
            'allkategori' => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
            'postterbaru4' => $this->postModel->postTerbaru(4),
            'postterbaru3' => $this->postModel->postTerbaru(3),
            'komentar' => $this->komentarModel->getKomentarByPost($post["idpost"])
        ];
        return view('public/post/post_detail', $data);
    }


    function postTerbaru($limit = null)
    {
        if ($limit != null) {
            $data = $this->postModel->postTerbaru($limit);
        } else {
            $data =  $this->postModel->postTerbaru();
        }
        echo json_encode($data);
    }

    //--------------------------------------------------------------------
    public function data()
    {
        $user_session = session()->get('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }
        $data = [
            'title' => 'Post',
            'validation' => \Config\Services::validation(),
            'post' => $this->postModel->getDataPost(),
            'user' => $this->penulisModel->where(['idpenulis' => $user_session])->first()
        ];

        return view('penulis/post/post_data', $data);
    }

    public function add()
    {
        $user_session = session()->get('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Tambah Post',
            'validation' => \Config\Services::validation(),
            'kategori' => $kategori,
            'user' => $this->penulisModel->where(['idpenulis' => $user_session])->first()
        ];

        return view('penulis/post/post_form_add', $data);
    }

    public function save()
    {
        $user_session = session()->get('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }
        if (!$this->validate([
            'idkategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori harus diisi.'
                ]
            ],
            'judul' => [
                'rules' => 'required|is_unique[post.judul]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} post sudah terdaftar'
                ]
            ],
            'isi_post' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi post harus diisi.'
                ]
            ],
            'file_gambar' => [
                'rules' => 'max_size[file_gambar,2048]|is_image[file_gambar]|mime_in[file_gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar tidak boleh lebih dari 2mb',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/post/add')->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $file_gambar = $this->request->getFile('file_gambar');
        if ($file_gambar->getError() == 4) {
            $nama_gambar = 'default.jpg';
        } else {
            $ext = $file_gambar->getClientExtension();
            $nama_gambar = $slug . '.' . $ext;
            $file_gambar->move('assets/img/post', $nama_gambar);
        }


        $this->postModel->save([
            'idkategori' => $this->request->getVar('idkategori'),
            'idpenulis' => session()->get('idpenulis'),
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'isi_post' => $this->request->getVar('isi_post'),
            'file_gambar' => $nama_gambar
        ]);

        sweetalert('Post berhasil ditambahkan', 'success', 'Berhasil!');

        return redirect()->to('/post/data');
    }

    public function edit($id)
    {
        $user_session = session()->get('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'judul' => 'Edit Post',
            'validation' => \Config\Services::validation(),
            'post' => $this->postModel->find($id),
            'kategori' => $kategori,
            'user' => $this->penulisModel->where(['idpenulis' => $user_session])->first()
        ];

        return view('penulis/post/post_form_edit', $data);
    }

    public function update($id)
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }
        if (!$this->validate([
            'idkategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori harus diisi.'
                ]
            ],
            'judul' => [
                'rules' => "required|is_unique[post.judul,idpost,{$id}]",
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} post sudah terdaftar'
                ]
            ],
            'isi_post' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi post harus diisi.'
                ]
            ],
            'file_gambar' => [
                'rules' => 'max_size[file_gambar,2048]|is_image[file_gambar]|mime_in[file_gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar tidak boleh lebih dari 2mb',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/post/edit/' . $id)->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $file_gambar = $this->request->getFile('file_gambar');
        $file_gambar_lama = $this->request->getVar('file_gambar_lama');
        if ($file_gambar->getError() == 4) {
            $nama_gambar = $file_gambar_lama;
        } else {
            unlink('assets/img/post/' . $file_gambar_lama);
            $ext = $file_gambar->getClientExtension();
            $nama_gambar = $slug . '.' . $ext;
            $file_gambar->move('assets/img/post', $nama_gambar);
        }

        $this->postModel->save([
            'idpost' => $this->request->getVar('idpost'),
            'idkategori' => $this->request->getVar('idkategori'),
            'idpenulis' => session()->get('idpenulis'),
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'isi_post' => $this->request->getVar('isi_post'),
            'file_gambar' => $nama_gambar
        ]);

        sweetalert('Post berhasil diupdate', 'success', 'Berhasil!');

        return redirect()->to('/post/data');
    }

    public function delete($id)
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        $post = $this->postModel->find($id);

        if ($post["file_gambar"] != 'default.jpg') {
            unlink('assets/img/post/' . $post["file_gambar"]);
        }
        $this->postModel->delete($id);
        sweetalert('Post berhasil dihapus', 'success', 'Berhasil!');
        return redirect()->to('/post/data');
    }

    public function groupCategory($id)
    {
        $post = $this->postModel->groupPost($id);

        $data = [
            'title' => 'Group Post Berdasarkan Kategori',
            'post' => $post->paginate(10, 'post'),
            'pager' => $post->pager,
            'allkategori' => $this->kategoriModel->findAll()
        ];

        return view('public/post/post_group', $data);
    }
}
