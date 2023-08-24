<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RoleStatus;
use App\Models\User_data;
use App\Models\User_address;
use App\Models\States;
use DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;
use App\Mail\DemoMail;
use App\Mail\DefectMail;
use App\Mail\SendOfferLetter;

class EditController extends Controller
{

    public function index($id)
    {
        $user = User::where('id',$id)->first();
        $user_data = User_data::where('user_id',$id)->first();
        $user_address = User_address::where('user_id',$id)->first();
        $state = States::get();
        return view('livewire.example-laravel.edituser',compact('user','user_data','user_address','state'));
    }

    public function updateuser(Request $request){
        $data = [
            'name' => $request->name,
            'role' => $request->role,
        ];
        if($request->email != ''){
            $data['email'] = $request->email;
        }
        if($request->password != ''){
            $data['password'] =  Hash::make($request->password);
        }
        $tenth_details = [
            'tenth_board_name' => $request->tenth_board_name,
            'tenth_qua_year' => $request->tenth_qua_year,
            'tenth_percentage' => $request->tenth_percentage,
            'tenth_roll_no' => $request->tenth_roll_no
        ];


        $twelfth_details =  [
            'twelfth_board_name' => $request->twelfth_board_name,
            'twelfth_qua_year' => $request->twelfth_qua_year,
            'twelfth_percentage' => $request->twelfth_percentage,
            'twelfth_roll_no' => $request->twelfth_roll_no
        ];

        $university_details =
            [
                'university_name' => $request->university_name,
                'university_qua_year' => $request->university_qua_year,
                'university_percentage' => $request->university_percentage,
                'university_roll_no' => $request->university_roll_no

            ];

        $other_details =
        [
            'other_university_name' => $request->other_university_name,
            'other_university_qua_year' => $request->other_university_qua_year,
            'other_university_percentage' => $request->other_university_percentage,
            'other_university_roll_no' => $request->other_university_roll_no

        ];

        $industry_experience = array();
        foreach ($request->industry_name as $key => $value) {
            array_push(
                $industry_experience,
                [
                    'industry_name' => $request->industry_name[$key],
                    'industry_designation' => $request->industry_designation[$key],
                    'industry_salary' => $request->industry_salary[$key],
                    'industry_total_year' => $request->industry_total_year[$key]

                ]
            );
        }

        $users =  User::where('id',$request->id)->update($data);
        $user_data = [
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'alternate_phone_number' => $request->alternate_phone_number,
            'tenth_details' => json_encode($tenth_details),
            'twelfth_details' => json_encode($twelfth_details),
            'university_details' => json_encode($university_details),
            'other_details' => json_encode($other_details),
            'industry_experience' => json_encode($industry_experience),
        ];

        $user_address = [
            'p_street' => $request->p_street,
            'p_landmark' => $request->p_landmark,
            'p_country' => $request->p_country,
            'p_city' => $request->p_city,
            'p_state' => $request->p_state,
            'p_zipcode' => $request->p_zipcode,
            'c_street' => $request->c_street,
            'c_landmark' => $request->c_landmark,
            'c_country' => $request->c_country,
            'c_city' => $request->c_city,
            'c_state' => $request->c_state,
            'c_zipcode' => $request->c_zipcode,
        ];

        User_address::where('user_id',$request->id)->update($user_address);

        if ($request->tenth_marksheet) {
            $data = User_data::find($request->id);
            if($data->tenth_marksheet != ''){
                $tenth_marksheet = public_path('assets/'.$data->tenth_marksheet);
                if (File::exists($tenth_marksheet)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->tenth_marksheet));
                }
            }
            $tenth_marksheet = 'tenth_marksheet_'.$request->id.'.'.$request->tenth_marksheet->getClientOriginalExtension();
            $request->tenth_marksheet->move(public_path('assets/user/tenth-marksheet/'), $tenth_marksheet);

