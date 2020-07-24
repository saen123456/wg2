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

    /*public function Upload_Video()
    {
        $model = new Course_model();
        function getClient()
        {
            $client = new Google_Client();
            $client->setApplicationName('Google Drive API PHP Quickstart');
            $client->setScopes(Google_Service_Drive::DRIVE);
            $client->setAuthConfig('client_secret.json');
            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');

            // Load previously authorized token from a file, if it exists.
            // The file token.json stores the user's access and refresh tokens, and is
            // created automatically when the authorization flow completes for the first
            // time.
            $tokenPath = 'token.json';
            if (file_exists($tokenPath)) {
                $accessToken = json_decode(file_get_contents($tokenPath), true);
                $client->setAccessToken($accessToken);
            }

            // If there is no previous token or it's expired.
            if ($client->isAccessTokenExpired()) {
                // Refresh the token if possible, else fetch a new one.
                if ($client->getRefreshToken()) {
                    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                } else {
                    // Request authorization from the user.
                    $authUrl = $client->createAuthUrl();
                    printf("Open the following link in your browser:\n%s\n", $authUrl);
                    print 'Enter verification code: ';
                    $authCode = trim(fgets(STDIN));

                    // Exchange authorization code for an access token.
                    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                    $client->setAccessToken($accessToken);

                    // Check to see if there was an error.
                    if (array_key_exists('error', $accessToken)) {
                        throw new Exception(join(', ', $accessToken));
                    }
                }
                // Save the token to a file.
                if (!file_exists(dirname($tokenPath))) {
                    mkdir(dirname($tokenPath), 0700, true);
                }
                file_put_contents($tokenPath, json_encode($client->getAccessToken()));
            }
            return $client;
        }


        // Get the API client and construct the service object.
        $client = getClient();
        $service = new Google_Service_Drive($client);

        // $file = $this->request->getFile('file');
        $file = $_FILES;
        //echo $file['file']['type'];
        $fileMetadata = new Google_Service_Drive_DriveFile(array(
            'name' => $file['file']['name'], //ชื่อที่จะเอาเข้า google ชื่อว่าอะไร
            'parents' => array('1PTbuFTmnD5AHrNX5r0f2XOdBbRa-vQjT') //ชื่อ folder ใน google drive
        ));
        $content = file_get_contents($file['file']['tmp_name']);
        $file = $service->files->create($fileMetadata, array(
            'mimeType' => $file['file']['type'],
            'data' => $content,
        ));
        //echo $file->getId();
        $model->Upload_Video($file->getId());
        return redirect()->to(base_url('test55'));
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
        set_time_limit(0);
        $file = $this->request->getFile('file');
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');
        $object = $bucket->upload($file, [
            'name' => $file->getClientName()
        ]);
    }
}
