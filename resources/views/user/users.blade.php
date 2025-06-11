@extends('layout')

@section('title', $user_title)

@section('content')

    @if($user_type === "register" || $user_type === "login")
        
    
   
            <form action="{{ $user_type === "register" ? route('register') :  route("login") }}" method="POST" class="w-80">
            <!-- Email input -->
                @csrf
                  @method("POST")
            @if($user_type === "register" )
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name"/>
                </div>
            @endif
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input type="email" id="form2Example1" class="form-control" name="email" />
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" />
            </div>

            <!-- Submit button -->
            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary w-full mb-4">{{ $user_type === "register" ? "Sign-Up" :  "Login" }}</button>

            <!-- Register buttons -->
            <div class="text-center w-full">
                <p> {{ $user_type === "register" ? "You Have Account ?" :  "Create a new Account ?" }} <a href={{ $user_type === "register" ? route("login.user") :  route("register.user") }}>{{ $user_type === "register" ? "Login" :  "Sign-Up" }}</a></p>
               
            </div>
            </form>
        @endif
@endsection 