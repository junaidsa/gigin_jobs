<x-app-layout>
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">


                @if (session('status') === 'profile-updated')
                <div class="alert bg-secondary text-white  alert-dismissible fade show" role="alert">Update Profile successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                @if (session('status') === 'password-updated')
                <div class="alert bg-secondary text-white  alert-dismissible fade show" role="alert">Update Password successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card border-lg-top-danger">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class='bx bxs-user mr-1 font-24 text-danger'></i>
                                    </div>
                                    <h4 class="mb-0 text-danger">{{ __('Profile Information') }}</h4>
                                </div>
                                <p> {{ __("Update your account's profile information and email address.") }}</p>
                                <hr />
                                <form action="{{ route('profile.update') }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-body">
                                        <div class="form-group">
                                            <x-input-label for="name" :value="__('Name')" />
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i class='bx bx-user'></i></span>
                                                </div>
                                                <x-text-input id="name border-left-0" class="form-control" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text bg-transparent"><i class='bx bx-envelope'></i></span>
                                                </div>
                                                <x-text-input id="email" name="email" type="email" class="form-control border-left-0" :value="old('email', $user->email)" required autocomplete="username" />
                                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                            </div>
                                        </div>
                                        <x-primary-button class="btn btn-danger">{{ __('Save') }}</x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card border-lg-top-danger">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class='bx bxs-user mr-1 font-24 text-danger'></i>
                                    </div>
                                    <h4 class="mb-0 text-danger"> {{ __('Update Password') }}</h4>
                                </div>
                                <p> {{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
                                <hr />
                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="form-group">
                                            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i class='bx bx-lock-open-alt'></i></span>
                                                </div>
                                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                            <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text bg-transparent"><i class='bx bx-lock-open-alt'></i></span>
                                                </div>
                                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-primary-button class="btn btn-danger">{{ __('Save') }}</x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>