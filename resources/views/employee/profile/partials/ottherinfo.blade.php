<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Other Information') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch') --}}
        <div>
            <x-input-label for="name" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="block w-full mt-1" :value="old('phone', $user->phone)"  autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
              
        </div>

        <div>
            <x-input-label for="department" :value="__('Department')" />
            <select id="department" name="department" class="block w-full mt-1">
                <option value="">Select Department</option>
                @foreach ($department as $val)
                <option value="{{$val->id}}" {{ old('department', $user->department) == $val->id ? 'selected' : '' }}>{{$val->name}}</option>
                    
                @endforeach
                
                <!-- Add more departments as needed -->
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('department')" />
        </div>


        <div>
            <x-input-label for="department" :value="__('Designation')" />
            <select id="designation" name="designation" class="block w-full mt-1">
                <option value="">Select Designation</option>
                @foreach ($designation as $val)
                <option value="{{$val->id}}" {{ old('designation', $user->position) == $val->id ? 'selected' : '' }}>{{$val->name}}</option>
                    
                @endforeach
                
                <!-- Add more departments as needed -->
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('department')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Joining Date')" />
            <x-text-input id="joining_Date" name="joining_Date" type="date" class="block w-full mt-1" :value="old('joining_Date', $user->joining_Date)"  autofocus autocomplete="joining_Date" />
            <x-input-error class="mt-2" :messages="$errors->get('joining_Date')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Address ')" />
            <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $user->address)"  autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

      

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    {{-- </form> --}}

    
</section>
