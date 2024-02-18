<x-app-layout>
 
@section('title', 'Posts')


<div class="lg:grid grid-rows-1 grid-flow-row px-4 sm:px-6 lg:px-8 mt-12 pt-12">
    <div class="p-2 mx-auto max-w-3xl rounded overflow-hidden shadow-lg">
      @if($post->hasMedia('posts'))
        @foreach($post->getMedia('posts') as $media)
          <video controls>
            <source src="{{ $media->getUrl() }}" type="{{ $media->mime_type }}">
          </video>
        @endforeach
      @endif
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">  {{ $post->title ?? '' }}</div>
        <p class="text-grey-darker text-base">
            {{ $post->description ?? '' }}
        </p>
      </div>
      <div class="px-6 py-4">
        <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">
            {{ $post->user->name ?? 'Unknown User' }}
        </span>
        <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">
          
      
        </span>
       </div>
      <div class="px-6 py-4">
      
      </div>
    </div>

  
</div>
</x-app-layout>