@extends('layouts.admin')
@section('title', 'view all users')
@section('content')
 
<div class="lg:flex flex-row gap-3 p-10 mt-10 border-2 rounded-sm">
    <div class="basis-1/3	 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">activity</h2>
      @include('partials.post-activity')
    </div>

    <div class="basis-1/2 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">view all users</h2>
       <div class="overflow-x-auto">
        <table class="min-w-full mt-3 md:table-auto border-separate border-spacing-3 border border-slate-400 p-5">
            <thead>
              <tr>
                <th class="border p-3">Id</th>
                <th class="border p-3">Name</th>
                <th class="border p-3">Email</th>
                <th class="border p-3">Created at</th>
                <th class="border p-3">Updated at</th>
              </tr>
            </thead>
            @foreach($users as $key => $item)
              <tbody>
                <tr>
                  <td class="border p-3">{{ $item->id ?? '' }}</td>
                  <td class="border p-3">{{ $item->name ?? '' }}</td>
                  <td class="border p-3">{{ $item->email ?? '' }}</td>
                  <td class="border p-3"> {{ $item->created_at ?? '' }}</td>
                  <td class="border p-3"> {{ $item->updated_at ?? '' }} </td>
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
