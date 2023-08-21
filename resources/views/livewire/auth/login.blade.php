
            <div class="container my-auto mt-5">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-body">
                                <form wire:submit.prevent='store'>
                                    @if (Session::has('status'))
                                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('status') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="radioButton">
                                        <!-- <label class="form-label">Role</label> -->

                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginS" value="super_admin" >
                                            <label for="sRLoginS">Super Admin </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginA" value="Admin" >
                                            <label for="sRLoginA">Admin </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginM" value="Manager" >
                                            <label for="sRLoginM">Manager </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginT" value="Team Leader" >
                                            <label for="sRLoginT">Team Leader </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginE" value="Employee" >
                                            <label for="sRLoginE">Employee </label>
                                        </div>
                                        <div class="rBsradio">
                                            <input type="radio" wire:model="role" name="rLogin" id="sRLoginO" value="Other" >
                                            <label for="sRLoginO">Other </label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Email</label>
                                        <input wire:model='email' type="email" class="form-control" value="<?php echo $email; ?>">
                                    </div>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    <div class="input-group input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Password</label>
                                        <input wire:model="password" type="password" class="form-control" value="<?= $password; ?>"
                                             >
                                    </div>
                                    @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    @error('role')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    <div id="location_error">

                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center my-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                    </div>
                                    <p class="text-sm text-center">
                                        Forgot your password?
                                        <a href="{{ route('password.forgot') }}" class="text-primary text-gradient font-weight-bold">here</a>
                                    </p>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
<script>
	if (localStorage.getItem("activeTabCounts") != null) {
		localStorage.removeItem("activeTabCounts");
	}
</script>
