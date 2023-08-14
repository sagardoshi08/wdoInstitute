<?php

namespace App\Http\Livewire\ExampleLaravel;

use Livewire\Component;
use App\Models\User;
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


class EditManagement extends Component
{
    public function show(){
        $state = States::get();
        return view('livewire.example-laravel.editmanagement',compact('state'));
    }
}
