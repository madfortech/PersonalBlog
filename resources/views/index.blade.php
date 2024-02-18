<x-app-layout>
  @section('title', 'Personal Blog')


  <div class="lg:grid grid-rows-1 grid-flow-row px-4 sm:px-6 lg:px-8 mt-12 pt-12">
   
    @foreach($posts as $key => $item)
      <div class="p-2 mx-auto max-w-2xl rounded overflow-hidden shadow-lg">
      
          @if($item->hasMedia('posts'))
            @foreach($item->getMedia('posts') as $media)
              <video 
                controls
               >
                <source src="{{ asset($media->getUrl()) }}" type="{{ $media->mime_type }}">
              </video>
            @endforeach
          @endif
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">  {{ $item->title ?? '' }}</div>
            <p class="text-grey-darker text-base">
              {{ Illuminate\Support\Str::limit($item->description ?? '', 100) }}      
            </p>
          </div>
          <div class="px-6 py-4">
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">
                {{ $item->user->name ?? 'Unknown User' }}
            </span>
          </div>
          <div class="px-6 py-4">
            <x-nav-link :href="route('posts.show', ['slug' => $item->slug])">
              {{ __('Read more') }}
            </x-nav-link>
          
          </div>
       
      </div>
    @endforeach

  </div>

</x-app-layout>