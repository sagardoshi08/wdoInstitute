<?php

namespace App\Http\Livewire\Bank;

use Livewire\Component;
use App\Models\Bank;
use Illuminate\Support\Str;
use Livewire\WithPagination;


class BankDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search_name = '';


    public  $uuid ,$bank_name, $bank_details = [], $branch_name = [], $IFSC_code = [];
    public $isBank = 0;

    public $i = 0;

    public function addField($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->bank_details, $i);
        $this->branch_name[$i] = '';
        $this->IFSC_code[$i] = '';
    }

    public function removeBankField($y)
    {
        $key = array_search ($y,  $this->bank_details);
        unset(
            $this->bank_details[$key],
            $this->branch_name[$key],
            $this->IFSC_code[$key],
        );
    }

    public function render()
    {
        $banks = Bank::where('bank_name', 'like' , '%' .$this->search_name.'%')
        ->paginate($this->perPage);
        return view(
            'livewire.bank.bank-detail',
            [
                'banks' => $banks,
            ]
        );
    }

    public function bank()
    {
        $this->resetInputFields();
        $this->openBank();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openBank()
    {
        $this->isBank = true;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeBank()
    {
        $this->isBank = false;
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
        $this->uuid = '';
        $this->bank_name = '';
        $this->bank_details = array();
        array_push($this->bank_details, $this->i);
        $this->branch_name = array();
        $this->IFSC_code = array();

    }
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $uuid = (string) Str::uuid();

        $this->validate([
            'bank_name' => 'required',
            'branch_name.0'  => 'required',
            'IFSC_code.0'  => 'required',
            'branch_name.*'  => 'required',
            'IFSC_code.*'  => 'required',
        ]);

        $bank_details=array();
        foreach ($this->branch_name as $key => $value) {
            array_push($bank_details,
            ['branch_name' => $this->branch_name[$key],
             'IFSC_code' => $this->IFSC_code[$key],
        ]);
        }
        $data = [
            'bank_name' => $this->bank_name,
            'bank_details' => json_encode($bank_details),
        ];

        if ($this->uuid == null) {
            $data['uuid'] = $uuid;
        }

        Bank::updateOrCreate(['uuid' => $this->uuid], $data);


        session()->flash(
            'message',
            $this->uuid ? 'Bank Updated Successfully.' : 'Bank Created Successfully.'
        );

        $this->closeBank();
        $this->resetInputFields();
    }


        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($uuid)
    {
        $this->resetInputFields();
        $bank = Bank::where('uuid', $uuid)->first();
        if ($bank) {
            $this->uuid = $uuid;
            $this->bank_name = $bank->bank_name;
            $banks= json_decode($bank->bank_details);
            $ifFirst=true;
            foreach ($banks as $bank) {
                array_push($this->branch_name,$bank->branch_name);
                array_push($this->IFSC_code,$bank->IFSC_code);
                if(!$ifFirst){
                $this->i++;
                array_push($this->bank_details , $this->i);
                }
                $ifFirst=false;
            }
            $this->openBank();
        }
    }

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($uuid)
    {
        $bank = Bank::where('uuid', $uuid)->first();
        if ($bank) {
            $bank->delete();
            session()->flash('delete', 'Bank Deleted Successfully.');
        }
    }
}