            $user_data['tenth_marksheet'] =  'user/tenth-marksheet/'.$tenth_marksheet;
        }
        if ($request->twelfth_marksheet) {
            $data = User_data::find($request->id);
            if($data->twelfth_marksheet != ''){
                $twelfth_marksheet = public_path('assets/'.$data->twelfth_marksheet);
                if (File::exists($twelfth_marksheet)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->twelfth_marksheet));
                }
            }
            $twelfth_marksheet = 'twelfth_marksheet_'.$request->id.'.'.$request->twelfth_marksheet->getClientOriginalExtension();
            $request->twelfth_marksheet->move(public_path('assets/user/twelfth-marksheet/'), $twelfth_marksheet);

            $user_data['twelfth_marksheet'] =  'user/twelfth-marksheet/'.$twelfth_marksheet;
        }
        if ($request->aadhar_card) {
            $data = User_data::find($request->id);
            if($data->aadhar_card != ''){
                $aadhar_card = public_path('assets/'.$data->aadhar_card);
                if (File::exists($aadhar_card)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->aadhar_card));
                }
            }
            $aadhar_card = 'aadhar_card_'.$request->id.'.'.$request->aadhar_card->getClientOriginalExtension();
            $request->aadhar_card->move(public_path('assets/user/aadhar-card/'), $aadhar_card);

            $user_data['aadhar_card'] =  'user/aadhar-card/'.$aadhar_card;
        }
        if ($request->alternative_govt_id_card) {
            $data = User_data::find($request->id);
            if($data->alternative_govt_id_card != ''){
                $alternative_govt_id_card = public_path('assets/'.$data->alternative_govt_id_card);
                if (File::exists($alternative_govt_id_card)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->alternative_govt_id_card));
                }
            }
            $alternative_govt_id_card = 'alternative_govt_id_'.$request->id.'.'.$request->alternative_govt_id_card->getClientOriginalExtension();
            $request->alternative_govt_id_card->move(public_path('assets/user/alternative-govt-id-card/'), $alternative_govt_id_card);

            $user_data['alternative_govt_id_card'] =  'user/alternative-govt-id-card/'.$alternative_govt_id_card;
        }

        if ($request->bank_passbook) {
            $data = User_data::find($request->id);
            if($data->bank_passbook != ''){
                $bank_passbook = public_path('assets/'.$data->bank_passbook);
                if (File::exists($bank_passbook)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->bank_passbook));
                }
            }
            $bank_passbook = 'bank_passbook'.$users.'.'.$request->bank_passbook->getClientOriginalExtension();
            $request->bank_passbook->move(public_path('assets/user/bank-passbook/'), $bank_passbook);

            $user_data['bank_passbook'] =  'user/bank-passbook/'.$bank_passbook;
        }

        if ($request->graduation_diploma) {
            $data = User_data::find($request->id);
            if($data->graduation_diploma != ''){
                $graduation_diploma = public_path('assets/'.$data->graduation_diploma);
                if (File::exists($graduation_diploma)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->graduation_diploma));
                }
            }
            $graduation_diploma = 'graduation_diploma_'.$request->id.'.'.$request->graduation_diploma->getClientOriginalExtension();
            $request->graduation_diploma->move(public_path('assets/user/graduation-diploma/'), $graduation_diploma);

            $user_data['graduation_diploma'] =  'user/graduation-diploma/'.$graduation_diploma;
        }
        if ($request->post_graduation) {
            $data = User_data::find($request->id);
            if($data->post_graduation != ''){
                $post_graduation = public_path('assets/'.$data->post_graduation);
                if (File::exists($post_graduation)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->post_graduation));
                }
            }
            $post_graduation = 'post_graduation_'.$request->id.'.'.$request->post_graduation->getClientOriginalExtension();
            $request->post_graduation->move(public_path('assets/user/post-graduation/'), $post_graduation);

            $user_data['post_graduation'] =  'user/post-graduation/'.$post_graduation;
        }
        if ($request->experience_certificate) {
            $data = User_data::find($request->id);
            if($data->experience_certificate != ''){
                $experience_certificate = public_path('assets/'.$data->experience_certificate);
                if (File::exists($experience_certificate)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->experience_certificate));
                }
            }
            $experience_certificate = 'experience_certificate_'.$request->id.'.'.$request->experience_certificate->getClientOriginalExtension();
            $request->experience_certificate->move(public_path('assets/user/experience-certificate/'), $experience_certificate);

            $user_data['experience_certificate'] =  'user/experience-certificate/'.$experience_certificate;
        }
        if ($request->salary_slip) {
            $data = User_data::find($request->id);
            if($data->salary_slip != ''){
                $salary_slip = public_path('assets/'.$data->salary_slip);
                if (File::exists($salary_slip)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->salary_slip));
                }
            }
            $salary_slip = 'salary_slip_'.$request->id.'.'.$request->salary_slip->getClientOriginalExtension();
            $request->salary_slip->move(public_path('assets/user/salary-slip/'), $salary_slip);
            $user_data['salary_slip'] =  'user/salary-slip/'.$salary_slip;
        }
        if ($request->crope_img) {
            $data = User_data::find($request->id);
            if($data->profile_image != ''){
                $userprofile = public_path('assets/'.$data->profile_image);
                if (File::exists($userprofile)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->profile_image));
                }
            }
            $image = $request->crope_img;
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name= 'profile_image_'.$request->id.'.png';
            $path = public_path('assets/profile_image/'.$image_name);

            file_put_contents($path, $image);
            $user_data['profile_image'] = 'profile_image/'.$image_name;
        }

        User_data::where('user_id',$request->id)->update($user_data);

        if($request->role == 'Admin'){
            $url = 'admin-management';
        }elseif($request->role == 'Manager'){
            $url = 'manager-management';
        }elseif($request->role == 'Team Leader'){
            $url = 'teamleader-management';
        }else{
            $url = 'emoloyee-management';
        }

        return redirect()->route($url)->with(session()->flash(
            'message','User Updated Successfully.')
        );
    }

    public function email_validation(Request $request){
        if ($request->input('email')) {
            if($request->input('id')){
                $count = User::where('email',$request->email)->where('id','!=',$request->input('id'))->count();
            }else{
                $count = User::where('email',$request->email)->count();
            }
            if ($count == '0') {
                die('true');
            }else{
                die('false');
            }
        }
    }

    public function allUser()
    {
        $role_status = RoleStatus::first();
        return view('livewire.example-laravel.user_management.all-user',compact('role_status'));
    }
    public function allActiveuser()
    {
        $role_status = RoleStatus::first();
        return view('livewire.example-laravel.user_management.all-active-user',compact('role_status'));
    }
    public function allpendingUser()
    {
        $role_status = RoleStatus::first();
        return view('livewire.example-laravel.user_management.pending-user',compact('role_status'));
    }
    public function allrejectUser()
    {
        $role_status = RoleStatus::first();
        return view('livewire.example-laravel.user_management.reject-user',compact('role_status'));
    }
    public function alldefectUser()
    {
        $role_status = RoleStatus::first();
        return view('livewire.example-laravel.user_management.defect-user',compact('role_status'));
    }

    public function jobStatusChange(Request $request)
    {
        //echo '<pre>'; print_r($request->all()); die();
        User::where('id',$request->emp_id)->update([
            'job_status' => $request->status
        ]);
        $mailData = [
            'name' => $request->emp_name,
            'role' => $request->emp_role,
            'title' => 'Mail from wdoinstitution.com',
            'body' => 'This is for testing email using smtp.'
        ];

        if($request->status == 'Reject'){
            Mail::to($request->emp_email_id)->send(new DemoMail($mailData));
            return redirect()->route('user.allrejectUser')->withSuccess('IT WORKS!');
        }elseif($request->status == 'Defect'){
            Mail::to($request->emp_email_id)->send(new DefectMail($mailData));
            return redirect()->route('user.alldefectUser')->withSuccess('IT WORKS!');
        }else{
            return redirect()->route('user2-management')->withSuccess('IT WORKS!');
        }


    }

    // public function jobStatusChange()
    // {
    //     $mailData = [
    //         'title' => 'Mail from wdoinstitution.com',
    //         'body' => 'This is for testing email using smtp.'
    //     ];

    //     Mail::to('jayesh.s.mts@gmail.com')->send(new DemoMail($mailData));

    //     dd("Email is sent successfully.");
    // }

    public function sendOfferLetter(Request $request){
        //echo '<pre>'; print_r($request->all()); die();
        $offer_details =  json_encode($request->all());
        $file = public_path("qq.pdf");
        $outputFilePath = public_path("offer_letter/".$request->emp_name."_".$request->emp_id.".pdf");
        $fpdi = new FPDI;

        $count = $fpdi->setSourceFile($file);

        for ($i=1; $i<=$count; $i++) {

            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            if($i==1){
                //first page date
                $fpdi->SetFont("helvetica", "", 15);
                $fpdi->Text('135','59',date('d-m-Y', strtotime($request->letter_iussue_date)));
                //w.e.f date
                $fpdi->SetFont("helvetica", "", 14);
                $fpdi->Text('31','147.50',date('d-m-Y', strtotime($request->letter_iussue_date)));
                //valid offer letter
                $fpdi->SetFont("helvetica", "", 13);
                $to = \Carbon\Carbon::parse($request->letter_iussue_date);
                $from = \Carbon\Carbon::parse($request->letter_iussue_validity);
                $valid_days= $to->diffInDays($from).' days';
                $fpdi->Text('83','156',$valid_days);
                //joing date
                $fpdi->SetFont("helvetica", "B", 13);
                $fpdi->Text('134','191',date('d-m-Y', strtotime($request->letter_iussue_validity)));
                //name after dear
                $fpdi->SetFont("helvetica", "B", 15);
                $fpdi->Text('31','118',$request->emp_name);
                //To name
                $fpdi->SetTextColor(255,0,0);
                $fpdi->Text('18','76',$request->emp_name);
                //address
                $fpdi->SetFont("helvetica", "", 12);
                $fpdi->Text('36','84',$request->address1);
                $fpdi->Text('36','90',$request->address2);
                //designation
                $fpdi->SetFont("helvetica", "", 14);
                $fpdi->Text('109','141.50',$request->Designation);
            }
            if($i==4){
                $fpdi->SetFont("helvetica", "", 13);
                $fpdi->SetTextColor(0,0,0);
                //yearly leave
                $fpdi->Text('38.50','113',$request->yearly_leave);
                //monthly leave
                $fpdi->Text('145','113',$request->monthly_leave);
                $fpdi->SetTextColor(255,0,0);
                //working days
                $workingdays = $request->start_time.' to '.$request->end_time.' '.$request->Days.'.';
                $fpdi->Text('117','100',$workingdays);
                //holidays
                if($request->Days == 'Monday to Friday'){
                    $holidays = 'Saturday and Sunday are holidays';
                }else{
                    $holidays = 'Sunday is holiday ';
                }
                $fpdi->Text('21','107',$holidays);
            }
            if($i==8){
                $fpdi->SetTextColor(0,0,0);
                //table name
                $fpdi->SetFont("helvetica", "", 14);
                $fpdi->Text('116','178',$request->emp_name);
                //table designation
                $fpdi->Text('116','185',$request->Designation);
                //table Date of Appointment
                $fpdi->Text('116','193',date('d-m-Y', strtotime($request->letter_iussue_date)));
                //table Date of Joining
                $fpdi->Text('116','199',date('d-m-Y', strtotime($request->letter_iussue_validity)));
                //table gross salary
                $fpdi->Text('116','234.50',number_format($request->gross_salary));
                //pf1
                $fpdi->Text('116','240.50',number_format($request->Pf2));
                //pf2
                $fpdi->Text('116','246.50',number_format($request->Pf1));
                //HRA
                $fpdi->Text('116','216.50',number_format($request->hra));
                //Conveyance Allowance
                $fpdi->Text('116','222.50',number_format($request->conveyance_allow));
                //Special Allowance
                $fpdi->Text('116','228.50',number_format($request->special_allow));
                //Mobile Allowance
                $fpdi->Text('116','252.50',number_format($request->mobile_allow));
                //Insurance benefits
                $fpdi->Text('116','258.50',number_format($request->insurance_benefits));
                //Gratuity
                $fpdi->Text('116','264.50',number_format($request->gratuity));
                $fpdi->SetTextColor(255,0,0);
                //table Basic
                $fpdi->Text('116','210.50',number_format($request->basic));
                //CTC
                $ctc = ($request->basic+$request->hra+$request->conveyance_allow+$request->special_allow+$request->mobile_allow+$request->gratuity+$request->gross_salary+$request->Pf1+$request->Pf2)*12;
                $fpdi->Text('116','270.25',number_format($ctc));

            }
            if($i==9){
                $fpdi->SetTextColor(0,0,0);
                $fpdi->SetFont("helvetica", "B", 13);
                $fpdi->Text('56','257.50',$request->emp_name);
            }
        }
        User::where('id',$request->emp_id)->update(['offer_datils'=>$offer_details]);
        $fpdi->Output($outputFilePath, 'F');
        // $mailData = [
        //     'name' => $request->emp_name,
        //     'attachment' => $outputFilePath
        // ];
        $url = asset("offer_letter/".$request->emp_name."_".$request->emp_id.".pdf");
        $filename = $outputFilePath;
        //Mail::to($request->emp_email_id)->send(new SendOfferLetter($mailData));
        echo json_encode(['url' =>  $url,'file' => $filename]);
    }

    public function mailOfferLetter(Request $request){
        $mailData = [
            'name' => $request->name,
            'attachment' => $request->file,
            'role' => $request->role,
        ];

        Mail::to($request->email)->send(new SendOfferLetter($mailData));

        echo json_encode(true);
    }

