<?php

namespace App\Controllers;

use App\Models\Course_model;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Google\Cloud\Storage\StorageClient;


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
            echo view('Course/Course');
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
            // $data['data'] = $model->Select_Video();
            $data['data'] = $model->Select_Video_Google_Drive();
            echo view('Course/TestVideo', $data);
        } else {
            echo view('home/HomePage');
        }
    }
    public function Create_Course()
    {
        $course_name = $this->request->getVar('course_name');
        $category_course_id = $this->request->getVar('category_course_id');
        $course_description = $this->request->getVar('course_description');
        $User_id = $this->session->get("User_id");
        $model_course = new Course_model();
        $model_course->Insert_Course($course_name, $category_course_id, $course_description, $User_id);
        $msg = '&nbsp&nbsp&nbsp&nbsp&nbspสร้างคอร์สเรียบร้อยแล้ว&nbsp&nbsp&nbsp&nbsp&nbsp';
        return redirect()->to(base_url('course'))->with('correct', $msg);
    }
    /*public function Upload_Video()
    {
        $model = new Course_model();
        $title = $this->request->getVar("title");

        $file = $this->request->getFile('file');

        //echo $file->getClientName();
        if ($file->getSize() > 0) {
            $file_random = $file->getClientName();

            $file->move('./public/upload', $file_random);
            $model->Upload_Video($title, $file_random);
            return redirect()->to(base_url('test55'));
        }
    }*/


    // public function Create_Bucket()
    // {
    //     putenv("GOOGLE_APPLICATION_CREDENTIALS=workgress.json");

    //     # Your Google Cloud Platform project ID
    //     $projectId = 'workgress';
    //     # Instantiates a client
    //     $this->storage = new StorageClient([
    //         'projectId' => $projectId
    //     ]);

    //     # The name for the new bucket
    //     $bucketName = 'workgress';

    //     # Creates the new bucket
    //     $bucket = $this->storage->createBucket($bucketName);

    //     echo 'Bucket ' . $bucket->name() . ' created.';
    // }
    public function Upload_Video()
    {
        $model = new Course_model();
        //$file = $this->request->getFile('file');
        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');
        $content = file_get_contents($file['file']['tmp_name']);
        $bucket->upload($content, [
            'name' => $file['file']['name']
        ]);
        $filename = $file['file']['name'];
        $filelink = "https://storage.cloud.google.com/workgress/" . $file['file']['name'];
        //echo $filename . " " . $filelink;
        $model->Upload_Video($filename, $filelink);
        return redirect()->to(base_url('test55'));
    }
    // public function Link_Video()
    // {
    //     $model = new Course_model();
    //     $file = $this->request->getFile('file');
    //     $storage = new StorageClient();
    //     $bucket = $storage->bucket('workgress');
    //     $object = $bucket->upload($file, [
    //         'name' => $file->getClientName()
    //     ]);
    //     $filename = $file->getClientName();
    //     $filelink = "https://storage.cloud.google.com/workgress/'" . $file->getClientName() . "'";
    //     $model->Upload_Video($filename, $filelink);
    //     return redirect()->to(base_url('test55'));
    // }
}
