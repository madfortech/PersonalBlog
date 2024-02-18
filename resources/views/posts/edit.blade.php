@extends('layouts.admin')
@section('title', 'Edit Post ')
@section('content')

<div class="lg:flex flex-row gap-3 p-10 mt-10 border-2 rounded-sm">
    <div class="basis-1/3	 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">activity</h2>
      @include('partials.post-activity')
    </div>

    <div class="basis-1/2 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">update post</h2>
      <div class="p-3">
        @if(session('success'))
          <p class="text-green-400">{{ session('success') }}</p>
        @endif
      </div>
       <div>

        <form method="post" action="{{ route('posts.update', $posts->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Title -->
            <div class="py-3">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" 
                name="title" 
                value="{{ $posts->title }}"
                />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            {{-- <!-- Category -->
            <div class="py-3">
                <x-input-label for="category" :value="__('Category')" />
                <select name="categories" id="category" class="w-full">
                  @foreach($category as $id => $item)
                    <option value="{{ $id }}">{{ $item }}</option>
                  @endforeach
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div> --}}

            
            <!-- Avatar -->
            <div class="py-3">
                <x-input-label for="avatar" :value="__('Avatar')" />
                <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" 
                />
                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="py-3">
                <x-input-label for="description" :value="__('Description')" />
                <textarea name="description" id="description" cols="30" rows="10"
                    class="block mt-1 w-full">
                    {{ $posts->description }}
                </textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

            </div>

            <div class="flex items-center justify-start mt-4">
                <x-primary-button>
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
       </div>
    </div>

    <div class="basis-1/6 p-5 border-2 rounded-sm">
        <h2 class="text-2xl capitalize"></h2>
        
    </div>

  </div>
@endsection

