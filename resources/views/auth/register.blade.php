<style>
 .frm{
    background-color: #51C8BC;
    height: 520px;
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
    width: 500px;
    padding: 30px;
    border-radius: 30px;
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
<x-guest-layout >
    <!-- <div class="frm">
    hhhh
   </div> -->
   <div class="frm" >
   <img src="ECO.png" alt="no image" srcset="">
    <form method="POST" action="{{ route('register') }}">
    <div class="login">Create Account</div>
        @csrf

        <!-- Name -->
        <div>
            
            <!-- <x-input-label for="name" :value="__('Name')" /> -->
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" 
                            placeholder="confirm password" 
                            required autocomplete="new-password" />
                            
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4" style="; padding-right: 10px;">

<x-primary-button class="ml-3" style="background-color:rgb(43, 151, 185); width: 90%;color: white; padding-left: 140px;">
    {{ __('Create Account') }}
</x-primary-button>

</div>
        
        <div class="fb flex flex-col items-center justify-center mt-4">
         <p>Or</p>
         <div class="fb_log flex flex-row items-center justify-center mt-4">
            <img src="/fb.png" alt="no image" srcset="">
            <img src="/fb1.png" alt="no image" srcset="">
         </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            Already have an account?
            <a class="underline text-sm text-blue-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Log In') }}
            </a>

        </div>          
    </form></div>
</x-guest-layout>
