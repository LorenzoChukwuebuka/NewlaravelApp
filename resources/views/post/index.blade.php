@extends('layouts.app')
 
 @section('content')
 <div class="row">
    <div class="col s6 offset-s3">
      <div class="card blue darken-3 z-depth-5">
        <div class="card-content black-text">
          <span  class="card-title"> Make a post </span>

            @if(session('status'))
            <div>
             {{session('status')}}
             </div>

            @endif

             <form action="{{route('post')}}" method="POST">
             @csrf
                 <div class="row "> 

                 
				<div class="input-field col s12">
				 
				<textarea class="materialize-textarea" name="body" placeholder="Post"  required></textarea>
                
                @error('body')
                 <div>
                   {{$message}}
                  </div>
                  @enderror
			   </div>

              
               <div class='row '>
				   <div class="input-field col s6">
				  <button class="btn waves-effect  waves-light" type="submit" > Post </button>
				   </div>
                       
				 
           
                  </div>


             </form>
              
          
        </div>
        
      </div>
    </div> 

    @if($posts->count())
      @foreach($posts as $post)
       
       <div class="container">
       <ul class="collection">

         <li class="collection-item"> 
      <p> <strong>  
	       <a href="{{route('users.post',$post->user)}}">
	    {{$post->user->name}}
		</a>		 </strong> <span>   {{$post->created_at->diffForHumans()}} </span>  </p>
       <p>  {{$post->body}} </p>

		<div class='col s4'>
		 
		 @can('delete',$post)
			<form action="{{route('post.destroy',$post->id)}}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="red-text"> Delete </button>
			</form>
			@endcan

		@auth
			@if(!$post->likedBy(auth()->user()))
			<form action="{{route('post.likes',$post->id)}}" method="POST">
			@csrf
			<button type="submit" class="blue-text"> Like </button>
			</form>
				@else
			<form action="{{route('post.likes',$post->id)}}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit" class="red-text"> Unlike </button>
			</form>
				@endif
		@endauth
			<span> {{$post->likes->count()}}  {{Str::plural('like'), $post->likes->count() }} </span>

			</div>
       
          </li>
       </ul>
       </div>
      
      @endforeach
      
      {{$posts->links()}}
     @else
     <p> There are no posts at the moment </p>
     @endif 


 </div>
 
 @endsection