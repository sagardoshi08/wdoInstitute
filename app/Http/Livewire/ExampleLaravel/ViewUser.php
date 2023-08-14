<?php

namespace App\Http\Livewire\ExampleLaravel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RoleStatus;
use App\Models\User_data;
use App\Models\User_address;
use DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ViewUser extends Controller
{

    public function viewuser($id)
    {
        $user = User::where('id',$id)->first();
        $user_data = User_data::where('user_id',$id)->first();
        $user_address = User_address::where('user_id',$id)->first();
        return view('livewire.example-laravel.viewuser',compact('user','user_data','user_address'));
    }

    // public function updateuser(Request $request){
    //     $data = [
    //         'name' => $request->name,
    //         'role' => $request->role,
    //     ];
    //     if($request->email != ''){
    //         $data['email'] = $request->email;
    //     }
    //     if($request->password != ''){
    //         $data['password'] =  Hash::make($request->password);
    //     }
    //     $tenth_details = [
    //         'tenth_board_name' => $request->tenth_board_name,
    //         'tenth_qua_year' => $request->tenth_qua_year,
    //         'tenth_percentage' => $request->tenth_percentage,
    //         'tenth_roll_no' => $request->tenth_roll_no
    //     ];


    //     $twelfth_details =  [
    //         'twelfth_board_name' => $request->twelfth_board_name,
    //         'twelfth_qua_year' => $request->twelfth_qua_year,
    //         'twelfth_percentage' => $request->twelfth_percentage,
    //         'twelfth_roll_no' => $request->twelfth_roll_no
    //     ];

    //     $university_details =
    //         [
    //             'university_name' => $request->university_name,
    //             'university_qua_year' => $request->university_qua_year,
    //             'university_percentage' => $request->university_percentage,
    //             'university_roll_no' => $request->university_roll_no

    //         ];

    //     $other_details =
    //     [
    //         'other_university_name' => $request->other_university_name,
    //         'other_university_qua_year' => $request->other_university_qua_year,
    //         'other_university_percentage' => $request->other_university_percentage,
    //         'other_university_roll_no' => $request->other_university_roll_no

    //     ];

    //     $industry_experience = array();
    //     foreach ($request->industry_name as $key => $value) {
    //         array_push(
    //             $industry_experience,
    //             [
    //                 'industry_name' => $request->industry_name[$key],
    //                 'industry_designation' => $request->industry_designation[$key],
    //                 'industry_salary' => $request->industry_salary[$key],
    //                 'industry_total_year' => $request->industry_total_year[$key]

    //             ]
    //         );
    //     }

    //     $users =  User::where('id',$request->id)->update($data);
    //     $user_data = [
    //         'father_name' => $request->father_name,
    //         'mother_name' => $request->mother_name,
    //         'date_of_birth' => $request->date_of_birth,
    //         'phone_number' => $request->phone_number,
    //         'alternate_phone_number' => $request->alternate_phone_number,
    //         'tenth_details' => json_encode($tenth_details),
    //         'twelfth_details' => json_encode($twelfth_details),
    //         'university_details' => json_encode($university_details),
    //         'other_details' => json_encode($other_details),
    //         'industry_experience' => json_encode($industry_experience),
    //     ];

    //     $user_address = [
    //         'p_street' => $request->p_street,
    //         'p_landmark' => $request->p_landmark,
    //         'p_country' => $request->p_country,
    //         'p_city' => $request->p_city,
    //         'p_state' => $request->p_state,
    //         'p_zipcode' => $request->p_zipcode,
    //         'c_street' => $request->c_street,
    //         'c_landmark' => $request->c_landmark,
    //         'c_country' => $request->c_country,
    //         'c_city' => $request->c_city,
    //         'c_state' => $request->c_state,
    //         'c_zipcode' => $request->c_zipcode,
    //     ];

    //     User_address::where('user_id',$request->id)->update($user_address);

    //     if ($request->tenth_marksheet) {
    //         $data = User_data::find($request->id);
    //         if($data->tenth_marksheet != ''){
    //             $tenth_marksheet = storage_path('app/'.$data->tenth_marksheet);
    //             if (File::exists($tenth_marksheet)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->tenth_marksheet));
    //             }
    //         }
    //         $tenth_marksheet =  $request->tenth_marksheet->store('user/tenth-marksheet');
    //         $user_data['tenth_marksheet'] = $tenth_marksheet;
    //     }
    //     if ($request->twelfth_marksheet) {
    //         $data = User_data::find($request->id);
    //         if($data->twelfth_marksheet != ''){
    //             $twelfth_marksheet = storage_path('app/'.$data->twelfth_marksheet);
    //             if (File::exists($twelfth_marksheet)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->twelfth_marksheet));
    //             }
    //         }
    //         $twelfth_marksheet = $request->twelfth_marksheet->store('user/twelfth-marksheet');
    //         $user_data['twelfth_marksheet'] = $twelfth_marksheet;
    //     }
    //     if ($request->aadhar_card) {
    //         $data = User_data::find($request->id);
    //         if($data->aadhar_card != ''){
    //             $aadhar_card = storage_path('app/'.$data->aadhar_card);
    //             if (File::exists($aadhar_card)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->aadhar_card));
    //             }
    //         }
    //         $aadhar_card = $request->aadhar_card->store('user/aadhar-card');
    //         $user_data['aadhar_card'] = $aadhar_card;
    //     }
    //     if ($request->alternative_govt_id_card) {
    //         $data = User_data::find($request->id);
    //         if($data->alternative_govt_id_card != ''){
    //             $alternative_govt_id_card = storage_path('app/'.$data->alternative_govt_id_card);
    //             if (File::exists($alternative_govt_id_card)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->alternative_govt_id_card));
    //             }
    //         }
    //         $alternative_govt_id_card =  $request->alternative_govt_id_card->store('user/alternative-govt-id-card');
    //         $user_data['alternative_govt_id_card'] = $alternative_govt_id_card;
    //     }


    //     if ($request->graduation_diploma) {
    //         $data = User_data::find($request->id);
    //         if($data->graduation_diploma != ''){
    //             $graduation_diploma = storage_path('app/'.$data->graduation_diploma);
    //             if (File::exists($graduation_diploma)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->graduation_diploma));
    //             }
    //         }
    //         $graduation_diploma =  $request->graduation_diploma->store('user/graduation-diploma');
    //         $user_data['graduation_diploma'] = $graduation_diploma;
    //     }
    //     if ($request->post_graduation) {
    //         $data = User_data::find($request->id);
    //         if($data->post_graduation != ''){
    //             $post_graduation = storage_path('app/'.$data->post_graduation);
    //             if (File::exists($post_graduation)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->post_graduation));
    //             }
    //         }
    //         $post_graduation =  $request->post_graduation->store('user/post-graduation');
    //         $user_data['post_graduation'] = $post_graduation;
    //     }
    //     if ($request->experience_certificate) {
    //         $data = User_data::find($request->id);
    //         if($data->experience_certificate != ''){
    //             $experience_certificate = storage_path('app/'.$data->experience_certificate);
    //             if (File::exists($experience_certificate)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->experience_certificate));
    //             }
    //         }
    //         $experience_certificate = $request->experience_certificate->store('user/experience-certificate');
    //         $user_data['experience_certificate'] = $experience_certificate;
    //     }
    //     if ($request->salary_slip) {
    //         $data = User_data::find($request->id);
    //         if($data->salary_slip != ''){
    //             $salary_slip = storage_path('app/'.$data->salary_slip);
    //             if (File::exists($salary_slip)) { // unlink or remove previous image from folder
    //                 unlink(storage_path('app/'.$data->salary_slip));
    //             }
    //         }
    //         $salary_slip = $request->salary_slip->store('user/salary-slip');
    //         $user_data['salary_slip'] = $salary_slip;
    //     }
    //     if ($request->crope_img) {
    //         $data = User_data::find($request->id);
    //         if($data->profile_image != ''){
    //             $userprofile = public_path('assets/'.$data->profile_image);
    //             if (File::exists($userprofile)) { // unlink or remove previous image from folder
    //                 unlink(public_path('assets/'.$data->profile_image));
    //             }
    //         }
    //         $image = $request->crope_img;
    //         list($type, $image) = explode(';', $image);
    //         list(, $image)      = explode(',', $image);
    //         $image = base64_decode($image);
    //         $image_name= time().'.png';
    //         $path = public_path('assets/profile_image/'.$image_name);

    //         file_put_contents($path, $image);
    //         $user_data['profile_image'] = 'profile_image/'.$image_name;
    //     }

    //     User_data::where('user_id',$request->id)->update($user_data);

    //     if($request->role == 'Admin'){
    //         $url = 'admin-management';
    //     }elseif($request->role == 'Manager'){
    //         $url = 'manager-management';
    //     }elseif($request->role == 'Team Leader'){
    //         $url = 'teamleader-management';
    //     }else{
    //         $url = 'emoloyee-management';
    //     }

    //     return redirect()->route($url)->with(session()->flash(
    //         'message','User Updated Successfully.')
    //     );
    // }

    // public function email_validation(Request $request){
    //     if ($request->input('email')) {
    //         if($request->input('id')){
    //             $count = User::where('email',$request->email)->where('id','!=',$request->input('id'))->count();
    //         }else{
    //             $count = User::where('email',$request->email)->count();
    //         }
    //         if ($count == '0') {
    //             die('true');
    //         }else{
    //             die('false');
    //         }
    //     }
    // }

    // public function viewuser(Request $request)
    // {
    //     return view('livewire.example-laravel.viewuser');
    // }
}
