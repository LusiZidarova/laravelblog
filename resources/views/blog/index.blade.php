@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
        {{session()->get('message')}}
    </p>

</div>

@endif

@if(Auth::check())
<div class="pb-8 pt-5 w-4/5 m-auto">
    <a href="{{ url('blog/create') }}" class="bg-green-500 uppercase bg-trasparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
        Create post
    </a>
</div>

@endif


<div class="flex">
    <aside class="w-60  left-0  h-screen bg-slate-700 p-2">
        <ul>
            @foreach ($categories as $category)
            <li>
                <a class="flex items-left text-sm py-4 px-6 h-12  overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-black-100
                 transition duration-300 ease-in-out" href="{{ url('blog/'.$category->id.'/list') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">{{$category->name}}</a>


            </li>
            @endforeach
        </ul>
    </aside>
    <main class="flex-1 ml-75">
        <div class="lg:grid grid-cols-2 gap-20 w-5/6 mx-auto py-15 border-b border-gray-2">
            @foreach ($posts as $post)
            <div>
                <img src="{{url($post->image_path)}}" alt="" width="500" />
            </div>
            <div>
                <h2 class="text-gray-700 font-bold text-3xl pb-4">
                    {{$post->title}}
                </h2>
                <span class="text-gray-500 ">
                    By <span class="font-bold italic text-gray-800">
                        {{$post->user->name}}
                    </span> ,Created on {{date('jS M Y',strtotime($post->updated_at))}} ,<p>category: {{$post->category->name}}</p>
                </span>
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{$post->description}}
                </p>
                <a href="{{ url('blog/'.$post->id) }}" class="uppercase bg-green-500 text-gary-100 text-lg font-axtrabold py-4 px-8 rounded-3xl">
                    Read More
                </a>
                @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a href="{{ url('blog/'.$post->id.'/edit') }}" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>
                <span class="float-right">
                    <form action="{{ url('blog/delete/'.$post->id) }}" method="POST">
                        @csrf
                        <!-- @method('delete') -->
                        <button class="text-red-500 pr-3" type="submit">Delete</button>
                    </form>
                </span>
                @endif
            </div>
            @endforeach
        </div>

    </main>
</div>


@endsection