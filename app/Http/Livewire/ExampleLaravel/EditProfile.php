<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User_data;
use App\Models\User_address;
use Livewire\WithFileUploads;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;
use File;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class EditProfile extends Controller
{
    public function show()
    {
        $user = User::where('id',FacadesAuth::id())->first();
        $user_data = User_data::where('user_id',FacadesAuth::id())->first();
        $user_address = User_address::where('user_id',FacadesAuth::id())->first();
        return view(
            'livewire.example-laravel.editprofile',
            [
                'users' => $user,
                'user_data' =>$user_data,
                'user_address' =>$user_address
            ]
        );
    }
    public function updateprofile(Request $request){
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
        if ($request->offer_letter) {
            $data = User_data::find($request->id);
            if($data->offer_letter != ''){
                $offer_letter = public_path('assets/'.$data->offer_letter);
                if (File::exists($offer_letter)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->offer_letter));
                }
            }
            $offer_letter = 'offer_letter_'.$request->id.'.'.$request->offer_letter->getClientOriginalExtension();
            $request->offer_letter->move(public_path('assets/user/salary-slip/'), $offer_letter);
            $user_data['offer_letter'] =  'user/salary-slip/'.$offer_letter;
        }
        if ($request->joining_letter) {
            $data = User_data::find($request->id);
            if($data->joining_letter != ''){
                $joining_letter = public_path('assets/'.$data->joining_letter);
                if (File::exists($joining_letter)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->joining_letter));
                }
            }
            $joining_letter = 'joining_letter_'.$request->id.'.'.$request->joining_letter->getClientOriginalExtension();
            $request->joining_letter->move(public_path('assets/user/salary-slip/'), $joining_letter);
            $user_data['joining_letter'] =  'user/salary-slip/'.$joining_letter;
        }
        if ($request->resignation_letter) {
            $data = User_data::find($request->id);
            if($data->resignation_letter != ''){
                $resignation_letter = public_path('assets/'.$data->resignation_letter);
                if (File::exists($resignation_letter)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$data->resignation_letter));
                }
            }
            $resignation_letter = 'resignation_letter_'.$request->id.'.'.$request->resignation_letter->getClientOriginalExtension();
            $request->resignation_letter->move(public_path('assets/user/salary-slip/'), $resignation_letter);
            $user_data['resignation_letter'] =  'user/salary-slip/'.$resignation_letter;
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
            $image_name='profile_image_'.$request->id.'.png';
            $path = public_path('assets/profile_image/'.$image_name);

            file_put_contents($path, $image);
            $user_data['profile_image'] = 'profile_image/'.$image_name;
        }

        User_data::where('user_id',$request->id)->update($user_data);

        return redirect()->route('user-management')->with(session()->flash(
            'message','User Updated Successfully.')
        );
    }
    public function viewProfile()
    {
        $user = User::where('id',Auth::id())->first();
        $user_data = User_data::where('user_id',Auth::id())->first();
        $user_address = User_address::where('user_id',Auth::id())->first();
        return view('livewire.example-laravel.viewprofile',compact('user','user_data','user_address'));
    }

}
