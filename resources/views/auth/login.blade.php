<style>
 .frm{
    background-color: #51C8BC;
    height: 488px;
    /* width: 529px; */
    border-radius: 26px;
    padding: 10px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 40px;
 }
form{
    background-color: white;
    width: 530px;
    height: 465px;
    padding: 30px;
    padding-left: 50px;
    border-radius: 30px;
    margin-left: 10px;
    margin-top: 10px;
}
img{
    padding-left: 20px;
    height: 200px;
    width: 200px;
}
.login{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

</style>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="frm" >
    <img src="ECO.png" alt="no image" srcset="">
    <form method="POST" action="{{ route('login') }}">
    @if(session('success'))
    <div class="alert alert-success" style="background-color:rgba(28, 84, 223, 0.44); color: white; width: 90%; padding-right: 10px; padding: 5px; border-radius: 10px;">
        {{ session('success') }}
    </div>
    @endif

       <div class="login">LOGIN</div>
        @csrf

        <!-- Email Address -->
        <div>
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4" style="background-color: #A2B3B8; color: black;width: 30%;height: 30px; padding-right: 10px; padding: 5px;">
    @if (Route::has('password.request'))
        <a class="none text-sm text-black hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot password?') }}
        </a>
    @endif
</div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4" style="; padding-right: 10px;">

            <x-primary-button class="ml-3" style="background-color:rgb(43, 151, 185); width: 90%;color: white; padding-left: 180px;">
                {{ __('Log in') }}
            </x-primary-button>
            
        </div>
        <div class="fb flex flex-col items-center justify-center mt-4">
         <p>Or</p>
         <div class="fb_log flex flex-row items-center justify-center mt-4">
            <img src="/fb.png" alt="no image" srcset="">
            <img src="/fb1.png" alt="no image" srcset="">
         </div>
        </div>
    </form></div>
</x-guest-layout>
