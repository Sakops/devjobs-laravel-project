@extends('layout')

@section('content')
<a href="/" class="text-black ml-4"> Back </a>

<x-card class="p-5">
    <div class="absolute top-4 left-3">
        <i
            class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
        ></i>
    </div>
   
</div>
</form>

<div class="mx-4">
<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Manage Posts
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($listings->isEmpty())
            @foreach($listings as $listing)
                
            <tr class="border-gray-300">
                <p>Created by: {{$listing->user_id}}</p>

                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="show.html">
                        {{$listing->title}}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a
                        href="/listings/{{$listing->id}}/edit"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-pen-to-square"
                        ></i>
                        Edit</a
                    >
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                <form class="mt-2" method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="fa-solid fa-trash bg-red-500 text-white py-2 rounded-xl hover:opacity-80"
                        >Delete
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3" class="text-center">
                    <p class="text-gray-500">
                        You have no listings.
                    </p>
                </td>
            @endunless
        </tbody>
    </table>
</x-card>
@endsection