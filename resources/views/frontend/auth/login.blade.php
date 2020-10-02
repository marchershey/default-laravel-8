@extends('inc.layouts.auth')

@section('content')
<div class="min-h-screen flex items-center">
    <div class="w-full max-w-sm overflow-hidden mx-auto">
        <div class="py-4 px-6">
            <div class="font-bold text-gray-700 text-xl">{{config('app.name')}}</div>
            <div class="mt-1 font-bold text-gray-600">Sign into your account</div>
            <div class="mt-3 font-semibold text-xs text-gray-500">Fill out the form below to get started. You can also create an account with Google or Facebook.</div>
            <form class="mt-4" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mt-4 w-full">
                    <input type="email" name="email" placeholder="Email address" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white @error('email') border-red-500 @enderror" value="{{old('email')}}" />
                    @error('email')
                    <p class=" text-red-500 text-xs italic">
                        {!! $message !!}
                    </p>
                    @enderror
                </div>
                <div class="w-full mt-4">
                    <input type="password" name="password" placeholder="Password" class="w-full mt-2 py-3 px-4 bg-white text-gray-700 text-sm border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white @error('password') border-red-500 @enderror" />
                    @error('password')
                    <p class="text-red-500 text-xs italic">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex justify-between items-center mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox text-primary focus:shadow-none" {{ old('remember') == null ? '' : 'checked' }})>
                        <span class="ml-2 text-xs text-gray-500 ">Stay signed in forever</span>
                    </label>
                    <button type="submit" class="py-2 px-4 bg-primary font-bold text-white rounded hover:bg-primary-darker focus:outline-none">
                        Sign in
                    </button>
                </div>
            </form>
            <hr class="mt-4">
            <div class="mt-4 text-xs text-gray-500 text-center">
                <div class="flex items-center justify-center">
                    <h1 class="text-gray-500">Don't have an account?</h1>
                    <a href="/register" class="text-primary hover:text-primary-darker font-bold mx-2">Create one</a>
                </div>
                <p class="mt-4 text-gray-400">@lang('global.copyright')</p>
            </div>
        </div>
    </div>
</div>
@endsection