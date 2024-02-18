@extends('layouts.admin')
@section('title', 'Post Create')
@section('content')

<div class="lg:flex flex-row gap-3 p-10 mt-10 border-2 rounded-sm">
    <div class="basis-1/3	 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">activity</h2>
      @include('partials.post-activity')
    </div>

    <div class="basis-1/2 p-5 border-2 rounded-sm">
      <h2 class="text-2xl capitalize">add new post</h2>
       <div>

        <div>
          @if(session('success'))
              <p class="text-green-400">{{ session('success') }}</p>
          @endif
        </div>
         
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="py-3">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" 
                name="title"
                placeholder="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
 
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
                    class="block mt-1 w-full"
                    placeholder="write description here">

                </textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

            </div>

            <div class="flex items-center justify-start mt-4">
                <x-primary-button type="submit">
                    {{ __('Post') }}
                </x-primary-button>
            </div>
        </form>

        <div class="mt-3">
          <x-nav-link :href="route('posts.index')" class="capitalize">
            {{ __('view all posts') }}
          </x-nav-link>
        </div>
       </div>
    </div>

    <div class="basis-1/6 p-5 border-2 rounded-sm">
        <h2 class="text-2xl capitalize"></h2>
       
    </div>

  </div>
@endsection

