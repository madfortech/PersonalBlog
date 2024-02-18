@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')
 
      <div class="lg:flex flex-row gap-3 p-10 mt-10 border-2 rounded-sm">
        <div class="basis-1/3	 p-5 border-2 rounded-sm">
          <h2 class="text-2xl capitalize">activity</h2>
          
          @include('partials.post-activity')
        </div>

        <div class="basis-1/2 p-5 border-2 rounded-sm">
          <h2 class="text-2xl capitalize">users</h2>
          <div>
            <p class="font-medium text-blue-900 capitalize">recent users</p>
           
            <ul class="py-3 list-decimal bg-gray-300 divide-y">
              @foreach($users as $key => $item)
                <li>
                  {{ $item->name ?? '' }}
                </li>
              @endforeach
            </ul>
         
            <a href="{{route('users.index')}}" class="text-blue-400 uppercase">view more</a>
          </div>
        </div>

        <div class="basis-1/6 p-5 border-2 rounded-sm">
          <h2 class="text-2xl capitalize"></h2>
          <div>
            @if(session('success'))
              <p class="text-green-400 p-3">{{ session('success') }}</p>
            @endif
          </div>
            
            <div class="mt-3">
               
            </div>
        </div>

      </div>
   
@endsection
