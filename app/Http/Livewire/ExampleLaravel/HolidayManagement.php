<?php

namespace App\Http\Livewire\ExampleLaravel;

use Livewire\Component;
use App\Models\User;
use App\Models\Holiday;
use App\Models\RoleStatus;
use Illuminate\Support\Facades\Hash;
use App\Models\States;
use Illuminate\Support\Str;
use App\Models\User_data;
use App\Models\User_address;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;


class HolidayManagement extends Component
{
    public function holiday()
    {
        $Holiday = Holiday::get();
        return view('livewire.example-laravel.holiday',compact('Holiday'));
    }

    public function holideLeave(Request $request)
    {
        // echo '<pre>'; print_r($request->all()); die();
        Holiday::create([
            "holiday_name" => $request->holiday_name,
            "date" => $request->date
        ]);
            return redirect()->route('holiday')->withSuccess('IT WORKS!');
        }

        public function holidayDelete(Request $request)
        {
            Holiday::where('id',$request->id)->delete();
            echo json_encode(['success' =>  true,'message' => 'Delete Successfully.']);
        }
}
