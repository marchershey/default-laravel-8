@extends('inc.layouts.auth')

@section('content')
<div class="min-h-screen flex items-center">
    <div class="w-full max-w-sm md:max-w-lg rounded-lg overflow-hidden mx-auto">
        <div class="py-4 px-6">
            <div class="font-bold text-gray-700 text-xl">{{config('app.name')}}</div>
            <div class="mt-1 font-bold text-gray-600">Create a new account</div>
            <div class="mt-3 font-semibold text-xs text-gray-500">Fill out the form below to get started. You can also create an account with Google or Facebook.</div>
            <form class="mt-4" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="md:flex gap-4">
                    <div class="w-full">
                        <input type="text" name="firstname" placeholder="First Name" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 capitalize focus:outline-none focus:bg-white @error('firstname') border-red-500 @enderror" value="{{old('firstname')}}" />
                        @error('firstname')
                        <p class="text-red-500 text-xs italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="w-full mt-4 md:mt-0">
                        <input type="text" name="lastname" placeholder="Last Name" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 capitalize focus:outline-none focus:bg-white @error('lastname') border-red-500 @enderror" value="{{old('lastname')}}" />
                        @error('lastname')
                        <p class="text-red-500 text-xs italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 w-full">
                    <input type="email" name="email" placeholder="Email address" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white @error('email') border-red-500 @enderror" value="{{old('email')}}" />
                    @error('email')
                    <p class=" text-red-500 text-xs italic">
                        {!! $message !!}
                    </p>
                    @enderror
                </div>
                <div class="flex gap-4 mt-2">
                    <div class="w-full">
                        <input type="password" name="password" placeholder="Password" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white @error('password') border-red-500 @enderror" />
                    </div>
                    <div class="w-full">
                        <input type="password" name="password_confirmation" placeholder="Password again" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white @error('password') border-red-500 @enderror" />
                    </div>
                </div>
                <div class="">
                    @error('password')
                    <p class="text-red-500 text-xs italic">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="md:flex justify-between">
                    <p class="mt-4 text-center md:text-left text-xs text-gray-500">
                        By creating an account, you are agreeing to our<br>
                        <a href="#" class="font-bold">Terms of Service</a> & <a href="#" class="font-bold">Policies</a>.
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <button type="submit" class="w-full py-2 px-4 bg-primary font-bold text-white rounded hover:bg-primary-darker focus:outline-none">
                            Create Account
                        </button>
                    </div>
                </div>
            </form>
            <div class="mt-6 text-xs text-gray-500 text-center">
                <div class="flex items-center justify-center">
                    <h1 class="text-gray-500">Already have account?</h1>
                    <a href="/login" class="text-primary hover:text-primary-darker font-bold mx-2">Sign in</a>
                </div>
                <p class="mt-4 text-gray-400">@lang('global.copyright')</p>
            </div>
        </div>
    </div>
</div>
@endsection