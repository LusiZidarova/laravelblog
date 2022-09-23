@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Edit Posts
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-4/5 mb-4 text-gray-50 bg-red-700 rounded-2x py-4">
                    {{ $error}}
                </li>

            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="{{ url('blog/'.$post[0]->id) }}"  method="post" enctype="multipart/form-data">
         @csrf
         @method('PUT')
        <input type="text" name="title" value="{{$post[0]->title}}" placeholder="Title..." class="bg-transparent block border-b-2 w-full h-20 text-5xl outline-none" />
   
        <select name="category" id="countries" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a category</option>
            @foreach ( $categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <textarea name="description" placeholder="Description..." class="py-20 bg-transparent block border-b2 w-full h-60 text-xl outline-none">{{$post[0]->description}}</textarea>

        <div class="bg-grey-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                <input type="file" name="image" class="hidden">
            </label>
        </div>
        <button type="submit" class="uppercase mt-15 bg-green-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl ">
            Submit Post

        </button>
    </form>
</div>

@endsection