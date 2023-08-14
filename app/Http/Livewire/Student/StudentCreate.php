<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\States;
use App\Models\Bank;
use App\Models\College;
use Spatie\SimpleExcel\SimpleExcelWriter;
use DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;


class StudentCreate extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';
    public $search_name = '';

    use WithFileUploads;

    public $application_availability, $application_number, $year, $number, $uuid, $self_image, $aadhar_card_front,
        $aadhar_card_back, $prtc, $caste_certificate, $bonafide_nsp, $bonafide_college, $pre_year_mark, $income_certificate,
        $signature, $agent_name, $agent_mobile, $ten_path_year, $ten_total_mark, $ten_mark, $ten_percentage, $twelve_path_year,
        $twelve_total_mark, $twelve_mark, $twelve_percentage, $student_name, $father_name, $mother_name, $email_address, $dob,
        $gender, $phone_number, $family_income, $state, $district, $sub_division, $cast, $city, $pincode, $address_1, $address_2,
        $account_number, $IFSC_code, $bank_name, $branch_name, $college_name, $course_details, $collage_current_year, $collage_percentage;
    public $isOpen = 0 , $isView = 0;

    public function render()
    {
        $students = Student::get();
        $state = States::all();
        return view(
            'livewire.student.add',
            [
                'students' => $students,
                'state' => $state,
            ]
        );
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function openView()
    {
        $this->isView = true;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
        $this->isView = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->resetErrorBag();
        $this->application_availability = '';
        $this->application_number = '';
        $this->year = '';
        $this->number = '';
        $this->uuid = '';
        $this->self_image = '';
        $this->aadhar_card_front = '';
        $this->aadhar_card_back = '';
        $this->prtc = '';
        $this->caste_certificate = '';
        $this->bonafide_nsp = '';
        $this->bonafide_college = '';
        $this->pre_year_mark = '';
        $this->income_certificate = '';
        $this->signature = '';
        $this->agent_name = '';
        $this->agent_mobile = '';
        $this->ten_path_year = '';
        $this->ten_total_mark = '';
        $this->ten_mark = '';
        $this->ten_percentage = '';
        $this->twelve_path_year = '';
        $this->twelve_total_mark = '';
        $this->twelve_mark = '';
        $this->twelve_percentage = '';
        $this->student_name = '';
        $this->father_name = '';
        $this->mother_name = '';
        $this->email_address = '';
        $this->dob = '';
        $this->gender = '';
        $this->phone_number = '';
        $this->family_income = '';
        $this->state = '';
        $this->district = '';
        $this->sub_division = '';
        $this->cast = '';
        $this->city = '';
        $this->pincode = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->account_number = '';
        $this->IFSC_code = '';
        $this->bank_name = '';
        $this->branch_name = '';
        $this->college_name = '';
        $this->course_details = '';
        $this->collage_current_year = '';
        $this->collage_percentage = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public function store()
    // {
    //     $uuid = (string) Str::uuid();

    //     $this->validate([
    //         'application_availability' => 'required',
    //         'application_number' => 'required',
    //         'year' => 'required',
    //         'number' => 'required',
    //         'account_number' => 'required',
    //         'IFSC_code' => 'required',
    //         'bank_name' => 'required',
    //         'branch_name' => 'required',
    //         'agent_name' => 'required',
    //         'agent_mobile' => 'required',
    //         'ten_path_year' => 'required',
    //         'ten_total_mark' => 'required',
    //         'ten_mark' => 'required',
    //         'ten_percentage' => 'required',
    //         'twelve_path_year' => 'required',
    //         'twelve_total_mark' => 'required',
    //         'twelve_mark' => 'required',
    //         'twelve_percentage' => 'required',
    //         'college_name' => 'required',
    //         'course_details' => 'required',
    //         'collage_current_year' => 'required',
    //         'collage_percentage' => 'required',
    //         'student_name' => 'required',
    //         'father_name' => 'required',
    //         'mother_name' => 'required',
    //         'dob' => 'required',
    //         'gender' => 'required',
    //         'phone_number' => 'required',
    //         'family_income' => 'required',
    //         'state' => 'required',
    //         'district' => 'required',
    //         'sub_division' => 'required',
    //         'cast' => 'required',
    //         'city' => 'required',
    //         'pincode' => 'required',
    //         'address_1' => 'required',
    //         'address_2' => 'required',
    //     ]);


    //     $data = [
    //         'application_availability' => $this->application_availability,
    //         'application_number' => $this->application_number,
    //         'year' => $this->year,
    //         'number' => $this->number,
    //         'agent_name' => $this->agent_name,
    //         'agent_mobile' => $this->agent_mobile,
    //         'ten_path_year' => $this->ten_path_year,
    //         'ten_total_mark' => $this->ten_total_mark,
    //         'ten_mark' => $this->ten_mark,
    //         'ten_percentage' => $this->ten_percentage,
    //         'twelve_path_year' => $this->twelve_path_year,
    //         'twelve_total_mark' => $this->twelve_total_mark,
    //         'twelve_mark' => $this->twelve_mark,
    //         'twelve_percentage' => $this->twelve_percentage,
    //         'student_name' => $this->student_name,
    //         'father_name' => $this->father_name,
    //         'mother_name' => $this->mother_name,
    //         'dob' => $this->dob,
    //         'gender' => $this->gender,
    //         'phone_number' => $this->phone_number,
    //         'family_income' => $this->family_income,
    //         'state' => $this->state,
    //         'district' => $this->district,
    //         'sub_division' => $this->sub_division,
    //         'cast' => $this->cast,
    //         'city' => $this->city,
    //         'pincode' => $this->pincode,
    //         'address_1' => $this->address_1,
    //         'address_2' => $this->address_2,
    //         'account_number' => $this->account_number,
    //         'IFSC_code' => $this->IFSC_code,
    //         'bank_name' => $this->bank_name,
    //         'branch_name' => $this->branch_name,
    //         'college_name' => $this->college_name,
    //         'course_details' => $this->course_details,
    //         'collage_current_year' => $this->collage_current_year,
    //         'collage_percentage' => $this->collage_percentage,
    //     ];

    //     if ($this->uuid == null) {
    //         $data['uuid'] = $uuid;
    //         $data['email_address'] = $this->email_address;
    //         $data['created_by'] = Auth::id() ;
    //         $this->validate([
    //             'email_address' => 'required|string|email|max:255|unique:students'
    //         ]);
    //     } else {
    //         $this->validate([
    //             'email_address' => 'required|string|email|max:255|',
    //         ]);
    //     }
    //     if ($this->self_image) {
    //         $self_image = time().'.'.$this->self_image->getClientOriginalExtension();
    //         $this->self_image->move(public_path('assets/student/self_image/'), $self_image);

    //         $data['self_image'] =  'student/self_image/'.$self_image;

    //         // $self_image =   $this->self_image->store('student/self_image');
    //         // $data['self_image'] = $self_image;
    //     }

    //     if ($this->aadhar_card_front) {
    //         $aadhar_card_front = time().'.'.$this->aadhar_card_front->getClientOriginalExtension();
    //         $this->aadhar_card_front->move(public_path('assets/student/aadhar_card_front/'), $aadhar_card_front);

    //         $data['aadhar_card_front'] =  'student/aadhar_card_front/'.$aadhar_card_front;

    //         // $aadhar_card_front =   $this->aadhar_card_front->store('student/aadhar_card_front');
    //         // $data['aadhar_card_front'] = $aadhar_card_front;
    //     }

    //     if ($this->aadhar_card_back){
    //         $aadhar_card_back = time().'.'.$this->aadhar_card_back->getClientOriginalExtension();
    //         $this->aadhar_card_back->move(public_path('assets/student/aadhar_card_back/'), $aadhar_card_back);

    //         $data['aadhar_card_back'] =  'student/aadhar_card_back/'.$aadhar_card_back;

    //         // $aadhar_card_back =   $this->aadhar_card_back->store('student/aadhar_card_back');
    //         // $data['aadhar_card_back'] = $aadhar_card_back;
    //     }

    //     if ($this->prtc) {
    //         $prtc = time().'.'.$this->prtc->getClientOriginalExtension();
    //         $this->prtc->move(public_path('assets/student/prtc/'), $prtc);

    //         $data['prtc'] =  'student/prtc/'.$prtc;

    //         // $prtc =  $this->prtc->store('student/prtc');
    //         // $data['prtc'] = $prtc;
    //     }

    //     if ($this->caste_certificate) {
    //         $caste_certificate = time().'.'.$this->caste_certificate->getClientOriginalExtension();
    //         $this->caste_certificate->move(public_path('assets/student/caste_certificate/'), $caste_certificate);

    //         $data['caste_certificate'] =  'student/caste_certificate/'.$caste_certificate;

    //         // $caste_certificate =  $this->caste_certificate->store('student/caste_certificate');
    //         // $data['caste_certificate'] = $caste_certificate;
    //     }

    //     if ($this->bonafide_nsp){
    //         $bonafide_nsp = time().'.'.$this->bonafide_nsp->getClientOriginalExtension();
    //         $this->bonafide_nsp->move(public_path('assets/student/bonafide_nsp/'), $bonafide_nsp);

    //         $data['bonafide_nsp'] =  'student/bonafide_nsp/'.$bonafide_nsp;

    //         // $bonafide_nsp =  $this->bonafide_nsp->store('student/bonafide_nsp');
    //         // $data['bonafide_nsp'] = $bonafide_nsp;
    //     }

    //     if ($this->bonafide_college) {
    //         $bonafide_college = time().'.'.$this->bonafide_college->getClientOriginalExtension();
    //         $this->bonafide_college->move(public_path('assets/student/bonafide_college/'), $bonafide_college);

    //         $data['bonafide_college'] =  'student/bonafide_college/'.$bonafide_college;

    //         // $bonafide_college = $this->bonafide_college->store('student/bonafide_college');
    //         // $data['bonafide_college'] = $bonafide_college;
    //     }

    //     if ($this->pre_year_mark) {
    //         $pre_year_mark = time().'.'.$this->pre_year_mark->getClientOriginalExtension();
    //         $this->pre_year_mark->move(public_path('assets/student/pre_year_mark/'), $pre_year_mark);

    //         $data['pre_year_mark'] =  'student/pre_year_mark/'.$pre_year_mark;

    //         // $pre_year_mark = $this->pre_year_mark->store('student/pre_year_mark');
    //         // $data['pre_year_mark'] = $pre_year_mark;
    //     }

    //     if ($this->income_certificate){
    //         $income_certificate = time().'.'.$this->income_certificate->getClientOriginalExtension();
    //         $this->income_certificate->move(public_path('assets/student/income_certificate/'), $income_certificate);

    //         $data['income_certificate'] =  'student/income_certificate/'.$income_certificate;

    //         // $income_certificate =  $this->income_certificate->store('student/income_certificate');
    //         // $data['income_certificate'] = $income_certificate;
    //     }

    //     if ($this->signature) {
    //         $signature = time().'.'.$this->signature->getClientOriginalExtension();
    //         $this->signature->move(public_path('assets/student/signature/'), $signature);

    //         $data['signature'] =  'student/signature/'.$signature;

    //         // $signature =  $this->signature->store('student/signature');
    //         // $data['signature'] = $signature;
    //     }


    //     Student::updateOrCreate(['uuid' => $this->uuid], $data);
    //     session()->flash(
    //         'message',
    //         $this->uuid ? 'Student Updated Successfully.' : 'Student Created Successfully.'
    //     );

    //     $this->closeModal();
    //     $this->resetInputFields();
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($uuid ,$view)
    {
        $this->resetInputFields();
        $student = Student::where('uuid', $uuid)->first();
        if ($student) {
            $this->id = $student->id;
            $this->uuid = $student->uuid;
            $this->application_availability = $student->application_availability;
            $this->application_number = $student->application_number;
            $this->year = $student->year;
            $this->number = $student->number;
            $this->self_image = $student->self_image;
            $this->aadhar_card_front = $student->aadhar_card_front;
            $this->aadhar_card_back = $student->aadhar_card_back;
            $this->prtc = $student->prtc;
            $this->caste_certificate = $student->caste_certificate;
            $this->bonafide_nsp = $student->bonafide_nsp;
            $this->bonafide_college = $student->bonafide_college;
            $this->pre_year_mark = $student->pre_year_mark;
            $this->income_certificate = $student->income_certificate;
            $this->signature = $student->signature;
            $this->agent_name = $student->agent_name;
            $this->agent_mobile = $student->agent_mobile;
            $this->ten_path_year = $student->ten_path_year;
            $this->ten_total_mark = $student->ten_total_mark;
            $this->ten_mark = $student->ten_mark;
            $this->ten_percentage = $student->ten_percentage;
            $this->twelve_path_year = $student->twelve_path_year;
            $this->twelve_total_mark = $student->twelve_total_mark;
            $this->twelve_mark = $student->twelve_mark;
            $this->twelve_percentage = $student->twelve_percentage;
            $this->student_name = $student->student_name;
            $this->father_name = $student->father_name;
            $this->mother_name = $student->mother_name;
            $this->email_address = $student->email_address;
            $this->dob = $student->dob;
            $this->gender = $student->gender;
            $this->phone_number = $student->phone_number;
            $this->family_income = $student->family_income;
            $this->state = $student->state;
            $this->district = $student->district;
            $this->sub_division = $student->sub_division;
            $this->cast = $student->cast;
            $this->city = $student->city;
            $this->pincode = $student->pincode;
            $this->address_1 = $student->address_1;
            $this->address_2 = $student->address_2;
            $this->account_number = $student->account_number;
            $this->IFSC_code = $student->IFSC_code;
            $this->bank_name = $student->bank_name;
            $this->branch_name = $student->branch_name;
            $this->college_name = $student->college_name;
            $this->course_details = $student->course_details;
            $this->collage_current_year = $student->collage_current_year;
            $this->collage_percentage = $student->collage_percentage;

           if($view == 'edit')
            $this->openModal();
            else
            $this->openView();
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($uuid)
    {
        $student = Student::where('uuid', $uuid)->first();
        if ($student) {
            $student->delete();
            session()->flash('delete', 'Student Deleted Successfully.');
        }
    }


    public function export()
    {
        $rows = [];
        Student::query()->lazyById(2000, 'id')
            ->each(function ($student) use (&$rows) {
                $rows[] = $student->toArray();
            });

        SimpleExcelWriter::streamDownload('students.csv')
            ->addRows($rows);
    }

    public function download($path)
    {
        $filePath = public_path('assets').'/'.$path;
        return response()->download($filePath);
    }

    public function store(Request $request){
        $uuid = (string) Str::uuid();
        $request->validate([
                    'application_availability' => 'required',
                    'application_number' => 'required',
                    'year' => 'required',
                    'number' => 'required',
                    'account_number' => 'required',
                    'IFSC_code' => 'required',
                    'bank_name' => 'required',
                    'branch_name' => 'required',
                    'ten_path_year' => 'required',
                    'ten_total_mark' => 'required',
                    'ten_mark' => 'required',
                    'ten_percentage' => 'required',
                    'twelve_path_year' => 'required',
                    'twelve_total_mark' => 'required',
                    'twelve_mark' => 'required',
                    'twelve_percentage' => 'required',
                    'college_name' => 'required',
                    'course_details' => 'required',
                    'collage_current_year' => 'required',
                    'course_fee' => 'required',
                    'scholarship_amount' => 'required',
                    'student_name' => 'required',
                    'father_name' => 'required',
                    'mother_name' => 'required',
                    'dob' => 'required',
                    'gender' => 'required',
                    'phone_number' => 'required',
                    'family_income' => 'required',
                    'state' => 'required',
                    'district' => 'required',
                    'sub_division' => 'required',
                    'cast' => 'required',
                    'city' => 'required',
                    'pincode' => 'required',
                    'address_1' => 'required',
                    'address_2' => 'required',
                ]);
        $data = [
            'uuid' => $uuid,
            'email_address' => $request->email_address,
            'created_by' => Auth::id() ,
            'application_availability' => $request->application_availability,
            'application_number' => $request->application_number,
            'year' => $request->year,
            'number' => $request->number,
            'ten_path_year' => $request->ten_path_year,
            'ten_total_mark' => $request->ten_total_mark,
            'ten_mark' => $request->ten_mark,
            'ten_percentage' => $request->ten_percentage,
            'twelve_path_year' => $request->twelve_path_year,
            'twelve_total_mark' => $request->twelve_total_mark,
            'twelve_mark' => $request->twelve_mark,
            'twelve_percentage' => $request->twelve_percentage,
            'student_name' => $request->student_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'family_income' => $request->family_income,
            'state' => $request->state,
            'district' => $request->district,
            'sub_division' => $request->sub_division,
            'cast' => $request->cast,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'account_number' => $request->account_number,
            'IFSC_code' => $request->IFSC_code,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'college_name' => $request->college_name,
            'course_details' => $request->course_details,
            'collage_current_year' => $request->collage_current_year,
            'course_fee' => $request->course_fee,
            'scholarship_amount' => $request->scholarship_amount,
        ];

        if ($request->self_image) {
            $self_image = time().'.'.$request->self_image->getClientOriginalExtension();
            $request->self_image->move(public_path('assets/student/self_image/'), $self_image);

            $data['self_image'] =  'student/self_image/'.$self_image;

            // $self_image =   $request->self_image->store('student/self_image');
            // $data['self_image'] = $self_image;
        }

        if ($request->aadhar_card_front) {
            $aadhar_card_front = time().'.'.$request->aadhar_card_front->getClientOriginalExtension();
            $request->aadhar_card_front->move(public_path('assets/student/aadhar_card_front/'), $aadhar_card_front);

            $data['aadhar_card_front'] =  'student/aadhar_card_front/'.$aadhar_card_front;

            // $aadhar_card_front =   $request->aadhar_card_front->store('student/aadhar_card_front');
            // $data['aadhar_card_front'] = $aadhar_card_front;
        }

        if ($request->aadhar_card_back){
            $aadhar_card_back = time().'.'.$request->aadhar_card_back->getClientOriginalExtension();
            $request->aadhar_card_back->move(public_path('assets/student/aadhar_card_back/'), $aadhar_card_back);

            $data['aadhar_card_back'] =  'student/aadhar_card_back/'.$aadhar_card_back;

            // $aadhar_card_back =   $request->aadhar_card_back->store('student/aadhar_card_back');
            // $data['aadhar_card_back'] = $aadhar_card_back;
        }

        if ($request->prtc) {
            $prtc = time().'.'.$request->prtc->getClientOriginalExtension();
            $request->prtc->move(public_path('assets/student/prtc/'), $prtc);

            $data['prtc'] =  'student/prtc/'.$prtc;

            // $prtc =  $request->prtc->store('student/prtc');
            // $data['prtc'] = $prtc;
        }

        if ($request->caste_certificate) {
            $caste_certificate = time().'.'.$request->caste_certificate->getClientOriginalExtension();
            $request->caste_certificate->move(public_path('assets/student/caste_certificate/'), $caste_certificate);

            $data['caste_certificate'] =  'student/caste_certificate/'.$caste_certificate;

            // $caste_certificate =  $request->caste_certificate->store('student/caste_certificate');
            // $data['caste_certificate'] = $caste_certificate;
        }

        if ($request->bonafide_nsp){
            $bonafide_nsp = time().'.'.$request->bonafide_nsp->getClientOriginalExtension();
            $request->bonafide_nsp->move(public_path('assets/student/bonafide_nsp/'), $bonafide_nsp);

            $data['bonafide_nsp'] =  'student/bonafide_nsp/'.$bonafide_nsp;

            // $bonafide_nsp =  $request->bonafide_nsp->store('student/bonafide_nsp');
            // $data['bonafide_nsp'] = $bonafide_nsp;
        }

        if ($request->bonafide_college) {
            $bonafide_college = time().'.'.$request->bonafide_college->getClientOriginalExtension();
            $request->bonafide_college->move(public_path('assets/student/bonafide_college/'), $bonafide_college);

            $data['bonafide_college'] =  'student/bonafide_college/'.$bonafide_college;

            // $bonafide_college = $request->bonafide_college->store('student/bonafide_college');
            // $data['bonafide_college'] = $bonafide_college;
        }

        if ($request->pre_year_mark) {
            $pre_year_mark = time().'.'.$request->pre_year_mark->getClientOriginalExtension();
            $request->pre_year_mark->move(public_path('assets/student/pre_year_mark/'), $pre_year_mark);

            $data['pre_year_mark'] =  'student/pre_year_mark/'.$pre_year_mark;

            // $pre_year_mark = $request->pre_year_mark->store('student/pre_year_mark');
            // $data['pre_year_mark'] = $pre_year_mark;
        }

        if ($request->income_certificate){
            $income_certificate = time().'.'.$request->income_certificate->getClientOriginalExtension();
            $request->income_certificate->move(public_path('assets/student/income_certificate/'), $income_certificate);

            $data['income_certificate'] =  'student/income_certificate/'.$income_certificate;

            // $income_certificate =  $request->income_certificate->store('student/income_certificate');
            // $data['income_certificate'] = $income_certificate;
        }

        if ($request->signature) {
            $signature = time().'.'.$request->signature->getClientOriginalExtension();
            $request->signature->move(public_path('assets/student/signature/'), $signature);

            $data['signature'] =  'student/signature/'.$signature;

            // $signature =  $request->signature->store('student/signature');
            // $data['signature'] = $signature;
        }

        Student::create($data);

        return redirect()->route('Student Detail')->with(session()->flash(
            'message','Student Created Successfully.')
        );
    }

    public function editnew($id){
        $state = States::get();
        $student = Student::where('id',$id)->first();
        $bank = Bank::where('bank_name',$student->bank_name)->get()->first();
        $bank_details = json_decode($bank->bank_details);
        $college = College::where('college_name',$student->college_name)->get()->first();
        $college_details = json_decode($college->college_details);
        $key = array_search($student->course_details, array_column($college_details, 'course_name'));
        //echo '<pre>'; print_r($college_details[$key]); die();
        return view(
            'livewire.student.edit',
            [
                'student' => $student,
                'state' => $state,
                'bank_details' => $bank_details,
                'college_details' => $college_details,
                'key' => $key
            ]
        );
    }

    public function update(Request $request){
        $data = [
            'email_address' => $request->email_address,
            'created_by' => Auth::id() ,
            'application_availability' => $request->application_availability,
            'application_number' => $request->application_number,
            'year' => $request->year,
            'number' => $request->number,
            'ten_path_year' => $request->ten_path_year,
            'ten_total_mark' => $request->ten_total_mark,
            'ten_mark' => $request->ten_mark,
            'ten_percentage' => $request->ten_percentage,
            'twelve_path_year' => $request->twelve_path_year,
            'twelve_total_mark' => $request->twelve_total_mark,
            'twelve_mark' => $request->twelve_mark,
            'twelve_percentage' => $request->twelve_percentage,
            'student_name' => $request->student_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'family_income' => $request->family_income,
            'state' => $request->state,
            'district' => $request->district,
            'sub_division' => $request->sub_division,
            'cast' => $request->cast,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'account_number' => $request->account_number,
            'IFSC_code' => $request->IFSC_code,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'college_name' => $request->college_name,
            'course_details' => $request->course_details,
            'collage_current_year' => $request->collage_current_year,
            'course_fee' => $request->course_fee,
            'scholarship_amount' => $request->scholarship_amount,
        ];

        $student_data = Student::find($request->id);

        if ($request->self_image) {
            if($student_data->self_image != ''){
                $self_image = public_path('assets/'.$student_data->self_image);
                if (File::exists($self_image)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->self_image));
                }
            }
            $self_image = time().'.'.$request->self_image->getClientOriginalExtension();
            $request->self_image->move(public_path('assets/student/self_image/'), $self_image);

            $data['self_image'] =  'student/self_image/'.$self_image;
        }

        if ($request->aadhar_card_front) {
            if($student_data->aadhar_card_front != ''){
                $aadhar_card_front = public_path('assets/'.$student_data->aadhar_card_front);
                if (File::exists($aadhar_card_front)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->aadhar_card_front));
                }
            }
            $aadhar_card_front = time().'.'.$request->aadhar_card_front->getClientOriginalExtension();
            $request->aadhar_card_front->move(public_path('assets/student/aadhar_card_front/'), $aadhar_card_front);

            $data['aadhar_card_front'] =  'student/aadhar_card_front/'.$aadhar_card_front;
        }

        if ($request->aadhar_card_back){
            if($student_data->aadhar_card_back != ''){
                $aadhar_card_back = public_path('assets/'.$student_data->aadhar_card_back);
                if (File::exists($aadhar_card_back)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->aadhar_card_back));
                }
            }
            $aadhar_card_back = time().'.'.$request->aadhar_card_back->getClientOriginalExtension();
            $request->aadhar_card_back->move(public_path('assets/student/aadhar_card_back/'), $aadhar_card_back);

            $data['aadhar_card_back'] =  'student/aadhar_card_back/'.$aadhar_card_back;
        }

        if ($request->prtc) {
            if($student_data->prtc != ''){
                $prtc = public_path('assets/'.$student_data->prtc);
                if (File::exists($prtc)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->prtc));
                }
            }
            $prtc = time().'.'.$request->prtc->getClientOriginalExtension();
            $request->prtc->move(public_path('assets/student/prtc/'), $prtc);

            $data['prtc'] =  'student/prtc/'.$prtc;
        }

        if ($request->caste_certificate) {
            if($student_data->caste_certificate != ''){
                $caste_certificate = public_path('assets/'.$student_data->caste_certificate);
                if (File::exists($caste_certificate)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->caste_certificate));
                }
            }
            $caste_certificate = time().'.'.$request->caste_certificate->getClientOriginalExtension();
            $request->caste_certificate->move(public_path('assets/student/caste_certificate/'), $caste_certificate);

            $data['caste_certificate'] =  'student/caste_certificate/'.$caste_certificate;
        }

        if ($request->bonafide_nsp){
            if($student_data->bonafide_nsp != ''){
                $bonafide_nsp = public_path('assets/'.$student_data->bonafide_nsp);
                if (File::exists($bonafide_nsp)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->bonafide_nsp));
                }
            }
            $bonafide_nsp = time().'.'.$request->bonafide_nsp->getClientOriginalExtension();
            $request->bonafide_nsp->move(public_path('assets/student/bonafide_nsp/'), $bonafide_nsp);

            $data['bonafide_nsp'] =  'student/bonafide_nsp/'.$bonafide_nsp;
        }

        if ($request->bonafide_college) {
            if($student_data->bonafide_college != ''){
                $bonafide_college = public_path('assets/'.$student_data->bonafide_college);
                if (File::exists($bonafide_college)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->bonafide_college));
                }
            }
            $bonafide_college = time().'.'.$request->bonafide_college->getClientOriginalExtension();
            $request->bonafide_college->move(public_path('assets/student/bonafide_college/'), $bonafide_college);

            $data['bonafide_college'] =  'student/bonafide_college/'.$bonafide_college;
        }

        if ($request->pre_year_mark) {
            if($student_data->pre_year_mark != ''){
                $pre_year_mark = public_path('assets/'.$student_data->pre_year_mark);
                if (File::exists($pre_year_mark)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->pre_year_mark));
                }
            }
            $pre_year_mark = time().'.'.$request->pre_year_mark->getClientOriginalExtension();
            $request->pre_year_mark->move(public_path('assets/student/pre_year_mark/'), $pre_year_mark);

            $data['pre_year_mark'] =  'student/pre_year_mark/'.$pre_year_mark;
        }

        if ($request->income_certificate){
            if($student_data->income_certificate != ''){
                $income_certificate = public_path('assets/'.$student_data->income_certificate);
                if (File::exists($income_certificate)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->income_certificate));
                }
            }
            $income_certificate = time().'.'.$request->income_certificate->getClientOriginalExtension();
            $request->income_certificate->move(public_path('assets/student/income_certificate/'), $income_certificate);

            $data['income_certificate'] =  'student/income_certificate/'.$income_certificate;
        }

        if ($request->signature) {
            if($student_data->signature != ''){
                $signature = public_path('assets/'.$student_data->signature);
                if (File::exists($signature)) { // unlink or remove previous image from folder
                    unlink(public_path('assets/'.$student_data->signature));
                }
            }
            $signature = time().'.'.$request->signature->getClientOriginalExtension();
            $request->signature->move(public_path('assets/student/signature/'), $signature);

            $data['signature'] =  'student/signature/'.$signature;
        }

        Student::where('id',$request->id)->update($data);

        return redirect()->route('Student Detail')->with(session()->flash(
            'message','Student Updated Successfully.')
        );
    }

    public function getBranchName(Request $request){
        $bank = Bank::where('bank_name',$request->bank_name)->get()->first();
        $bank_details = json_decode($bank->bank_details);
        echo '<option value="">Select Branch Name</option>';
        foreach($bank_details as $data){
            echo '<option value="'.$data->branch_name.'">'.$data->branch_name.'</option>';
        }
    }

    public function getCourseName(Request $request){
        $college = College::where('college_name',$request->collage_name)->get()->first();
        $college_details = json_decode($college->college_details);
        echo '<option value="">---Please Select Course Name---</option>';
        foreach($college_details as $data){
            echo '<option value="'.$data->course_name.'">'.$data->course_name.'</option>';
        }
    }

    public function getIfscode(Request $request){
        $college = Bank::where('bank_name',$request->bank_name)->get()->first();
        $bank_details = json_decode($college->bank_details);
        $key = array_search($request->branch_name, array_column($bank_details, 'branch_name'));
        echo $bank_details[$key]->IFSC_code;
    }

    public function getCourseYear(Request $request){
        $college = College::where('college_name',$request->collage_name)->get()->first();
        $college_details = json_decode($college->college_details);
        //echo '<pre>'; print_r($college_details); die();
        $key = array_search($request->course_details, array_column($college_details, 'course_name'));
            echo  '<div class="mt-3 "><div class="form-group"><label>Please Select Current Year <span class="deta-alert">*</span></label>
                      <select id="collage-current-year" name="collage_current_year" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option>---Please Select Year---</option>';
        foreach($college_details[$key]->course_duration as $data){
            echo '<option value="'.$data->course_duration.'">'.$data->course_duration.'</option>';
        }
            echo '</select>
                    </div>
                  </div>
                  <div class="mt-3">
                    <div class="form-group">
                      <label>Course Fees <span class="deta-alert">*</span></label>
                      <input name="course_fee" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Course Fees" value="'.$college_details[$key]->course_fees.'">
                    </div>
                  </div>
                  <div class="mt-3">
                    <div class="form-group">
                      <label>Scholarship Amount <span class="deta-alert">*</span></label>
                      <input name="scholarship_amount" class="form-control w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Scholarship Amount" value="'.$college_details[$key]->scholarship_amount.'">
                    </div>
                  </div>';
    }

    public function deletestudent(Request $request){
         $array = explode(',',$request->student_id);
        // echo '<pre>'; print_r($array); die();
         foreach($array as $data){
            Student::where('id',$data)->delete();
         }
    }

}
