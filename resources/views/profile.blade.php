@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('profile') }}" method="post">
            @csrf
            @if (\Session::has('success'))
            <div
                class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 ">
                <div slot="avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-check-circle w-5 h-5 mx-2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div class="text-xl font-normal  max-w-full flex-initial">
                    <div class="py-2">{!! \Session::get('success') !!}
                        <div class="text-sm font-base">If you need to update your password please contact Admin. <a
                                href="/#">here</a></div>
                    </div>
                </div>
                <div class="flex flex-auto flex-row-reverse">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                </div>
            </div>

            @endif
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ auth()->user()->name }}">

                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Your Email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ auth()->user()->email }}">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="Your Username"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                    value="{{auth()->user()->username}}">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

            {{-- <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Your Password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value="">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
    </div>
    @enderror
</div>
<div class="mb-4">
    <label for="password_confirmation" class="sr-only">Password again</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"
        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
</div> --}}
<div><button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button></div>
</form>
</div>

</div>

@endsection
