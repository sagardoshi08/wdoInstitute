<?php

namespace App\Http\Livewire\College;

use Livewire\Component;
use App\Models\College;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Http\Request;


class CollegeDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $college_id, $college_name, $uuid,  $course_fees = [], $course_duration = [], $course_name = [], $scholarship_amount = [], $collage_d=[] , $courseduration=[];

    public $isOpen = 0;
    public $i = 0;
    public $j = 0;
    public $perPage = 10;
    public $search_name = '';


    public function addField($i)
    {   
        $i = $i + 1;
        $this->i = $i;
        array_push($this->collage_d ,$i);
        $this->course_name[$i]= '';
        $this->course_fees[$i]='';
        $this->course_duration[$i]='';
        $this->scholarship_amount[$i]='';
        
    }

    public function removeCollegeField($y)
    {
        $key = array_search ($y,  $this->collage_d);
        unset(
            $this->collage_d[$key],
            $this->course_name[$key],
            $this->course_fees[$key],
            $this->course_duration[$key],
            $this->scholarship_amount[$key],
        );
    }

    public function render()
    {
        $colleges = College::where('college_name', 'like' , '%' .$this->search_name.'%')
        ->paginate($this->perPage);
        return view(
            'livewire.college.college-detail',
            [
                'colleges' => $colleges,
            ]
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->resetErrorBag();
        $this->i=0;
        $this->uuid='';
        $this->college_name='';
        $this->collage_d=array();
        array_push($this->collage_d , $this->i);
        $this->course_name=array();
        $this->course_fees=array();
        $this->course_duration=array();
        $this->scholarship_amount=array();
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function createCollege(){
        return view(
            'livewire.college.college-add');
    }

    public function store(Request $request)
    {
        //echo '<pre>'; print_r($request->all()); die();
        $uuid = (string) Str::uuid();

        $college_details=array();
       
        foreach ($request->course_name as $key => $value) {
            $duration = array();
            foreach ($request->course_duration[$key] as $key2 => $value) {
                array_push($duration,[
                    'course_duration' => $request->course_duration[$key][$key2],
                ]);
            }
            array_push($college_details,
            ['course_name' => $request->course_name[$key],
             'course_fees' => $request->course_fees[$key],
             'course_duration' => $duration,
             'scholarship_amount' => $request->scholarship_amount[$key]
        ]);
        }
        $data = [
            'college_name' => $request->college_name,
            'college_details' => json_encode($college_details),
        ];

        if ($request->uuid == null) {
            $data['uuid'] = $uuid;
        }

        College::updateOrCreate(['uuid' => $request->uuid], $data);


        return redirect()->route('college')->with(session()->flash(
            'message',
            $request->uuid ? 'College Updated Successfully.' : 'College Created Successfully.'
        ));
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public function edit($uuid)
    // {
    //     $this->resetInputFields();
    //     $college = College::where('uuid', $uuid)->first();
    //     if ($college) {
    //         $this->uuid = $uuid;
    //         $this->college_name = $college->college_name;
    //         $courses= json_decode($college->college_details);
    //         $ifFirst=true;
    //         foreach ($courses as $course) {
    //             array_push($this->course_name,$course->course_name);
    //             array_push($this->course_fees,$course->course_fees);
    //             array_push($this->course_duration,$course->course_duration);
    //             array_push($this->scholarship_amount,$course->scholarship_amount);
    //             if(!$ifFirst){
    //             $this->i++;
    //             array_push($this->collage_d , $this->i);
    //             }
    //             $ifFirst=false;
    //         }
    //         $this->openModal();
    //     }
    // }
     public function edit($id)
    {
        $college = College::where('id', $id)->first();
        $college_details = json_decode($college->college_details);
        //echo '<pre>'; print_r($college_details); die();
        return view(
            'livewire.college.college-add',compact('college','college_details'));
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($uuid)
    {
        $college = College::where('uuid', $uuid)->first();
        if ($college) {
            $college->delete();
            session()->flash('delete', 'College Deleted Successfully.');
        }
    }
}
