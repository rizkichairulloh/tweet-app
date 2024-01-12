<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{ route('tweets.store') }}" method="post">
                        @csrf
                        <textarea name="content" class="textarea textarea-bordered bg-white w-full" placeholder="Apa yang kamu pikirkan?"
                            rows="4"></textarea>
                        <input type="submit" value="Tweet" class="btn btn-primary text-white my-2">
                    </form>
                </div>
            </div>
            @foreach ($tweets as $tweet)
                <div class="card my-4 bg-white">
                    <div class="card-body my-2">
                        <div class="text-gray-700 text-xl font-bold font-sans"> {{ $tweet->user->name }}</div>
                        <p>{{ $tweet->content }}</p>
                        <div class="flex justify-end items-center space-x-3">
                            @can('update', $tweet)
                                <a href="{{ route('tweets.edit', $tweet->id) }}" class="link-hover text-blue-700">Edit</a>
                            @endcan
                            @can('delete', $tweet)
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('tweets.destroy', $tweet->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-error text-white">HAPUS</button>
                                </form>
                            @endcan
                            <span class="text-xs">{{ $tweet->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="my-4">{{ $tweets->links() }}</div>
        </div>
    </div>
</x-app-layout>
