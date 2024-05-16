<?php

namespace App\Controllers;

use App\Models\BlogsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Blogs extends BaseController
{
    public function index()
    {
        $model = model(BlogsModel::class);

        $data = [
            'blogs'  => $model->getBlogs(),
            'title' => 'Valorant Blogs',
        ];

        return view('templates/header', $data)
            . view('blogs/index')
            . view('templates/footer');
    }

    public function show($slug = null)
    {
        $model = model(BlogsModel::class);

        $data['blog'] = $model->getBlogs($slug);

        if (empty($data['blog'])) {
            throw new PageNotFoundException('Cannot find the blogs item: ' . $slug);
        }

        $data['title'] = $data['blog']['title'];

        return view('templates/header', $data)
            . view('blogs/view')
            . view('templates/footer');
    }
    
    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a blogs item'])
            . view('blogs/create')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(BlogsModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Create a blogs item'])
            . view('blogs/success')
            . view('templates/footer');
    }
    
    public function edit($id = null)
    {
        helper('form');
        $model = model(BlogsModel::class);
        $data['blogs'] = $model->find($id);
        if (empty($data['blogs'])) {
            throw new PageNotFoundException('Cannot find the blogs item: ' . $id);
        }
        $data['title'] = 'Edit blogs item';
        return view('templates/header', $data)
            . view('blogs/edit')
            . view('templates/footer');
    }

    public function update($id = null)
    {
        helper('form');
        $model = model(BlogsModel::class);
        $data = $this->request->getPost(['title', 'body']);
        if (! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            return $this->edit($id);
        }
        $post = $this->validator->getValidated();
        $model->updateBlogs($id, [
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);
        return view('templates/header', ['title' => 'Edit blogs item'])
            . view('blogs/success')
            . view('templates/footer');
    }

    public function delete($id)
    {
        $model = model(BlogsModel::class);
        $model->deleteBlogs($id);
        return redirect()->to('/blogs');
    }
}