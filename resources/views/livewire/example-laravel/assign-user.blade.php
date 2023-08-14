<a class="back-sec" wire:click="closeAssign()">
    <i class="fa fa-long-arrow-left"></i>
    <p>Back</p>
</a>
<div class="container-fluid rounded pt-3 pb-3 to-assign-member">
  <div class="row">
    <div class="col-md-12">
      <h3>Assign Employee {{$user_name}}</h3>
      <form>

        <div class="row mt-3" >
          {{--@foreach ($assign as $assign_manage )
          <div class="form-check col-6 col-xs-6 col-sm-3 col-md-2">
            <input type="checkbox" class="form-check-input" wire:model="assign_user" value="{{$assign_manage->uuid}}">{{$assign_manage->name}}<br>
          </div>

          @endforeach--}}
		  <div class="row1">
                <div class="py-3 employees-sec">
                    <div class="employee-row">
                        <tbody>
                            @if ($assign->count())

                                @foreach ($assign as $key=>$assign_manage)
                                    {{-- <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="form-check col-6 col-xs-6 col-sm-3 col-md-2">
                                                    <input type="checkbox" class="form-check-input" wire:model="assign_user" checked value="{{$assign_manage->uuid}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('assets') }}/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $assign_manage->name }}</h6>

                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0">{{ $assign_manage->email }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $assign_manage->role }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ date('Y-m-d', strtotime($assign_manage->created_at)) }}</span>
                                        </td>
                                    </tr> --}}
                                    <div class="offset-md-0 offset-sm-1 card-main" >
                                        <div class="card align-items-center">
                                            <div class="top-card-sec d-flex align-items-center">
                                                <div class="d-flex px-2 py-1">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" wire:model="assign_user" checked value="{{$assign_manage->uuid}}">
                                                    </div>
                                                </div>
                                                <div class="right-menu">
                                                @if($assign_manage->login_status == 1)
                                                    <div class="active">Active</div>
                                                @else
                                                    <div class="not-active">In Active</div>
                                                @endif
                                                </div>

                                            </div>
                                            <div class="profile-det d-flex align-items-center flex-column">
                                                <img src="assets/img/profile-img.jpg" class="card-img-top rounded-circle" style="width:35%" alt="profile">
                                                <h5>{{$assign_manage->name}}</h5>
                                                <p>{{$assign_manage->role}}</p>
                                            </div>
                                            @php
                                                $data1=explode(",",$assign_manage->assign_user);
                                                $array = array_filter($data1);
                                            @endphp
                                            <div class="card-body">
                                                <div class="depart-sec d-flex">
                                                    <!-- <div class="dep">
                                                        <div class="team">
                                                            <i class="fa fa-users" aria-hidden="true"></i>
                                                            <p>Team Member</p>
                                                        </div>
                                                            <div class="team-dep">
                                                            <p style="font-size:12px; padding-right: 3px;"></p>
                                                            <button class="add-member">+ Add</button>
                                                        </div>
                                                    </div> -->
                                                    <div class="dep dep2">
                                                        <div class="date-hired">
                                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                            <p>Date Hired</p>
                                                        </div>
                                                            <h6>{{$assign_manage->created_at->format('d/m/Y')}}</h6>
                                                    </div>
                                               </div>
                                               <div class="user-cont">
                                                <div class="user-mail"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$assign_manage->email}}</div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No record found</td>
                                </tr>
                            @endif
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse text-end">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="button" wire:click.prevent="AssignStore()" class="btn bg-dark mb-0 text-white">
              Submit
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="closeAssign()" type="button" class="inline-flex justify-center rounded-md w-full border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 cancel-btn">
              Cancel
            </button>
          </span>
        </div>

      </form>
    </div>
  </div>
</div>
