<?php

namespace App\Controllers;

use App\Models\Course_model;

class CourseController extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function Add_Course()
    {

        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            echo view('Course/course');
        } else {
            echo view('home/HomePage');
        }
    }
    public function CreateCourse()
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            echo view('Course/CreateCourse');
        } else {
            echo view('home/HomePage');
        }
    }
    /**** ส่วนของ View ****/
    public function Test()
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $model = new Course_model();
            $data['data'] = $model->Select_Video();
            echo view('Course/TestVideo', $data);
        } else {
            echo view('home/HomePage');
        }
    }

    public function Upload_Video()
    {
        $model = new Course_model();
        $title = $this->request->getVar("title");

        $file = $this->request->getFile('file');

        //echo $file->getClientName();
        if ($file->getSize() > 0) {
            $file_random = $file->getClientName();
            $upload_to = 'public/upload/';

            /*$image = \Config\Services::image()
                ->withFile($Photo)
                ->fit(626, 626, 'center')
                ->save('./public/upload/' . $Photo_Random_Name);*/

            //$Photo_Type = $upload_to . $Photo_Random_Name;
            $file->move('./public/upload', $file_random);
            $model->Upload_Video($title, $file_random);
            return redirect()->to(base_url('test55'));
            /*$User_Data = $model->Select_AllData($Email);
            while ($User = $User_Data->fetchRow()) {
                $Picture = $User['picture'];
            }
            //echo '<img src="'.$Picture.'"/>';
            $this->Data = [
                'Picture' => $Picture,
            ];
            $this->session->set($this->Data);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspอัพเดทโปรไฟล์เรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('profile'))->with('correct', $msg);*/
        }
    }
}
