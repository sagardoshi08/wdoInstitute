<style>
   .border {
    border: 0px !important;
}
.shadow {
    box-shadow: none !important;
}
.form-control:disabled, .form-control[readonly] {
    background-color: transparent !important;
    opacity: 1;
}
</style>
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
   <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
         <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
         <form class="form-custom" enctype="multipart/form-data">
            <div class="bg-white px-4  pb-4 sm:p-6 sm:pb-4">
               <div class="row">
                  <div class="col-sm-12 col-md-6 ">
                     <div class="card mb-5">
                        <div class="card-body">
                           <h3 class="text-start">Personal Details</h3>
                           <div class="d-flex justify-content-between">
                              <b >Name: </b>
                              <span>{{ $this->name}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Father Name:</b>
                              <span>{{ $this->father_name}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Mother Name:</b>
                              <span>{{ $this->mother_name}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Email Address:</b>
                              <span>{{ $this->email}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Password: </b>
                              <span>{{ $this->password}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Confirm Password: </b>
                              <span>{{ $this->confirm_password}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Date Of Birth:</b>
                              <span>{{ $this->date_of_birth}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Phone Number: </b>
                              <span>{{ $this->phone_number}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Alternate Phone Number:</b>
                              <span>{{ $this->alternate_phone_number}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Role: </b>
                              <span>{{ $this->role}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Permanent Address:</b>
                              <span>{{ $this->permanent_address}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Current Address:</b>
                              <span>{{ $this->current_address}}</span>
                           </div>
                        </div>
                     </div>

                     <div class="card mb-5">
                        <div class="card-body">
                           <h3 class="text-start">Qualification Details</h3>
                           <h6 class="text-start">10th</h6>
                           <div class="d-flex justify-content-between">
                              <b>Board Name:</b>
                              <span>{{ $this->tenth_board_name}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Year:</b>
                              <span>{{ $this->tenth_qua_year}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Percentage:</b>
                              <span>{{ $this->tenth_percentage}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Roll No: </b>
                              <span>{{ $this->tenth_roll_no}}</span>
                           </div>
                           <hr>
                           <h6 class="text-start">12th</h6>
                           <div class="d-flex justify-content-between">
                              <b>Board Name:</b>
                              <span>{{ $this->twelfth_board_name}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Year: </b>
                              <span>{{ $this->twelfth_qua_year}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Percentage:</b>
                              <span>{{ $this->twelfth_percentage}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Roll No:</b>
                              <span>{{ $this->twelfth_roll_no}}</span>
                           </div>
                           <hr>
                           <h6 class="text-start">University Qualification </h6>
                           <div class="d-flex justify-content-between">
                              <b>University Name:</b>
                              <span>{{ $this->university_name}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Year:</b>
                              <span>{{ $this->university_qua_year}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Percentage:</b>
                              <span>{{ $this->university_percentage}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Roll No:</b>
                              <span>{{ $this->university_roll_no}}</span>
                           </div>
                        </div>
                     </div>
                     <div class="card mb-5">
                        <div class="card-body">
                           <h3 class="text-start">Industry Experience</h3>
                           <div class="d-flex justify-content-between">
                              <b>Industry Name: </b>
                              <span>{{ $this->industry_name[0]}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Designation:</b>
                              <span>{{ $this->industry_designation[0]}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Salary:</b>
                              <span>{{ $this->industry_salary[0]}}</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <b>Total Year of Experience:</b>
                              <span>{{ $this->industry_total_year[0]}}</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-6 ">
                     <div class="card">
                        <div class="card-body">
                           <div class=" add-user-form inredonlyin">
                              @foreach($industry_details as $key => $field)
                              @if($key!=0)
                              <div class="row text-center">
                                 <div class="mb-4 col-sm-12">
                                    <label for="industry-name" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Industry Name: <strong>{{ $this->tenth_roll_no}}</strong></label><br />
                                    <input readonly type="text" wire:model="industry_name.{{ $field }}" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Industry Name">
                                    @error('industry_name.'.$field) <span class="text-danger">{{ $message }}</span>@enderror
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <label for="indus-designation" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Designation: <strong>{{ $this->tenth_roll_no}}</strong></label><br />
                                    <input readonly type="text" wire:model="industry_designation.{{ $field }}" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Designation">
                                    @error('industry_designation.'.$field) <span class="text-danger">{{ $message }}</span>@enderror
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <label for="indus-salary" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Salary: <strong>{{ $this->tenth_roll_no}}</strong></label><br />
                                    <input readonly type="text" wire:model="industry_salary.{{ $field }}" class="w-100 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Salary">
                                    @error('industry_salary.'.$field) <span class="text-danger">{{ $message }}</span>@enderror
                                 </div>
                                 <div class="mb-4 col-sm-12  total-exp-field ">
                                    <label for="indus-experience" class="w-100 block text-gray-700 text-sm font-bold mb-2 text-start">Total Year of Experience: <strong>{{ $this->tenth_roll_no}}</strong></label>
                                    @error('industry_total_year.'.$field) <span class="text-danger">{{ $message }}</span>@enderror
                                 </div>
                              </div>
                              @endif
                              @endforeach
                              <h3  style="text-align: left;">Document Upload</h3>
                              <div class="row text-center">
                                 <div class="mb-4 col-sm-12">
                                    <h6>10th Marksheet</h6>
                                    @if(!is_object($tenth_marksheet)&& $tenth_marksheet!='')
                                    <button wire:click.prevent="download('{{ $tenth_marksheet }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <h6>12th Marksheet</h6>
                                    @if(!is_object($twelfth_marksheet)&& $twelfth_marksheet!='')
                                    <button wire:click.prevent="download('{{ $twelfth_marksheet }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <h6>Aadhar Card</h6>
                                    @if(!is_object($aadhar_card)&& $aadhar_card!='')
                                    <button wire:click.prevent="download('{{ $aadhar_card }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <h6>Alternative Govt. ID Card</h6>
                                    @if(!is_object($alternative_govt_id_card)&& $alternative_govt_id_card!='')
                                    <button wire:click.prevent="download('{{ $alternative_govt_id_card }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                              </div>
                              <div class="row gradu-title text-center">
                                 <div class="mb-4 col-sm-12">
                                    <h6>Graduation / Diploma (Optional)</h6>
                                    @if(!is_object($graduation_diploma)&& $graduation_diploma!='')
                                    <button wire:click.prevent="download('{{ $graduation_diploma }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <h6>Post Graduation (Optional)</h6>
                                    @if(!is_object($post_graduation)&& $post_graduation!='')
                                    <button wire:click.prevent="download('{{ $post_graduation }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <h6>Experience Certificate (Optional)</h6>
                                    @if(!is_object($experience_certificate)&& $experience_certificate!='')
                                    <button wire:click.prevent="download('{{ $experience_certificate }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                                 <div class="mb-4 col-sm-12">
                                    <h6>Salary Slip (Optional)</h6>
                                    @if(!is_object($salary_slip)&& $salary_slip!='')
                                    <button wire:click.prevent="download('{{ $salary_slip }}')" type="button" class="btn btn-success mb-0 text-white mt-3">Download</button>
                                    @endif
                                 </div>
                                 <div>
                                 </div>
                                 <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                       <button wire:click="edit('{{ $this->uuid}}','edit')" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn">
                                          Edit
                                       </button>

                                       <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn">
                                          Close
                                       </button>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </form>
         <hr>
      </div>
   </div>
</div>
</div>
