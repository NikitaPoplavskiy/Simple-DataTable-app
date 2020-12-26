<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\User;
use DataTables;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class AdminHomeController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.home');
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function saveJson(Request $request) {


        $admin = User::where('role_id',1)->get()->toArray();

        if ($request->ajax()) {
            $json = $request->data;
            $my_save_dir = public_path();
            $filename = "\Users.json";
            $complete_filename = $my_save_dir.$filename;
            file_put_contents($complete_filename, $json);

            $filename = "./users.zip";

            // Initializing PHP class
            $zip = new \ZipArchive();

            if ($zip->open($filename, \ZipArchive::CREATE) === TRUE) {

                // Add File in ZipArchive
                $zip->addFile(public_path() . "/Users.json","Users.json");

                // Close ZipArchive
                $zip->close();
            }

            foreach($admin as $item) {
                $item = implode('', $item);
                try {
                    $email = new PHPMailer(true);
                    $email->SMTPDebug = SMTP::DEBUG_SERVER;
                    $email->isSMTP();
                    $email->SMTPDebug = 2;
                    $email->Debugoutput = 'html';
                    $email->Host       = 'smtp.gmail.com';
                    $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $email->Port       = 465;
                    $email->SMTPAuth   = true;                    
                    $email->Username   = $item['email'];
                    $email->Password   = config('send_email.admin.password');
                    $email->SetFrom($item);
                    $email->Subject   = 'Users table JSON';
                    $email->AddAddress($item);

                    $file_to_attach = $my_save_dir.'/users.zip';

                    $email->AddAttachment( $file_to_attach );

                    // Content
                    $email->isHTML(true);                                  
                    $email->Body    = 'Users table';
                    $email->AltBody = 'Users table';

                    $email->Send();
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

            }
        }
    }

    public function sendEmail(Request $request) {

        if ($request->ajax()) {
            rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
            file_put_contents();
        }

    }
}
