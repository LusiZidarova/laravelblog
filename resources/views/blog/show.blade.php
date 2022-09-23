@extends('layouts.app')

@section('content')


<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
        Single View
    </h1>
    </div>
</div>


<!-- <div class="w-4/5 m-auto pt-20">
<div>
  

        <img src="" alt="" width="600" />
    </div>

        <span class="text-gray-500 ">
            By <span class="font-bold italic text-gray-800">
              Lusi
            </span> ,Created on 
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
       
        </p>


</div> -->

<div class="lg:grid grid-cols-3 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <img src="{{url($post[0]->image_path)}}" alt="" width="600" />
    </div>
    <div>
    <h2 class="text-gray-700 font-bold text-3xl pb-4">
                    {{$post[0]->title}}
                </h2>
                <span class="text-gray-500 ">
                    By <span class="font-bold italic text-gray-800">
                    {{$post[0]->user->name}}
                    </span> ,Created on {{date('jS M Y',strtotime($post[0]->updated_at))}} ,<p>category: {{$post[0]->category->name}}</p>
                </span>
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{$post[0]->description}}
                </p>

    
    </div>
</div>
    


@endsection