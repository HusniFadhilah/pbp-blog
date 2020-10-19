<?php

namespace App\Controllers;

use App\Models\PostModel;

class Post extends BaseController
{
    public function __construct()
    {
        $this->postModel = new PostModel();
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
            'post' => $post->paginate(1, 'post'),
            'pager' => $post->pager
        ];

        return view('public/dashboard/dashboard', $data);
    }

    public function detail($slug)
    {
        $data = [
            'slug' => $slug
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
        $data = [
            'title' => 'Data Post',
            'validation' => \Config\Services::validation(),
            'post' => $this->postModel->getDataPost()
        ];

        return view('penulis/post/post_data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Post',
            'validation' => \Config\Services::validation()
        ];

        return view('penulis/post/post_form_add', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'idkategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori harus diisi.'
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'isi_post' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi post harus diisi.'
                ]
            ],
        ])) {
            return redirect()->to('/post/add')->withInput();
        }
        // $this->postModel->save([
        //     'idkategori' => $this->request->getVar('idkategori'),
        //     'idpenulis' => $this->request->getVar('idpenulis'),
        //     'judul' => $this->request->getVar('judul'),
        //     'slug' => $this->request->getVar('slug'),
        //     'kota' => $this->request->getVar('kota'),
        //     'alamat' => $this->request->getVar('alamat')
        // ]);

        sweetalert('Post berhasil ditambahkan', 'success', 'Berhasil!');

        return redirect()->to('/post');
    }

    public function delete($id)
    {
        $this->penulisModel->delete($id);
        sweetalert('Penulis berhasil dihapus', 'success', 'Berhasil!');
        return redirect()->to('/penulis');
    }
}
