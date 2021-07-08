@extends('layouts.app')
 
 @section('content')

 <div class="container">
  <h4> {{$user->name}} </h4>
  <strong> Posted {{$posts->count()}} {{Str::plural('posts',$posts->count())}}  and receive {{$user->receivedLikes->count()}} Likes </strong>
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
     <p> {{$user->name}} does not have any posts </p>
     @endif 


 @endsection