@extends('layout')

@section('content')
<a href="/" class="inline-block text-black ml-4 mb-4 hover:text-laravel"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
<x-card>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Post Job
        </h2>
        <p class="mb-4">Edit: {{$listing->title}}</p>
    </header>

    <form method="POST" action="/listings/{{$listing->id}}">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label
                for="company"
                class="inline-block text-lg mb-2"
                >Company Name</label
            >
            @error('company')
                <p class="text-red-500 text-sm">required field</p>
            @enderror
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="company"
            />
        </div>

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2"
                >Job Title</label
            >
            @error('title')
                <p class="text-red-500 text-sm">required field</p>
            @enderror
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                placeholder="Example: Senior Laravel Developer"
                value="{{$listing->title}}"
            />
        </div>

        <div class="mb-6">
            <label
                for="location"
                class="inline-block text-lg mb-2"
                >Job Location</label
            >
            @error('location')
                <p class="text-red-500 text-sm">required field</p>
            @enderror
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="location"
                placeholder="Example: Remote, Boston MA, etc"
                value="{{$listing->location}}"
            />
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Contact Email</label
            >
            @error('email')
                <p class="text-red-500 text-sm">required field</p>
            @enderror
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{$listing->email}}"

            />
        </div>

        <div class="mb-6">
            <label
                for="website"
                class="inline-block text-lg mb-2"
            >
                Website/Application URL
            </label>
            @error('website')
                <p class="text-red-500 text-sm">required field</p>
            @enderror
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="website"
                value="{{$listing->website}}"

            />
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            @error('tags')
                <p class="text-red-500 text-sm">required field</p>
            @enderror
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="tags"
                placeholder="Example: Laravel, Backend, Postgres, etc"
                value="{{$listing->tags}}"

            />
        </div>


        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Job Description
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="Include tasks, requirements, salary, etc"
            ></textarea>
        </div>

        <div class="mb-6">
            <input
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                value="Update Job" type="submit" />

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
@endsection