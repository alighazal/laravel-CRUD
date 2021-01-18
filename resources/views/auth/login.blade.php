@extends('layouts.app')

@section('content')
    
    <div class = "flex justify-center" >

        <div class = "w-4/12 bg-white p-6 rounded-lg" >
            <div class = " flex mb-4 font-bold text-xl justify-center "> Login</div>

            <form action=" {{ route('login') }}"  method = "post" >
                @csrf 
                
                @if (session()->has('status'))
                    <div class = "bg-red-500 p-4 rounded-lg text-white text-center mb-3">
                        {{session('status')}}
                    </div>
                @endif
                

                <div class = "mb-4">
                    <label for="email" class= "sr-only" > Email</label>
                    <input type="text" name  = "email" id = "email" placeholder="Your Email here" 
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg  @error('email') border-red-500 @enderror "
                    value = "{{ old ('email')}}">

                    @error ('email')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror

                </div>

                <div class = "mb-4">
                    <label for="password" class= "sr-only" > Password</label>
                    <input type="password" name  = "password" id = "password" placeholder="Your Password here" 
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg  @error('password') border-red-500 @enderror "
                    value = "">

                </div>

                <div class = "mb-4">
                    <div class = "flex items-center">
                        <input type="checkbox" name= "remember" id = "remember" class = "mr-2">
                        <label for="remember">Remember me</label> 

                    </div>
                </div>

                
                <div class = "flex justify-center">
                    
                    <button type = "submit" class = "bg-blue-500 text-white px-4 py-3 
                    rounded font-medium w-4/12 "> Login </button>

                </div>


            </form>

           

        </div>
    </div>

@endsection