//pending user data
    public function pendingUserData()
    {
        if(auth()->user()->role == 'super_admin'){
            $user = User::where('role', '!=', 'super_admin')
                ->where('job_status','Pending')
                ->get();
        }elseif (auth()->user()->role == 'Admin') {
             $user = User::where('role', '!=', 'super_admin')
                ->where('role', '!=', 'Admin')
                ->where('job_status','Pending')
                ->get();
        }elseif (auth()->user()->role == 'Manager') {
             $user = User::where('role', '!=', 'super_admin')
                ->where('role', '!=', 'Admin')
                 ->where('role', '!=', 'Manager')
                ->where('job_status','Pending')
                ->get();
        }else{
            $user = User::where('role', 'Employee')
                ->orWhere('role', 'Other')
                ->where('job_status','Pending')
                ->get();
        }

        return view(
            'livewire.example-laravel.user_management.pending.alluser',
            [
                'users' => $user
            ]
        );
    }

    public function pendingadminData()
    {
            $user = User::where('role','Admin')
                ->where('job_status','Pending')
                ->get();

        return view(
            'livewire.example-laravel.user_management.pending.adminuser',
            [
                'users' => $user
            ]
        );
    }
    public function pendingmanagerData()
    {
            $user = User::where('role','Manager')
                ->where('job_status','Pending')
                ->get();

        return view(
            'livewire.example-laravel.user_management.pending.manageruser',
            [
                'users' => $user
            ]
        );
    }
    public function pendingteamleaderData()
    {
            $user = User::where('role','Team Leader')
                ->where('job_status','Pending')
                ->get();

        return view(
            'livewire.example-laravel.user_management.pending.teamleader',
            [
                'users' => $user
            ]
        );
    }
    public function pendingemployeeData()
    {
            $user = User::where('role','Employee')
                ->where('job_status','Pending')
                ->get();

        return view(
            'livewire.example-laravel.user_management.pending.employee',
            [
                'users' => $user
            ]
        );
    }

    //reject user data
    public function rejectUserData()
    {
        if(auth()->user()->role == 'super_admin'){
            $user = User::where('role', '!=', 'super_admin')
                ->where('job_status','Reject')
                ->get();
        }elseif (auth()->user()->role == 'Admin') {
             $user = User::where('role', '!=', 'super_admin')
                ->where('role', '!=', 'Admin')
                ->where('job_status','Reject')
                ->get();
        }elseif (auth()->user()->role == 'Manager') {
             $user = User::where('role', '!=', 'super_admin')
                ->where('role', '!=', 'Admin')
                 ->where('role', '!=', 'Manager')
                ->where('job_status','Reject')
                ->get();
        }else{
            $user = User::where('role', 'Employee')
                ->orWhere('role', 'Other')
                ->where('job_status','Reject')
                ->get();
        }

        return view(
            'livewire.example-laravel.user_management.reject.alluser',
            [
                'users' => $user
            ]
        );
    }
    public function rejectadminData()
    {
            $user = User::where('role','Admin')
                ->where('job_status','Reject')
                ->get();

        return view(
            'livewire.example-laravel.user_management.reject.adminuser',
            [
                'users' => $user
            ]
        );
    }
    public function rejectmanagerData()
    {
            $user = User::where('role','Manager')
                ->where('job_status','Reject')
                ->get();

        return view(
            'livewire.example-laravel.user_management.reject.manageruser',
            [
                'users' => $user
            ]
        );
    }
    public function rejectteamleaderData()
    {
            $user = User::where('role','Team Leader')
                ->where('job_status','Reject')
                ->get();

        return view(
            'livewire.example-laravel.user_management.reject.teamleader',
            [
                'users' => $user
            ]
        );
    }
    public function rejectemployeeData()
    {
            $user = User::where('role','Employee')
                ->where('job_status','Reject')
                ->get();

        return view(
            'livewire.example-laravel.user_management.reject.employee',
            [
                'users' => $user
            ]
        );
    }

    //defect user data
    public function defectUserData()
    {
        if(auth()->user()->role == 'super_admin'){
            $user = User::where('role', '!=', 'super_admin')
                ->where('job_status','Defect')
                ->get();
        }elseif (auth()->user()->role == 'Admin') {
            $user = User::where('role', '!=', 'super_admin')
                ->where('role', '!=', 'Admin')
                ->where('job_status','Defect')
                ->get();
        }elseif (auth()->user()->role == 'Manager') {
            $user = User::where('role', '!=', 'super_admin')
                ->where('role', '!=', 'Admin')
                ->where('role', '!=', 'Manager')
                ->where('job_status','Defect')
                ->get();
        }else{
            $user = User::where('role', 'Employee')
                ->orWhere('role', 'Other')
                ->where('job_status','Defect')
                ->get();
        }

        return view(
            'livewire.example-laravel.user_management.defect.alluser',
            [
                'users' => $user
            ]
        );
    }

    public function defectadminData()
    {
            $user = User::where('role','Admin')
                ->where('job_status','Defect')
                ->get();

        return view(
            'livewire.example-laravel.user_management.defect.adminuser',
            [
                'users' => $user
            ]
        );
    }
    public function defectmanagerData()
    {
            $user = User::where('role','Manager')
                ->where('job_status','Defect')
                ->get();

        return view(
            'livewire.example-laravel.user_management.defect.manageruser',
            [
                'users' => $user
            ]
        );
    }
    public function defectteamleaderData()
    {
            $user = User::where('role','Team Leader')
                ->where('job_status','Defect')
                ->get();

        return view(
            'livewire.example-laravel.user_management.defect.teamleader',
            [
                'users' => $user
            ]
        );
    }
    public function defectemployeeData()
    {
            $user = User::where('role','Employee')
                ->where('job_status','Defect')
                ->get();

        return view(
            'livewire.example-laravel.user_management.defect.employee',
            [
                'users' => $user
            ]
        );
    }

    public function textabout(Request $request)
    {
        $user = [
            'frustrations' => $request->frustrations,
            'goal' => $request->goal,
        ];
        User::where('id',$request->id)->update($user);
        echo json_encode(true);
    }
}
