@extends('layouts.app')
 
 @section('content')
 	 
 <div class="row">
    <div class="col s6 offset-s3">
      <div class="card blue darken-3 z-depth-5">
        <div class="card-content black-text">
          <span  class="card-title"> Login</span>

            @if(session('status'))
            <div class="red-text text-darken-1">
             {{session('status')}}
             </div>

            @endif

             <form action="{{route('login')}}" method="POST">
             @csrf
                 <div class="row col s12">

               <div class="input-field col s10">
           
              <input id="email" type="email" placeholder="Enter your email" class="validate" name="email" value="{{ old('email')}}" required>
              @error('email')
                 <div>
                  {{$message}}
                 </div>
                @enderror
             </div>
               

                 
				<div class="input-field col s10 ">
				 
				<input id="password" type="Password" class="validate" placeholder="enter your password"  name="password"  required>
                @error('password')
                 <div>
                   {{$message}}
                  </div>
                  @enderror
			   </div>

               
                 </div>

                  <div class='row '>
				   <div class="input-field col s6">
				  <button class="btn waves-effect  waves-light" type="submit" > Login  </button>
				   </div>
                       
				 
           
                  </div>

             </form>
              
          
        </div>
        
      </div>
    </div>
  </div>
 
 @endsection