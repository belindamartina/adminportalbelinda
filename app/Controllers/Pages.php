<?php

namespace App\Controllers;

use \App\Models\StudentsModel;

class Pages extends BaseController
{
    protected $studentsModel;

    public function __construct()
    {
        $this->studentsModel = new StudentsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('pages/home', $data);
    }

    public function students()
    {
        helper(['form']);
        helper('url');

        $currentPage = $this->request->getVar('page_students') ? $this->request->getVar('page_students') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $students = $this->studentsModel->search($keyword);
        } else {
            $students = $this->studentsModel;
        }

        $data = [
            'title' => 'Students | AdminPortal',
            // 'students' => $this->studentsModel->getStudent(),
            'validation' => \config\Services::validation(),
            'students' => $students->paginate(5, 'students'),
            'pager' => $this->studentsModel->pager,
            'currentPage' => $currentPage
        ];

        if ($this->request->isAJAX()) {
            return view('pages/students_table', $data);
        }

        return view('pages/students', $data);
    }

    public function detail($id)
    {
        helper(['form']);
        helper('url');

        $data = [
            'title' => 'Student Details | AdminPortal',
            'students' => $this->studentsModel->getStudent($id)
        ];


        return view('pages/detail', $data);
    }

    public function add()
    {
        $rules = [
            'name' => 'required',
            'sn' => 'required|numeric|min_length[8]|max_length[8]',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric|min_length[10]',
            'adress' => 'required',
            'photo' => 'uploaded[photo]|max_size[photo,2048]|max_dims[photo,300,300]|mime_in[photo,image/jpg,image/png,image/jpeg,image/jfif]|is_image[photo]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validated', 'formModal');
            $validation = \config\Services::validation();
            return redirect()->back()->withInput()->with('validated', 'formModal')->with('errors', $this->validator->getErrors());
        }

        //get photo
        $photoFile = $this->request->getFile('photo');
        //move file
        $photoFile->move('img');
        //get file name
        $photoName = $photoFile->getName();



        $this->studentsModel->save([
            'Photo' => $photoName,
            'name' => $this->request->getVar('name'),
            'sn' => $this->request->getVar('sn'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'adress' => $this->request->getVar('adress'),
        ]);

        session()->setFlashdata('message', 'New Student has been successfully added.');

        return redirect()->to('/pages/students');
    }

    public function delete($id)
    {
        $student = $this->studentsModel->find($id);

        unlink('img/' . $student['Photo']);
        $this->studentsModel->delete($id);
        session()->setFlashdata('message', 'Student data has been successfully deleted.');
        return redirect()->to('/pages/students');
    }

    public function edit($id)
    {
        $rules = [
            'name' => 'required',
            'sn' => 'required|numeric|min_length[8]|max_length[8]',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric|min_length[10]',
            'adress' => 'required',
            'photo' => 'uploaded[photo]|max_size[photo,2048]|max_dims[photo,300,300]|mime_in[photo,image/jpg,image/png,image/jpeg,image/jfif]|is_image[photo]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validated2', 'formEdit');
            $validation = \config\Services::validation();
            return redirect()->back()->withInput()->with('validated2', 'formEdit')->with('errors', $this->validator->getErrors());
        }

        //get photo
        $photoFile = $this->request->getFile('photo');
        //move file
        $photoFile->move('img');
        //get file name
        $photoName = $photoFile->getName();


        $this->studentsModel->save([
            'id' => $id,
            'Photo' => $photoName,
            'name' => $this->request->getVar('name'),
            'sn' => $this->request->getVar('sn'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'adress' => $this->request->getVar('adress'),
        ]);

        session()->setFlashdata('message', 'Student data has been successfully updated.');

        return redirect()->to('/pages/students');
    }

    public function contacts()
    {
        $data = [
            'title' => 'Contacts | Admin Portal'
        ];

        return view('pages/contacts', $data);
    }
}
