@extends('layouts.app')

@section('content')
    
    <div class = "flex justify-center" >

        <div class = "w-4/12 bg-white p-6 rounded-lg" >
            <h1>Register</h1>
            <form action=" {{ route('register') }}"  method = "post" >
                @csrf 
                <div class = "mb-4">
                    <label for="Name" class= "sr-only" > Name</label>
                    <input type="text" name  = "name" id = "name" placeholder="Your name here" 
                    value = "{{ old ('name')}}">

                    @error ('name')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for="username" class= "sr-only" > Username</label>
                    <input type="text" name  = "username" id = "username" placeholder="Your Username here" 
                    value = "{{ old ('username')}}" >

                    @error ('username')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror

                </div>

                <div class = "mb-4">
                    <label for="email" class= "sr-only" > Email</label>
                    <input type="text" name  = "email" id = "email" placeholder="Your Email here" 
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
                    value = "">

                    @error ('password')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror

                </div>

                <div >
                    <label for="password_confirmation" class= "sr-only" > Password Confirmation</label>
                    <input type="password" name  = "password_confirmation" id = "password_confirmation" placeholder="Confirm Password" />
                </div>

                <div >
                    
                    <button type = "submit">Submit</button>

                </div>


            </form>

           

        </div>
    </div>

@endsection

