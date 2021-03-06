<?php

namespace App\Controllers;

use App\Models\Course_model;

use Google\Cloud\Storage\StorageClient;


class CourseController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function Show_Course()
    {
        echo view('Course/Show_Course');
    }
    public function Category_Course()
    {
        echo view('Course/Category_Course');
    }
    public function Add_Course()
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $model = new Course_model();
            $id =  $this->session->get("User_id");
            $data['data'] = $model->Select_Course($id);
            echo view('Course/Course', $data);
        } else {
            echo view('home/HomePage');
        }
    }
    public function CreateCourse()
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            echo view('Course/CreateCourse');
        } else {
            echo view('login/HomePage');
        }
    }
    public function CreateCourseStep2($id = null)
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $course_id =  $id;
            $this->Data = [
                'Course_id' => $course_id,
            ];
            $this->session->set($this->Data);
            echo view('Course/CreateCourseStep2');
        } else {
            echo view('login/HomePage');
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
            echo view('login/HomePage');
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
        $course_id =  $model_course->Select_newcourse($User_id);
        $this->Data = [
            'Course_id' => $course_id,
        ];
        $this->session->set($this->Data);
        return redirect()->to(base_url('course/manage/config/' . $course_id));
    }

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
    public function Upload_Course()
    {
        $model = new Course_model();

        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');
        $content = file_get_contents($file['uploadFile']['tmp_name']);
        $file_name = $file['uploadFile']['name'];

        $bucket->upload($content, [
            'name' => $file_name
        ]);

        $filelink = "https://storage.googleapis.com/workgress/" . $file['uploadFile']['name'];
        $model->Upload_Video($file_name, $filelink);
        echo "upload success";
        //return redirect()->to(base_url('test55'));
    }

    public function Upload_Test()
    {
        $Unit = 1;

        ?>
        <script>
            console.log(<?php echo $Unit ?>);
        </script>
<?php
        $file = $this->request->getFile('Unit_Video_File');
        if ($file->getSize() > 0) {
            $file_random = $file->getClientName();
            $file->move('./public/upload', $file_random);
            //$model->Upload_Video($title, $file_random);
            //echo "<img width='200px' src='upload/" . $image_name . "' class='preview'>";

            echo $Unit;
        } else {
            echo "image uploading failed";
        }
    }


    public function Upload_Video()
    {
        
        $model = new Course_model();
        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');

        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);
        $file_name = $file['uploadFile']['name'];

        if ($bucket->upload($content, ['name' => $file_name])) {
            $filelink = "https://storage.googleapis.com/workgress/" . $file['Unit_Video_File']['name'];
            $model->Upload_Video($file_name, $filelink);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }

        //return redirect()->to(base_url('test55'));
    }
    public function Upload_Unit()
    {
        $model = new Course_model();
        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');

        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);
        $Video_Name = $file['Unit_Video_File']['name'];
        $Unit_Name = $this->request->getVar('Unit_Name');
        $User_id = $this->session->get("User_id");
        $Course_id = $this->session->get("Course_id");
        $Unit = $_GET['unit'];
        if ($bucket->upload($content, ['name' => $Video_Name])) {
            $Video_link = "https://storage.googleapis.com/workgress/" . $Video_Name;
            $model->Upload_Unit($Course_id, $Video_link, $User_id, $Unit_Name, $Unit, $Video_Name);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }

        //return redirect()->to(base_url('test55'));
    }
}
