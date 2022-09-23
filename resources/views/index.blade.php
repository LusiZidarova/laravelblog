@extends('layouts.app')

@section('content')
<div class="background-image grid grid-cols-1 m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text shadow-md pb-14">
                One simple page for blog!
            </h1>
            <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">Read More</a>
        </div>
    </div>
</div>
 <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200"> 

    <div >
        <img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/flowers-276014_1280.jpg" alt="" width="600" />
    </div>
    <div class="m-auto sm:m-auto text-left w-4/5 block">
        <h2 class="text-4xl font-extrabold text-gray-600">
            Section Finibus Bonorum
        </h2>
        <p class="py-8 text-gray-500 text-s">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <p class="font-extrabold text-gray-600 text-s pb-9">
            The standard Lorem Ipsum passage, used since the 1500
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
        </p>
        <a href="/blog" class=" uppercase bg-green-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
            Find More
        </a>
    </div>
</div>
<div class="text-center p-5 bg-black text-white">
    <h2 class="text-2xl pb-5 text-l">About
    </h2>
    <span class="font-extrabold block text-1xl py-1">Title 1 </span>
    <span class="font-extrabold block text-1xl py-1">Title 2 </span>
    <span class="font-extrabold block text-1xl py-1">Title 3 </span>
    <span class="font-extrabold block text-1xl py-1">Title 4 </span>
</div>
<div class="text-center py-15">
    <span class="uppercase text-s text-gray-400">
        Blog
    </span>
    <h2 class="text-4xl font-bold py-10">
        Recent Posts
    </h2>
    <p class="m-auto w-4/5 text-gray-500">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. I
    </p>
</div>
@endsection