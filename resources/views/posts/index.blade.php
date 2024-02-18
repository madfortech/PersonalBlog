@extends('layouts.admin')
@section('title', 'view all posts')
@section('content')
 
<div class="lg:flex flex-row gap-3 p-10 mt-10 border-2 rounded-sm">
    <div class="basis-1/3	 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">activity</h2>
      @include('partials.post-activity')
    </div>

    <div class="basis-1/2 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">view all posts</h2>
       <div class="overflow-x-auto">
        <table class="min-w-full mt-3 md:table-auto border-separate border-spacing-3 border border-slate-400 p-5">
            <thead>
              <tr>
                <th class="border p-3">Id</th>
                <th class="border p-3">Title</th>
                <th class="border p-3">Description</th>
                <th class="border p-3">Created at</th>
                <th class="border p-3">Updated at</th>
                <th class="border p-3">Edit</th>
                <th class="border p-3">Remove</th>
              </tr>
            </thead>
            @foreach($posts as $key => $item)
              <tbody>
                <tr>
                  <td class="border p-3">{{ $item->id ?? '' }}</td>
                  <td class="border p-3">{{ $item->title ?? '' }}</td>
                  <td class="border p-3">{{ $item->description ?? '' }}</td>
                  <td class="border p-3"> {{ $item->created_at ?? '' }}</td>
                  <td class="border p-3"> {{ $item->updated_at ?? '' }} </td>
                  <td class="border">
                    <a href=" {{route('posts.edit',$item->id )}}" class="bg-green-500 p-3 text-white">Edit</a>
                  </td>
                  <td class="border">
                    <form action="{{route('posts.destroy',$item->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <div>
                        <x-primary-button type="submit" 
                          class="bg-red-500 p-3 text-white border-2 rounded-none">
                          {{ __('Remove') }}
                        </x-primary-button>
                      </div>
                    </form>
                  </td>
                </tr>
              </tbody>
            @endforeach
          </table>
       </div>
    </div>

    <div class="basis-1/6 p-5 border-2 rounded-sm">
        <h2 class="text-2xl capitalize"></h2>
        
    </div>

  </div>
   
@endsection
