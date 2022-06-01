@extends('layout')

@section('content')
<a href="/" class="inline-block text-black ml-4 mb-4 hover:text-laravel"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="images/acme.png"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$listing['title']}}</h3>
                        <div class="text-xl font-bold mb-4">Acme Corp</div>
                        <x-list-tags :tags="$listing->tags" />

                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing['location']}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                {{$listing['title']}}
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{$listing['description']}}
                                </p>

                                <a
                                    href="mailto:test@test.com"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    {{$listing['company']}}</a
                                >

                                <a
                                    href="https://test.com"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    {{$listing['website']}}</a
                                >
                            </div>
                        </div>
                        <x-card>
                            <a href="/listings/{{$listing->id}}/edit">
                                <i class="fa-solid fa-pencil">Edit</i>
                            </a>
                            
                            
                        </x-card>
                        <form class="mt-2" method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="fa-solid fa-trash bg-red-500 text-white py-2 rounded-xl hover:opacity-80"
                                >Delete
                            </button>
                        </form>
                    </div>
                
                </x-card>
            </div>
@endsection