<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Here's the list of your clients:</p>
                    @foreach ($clients as $client)
                        <div class="py-3 text-gray-900">
                            <b>Client name:</b>
                            <h3 class="text-lg text-gray-500">{{ $client->name }}</h3>

                            <b>Client Redirect: </b>
                            <p>
                                <a href="{{ $client->redirect }}">{{ $client->redirect }}</a>
                            </p>
                            <b>Client Secret: </b>
                            <p>{{ $client->secret }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/oauth/clients" method="POST">
                        <div class="mt-2">
                            <x-label for="name">Name:</x-label>
                            <x-input type='text' name='name'></x-input>
                        </div>
                        <div class="mt-2">
                            <x-label for="redirect">Redirect:</x-label>
                            <x-input type='text' name='redirect' placeholder="https://your-url.com/callback"></x-input>
                        </div>
                        <div class="mt-4">
                            @csrf
                            <x-button type='submit'>Create Client</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
