@php
$allScopes = \Laravel\Passport\Passport::scopes();
$displayScopes = isset($scopes) ? $allScopes : $scopes;
@endphp
@extends('template')
@section('content')
<div class="">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-gray-100 shadow-2xl p-12 flex flex-col justify-center rounded-xl gap-5">
            <div class="flex justify-center">
                <img src="{{asset('storage/sso/'. $client->logo)}}" alt="{{$client->name}} Logo" class="w-sm">
            </div>
            <div class="text-left">
                <div class="">
                    <h2 class="text-2xl font-bold">Bienvenido/a {{activeUser()->name}}</h2>
                </div>
                <div class="">
                    <h4 class="text-xl"><span class="italic">{{$client->name}}</span> solicita permiso para
                        acceder a tu información:
                    </h4>
                </div>
            </div>
            <div class="">
                <ul>
                    @foreach ($displayScopes as $key => $scope)
                    <li data-popover-target="popover-{{$key}}"
                        class="focus:ring-4 focus:outline-none border-b-[0.5px] hover:bg-gray-200 focus:ring-blue-300 font-medium text-sm px-2 my-5 py-2.5">
                        {{scopeTitle($scope->id)}}</li>
                    <div data-popover id="popover-{{$key}}" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-50">
                        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                            <h3 class="font-semibold ">{{scopeTitle($scope->id)}}</h3>
                        </div>
                        <div class="px-3 py-2">
                            <p>{{$scope->description}}</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                    @endforeach
                </ul>

            </div>
            <div class="">
                <div class="flex justify-center items-center gap-5 mt-12">
                    <form action="{{ route('passport.authorizations.approve') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="state" value="{{ request('state') }}">
                        <input type="hidden" name="client_id" value="{{ request('client_id') }}">
                        <input type="hidden" name="auth_token" value="{{ $authToken }}">


                        <button type="submit"
                            class="w-full py-2 px-4 bg-emerald-400 text-white rounded-lg font-medium shadow hover:bg-indigo-700 transition">
                            ✔️ Autorizar
                        </button>
                    </form>
                    <form action="{{ route('passport.authorizations.deny') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="state" value="{{ request('state') }}">
                        <input type="hidden" name="client_id" value="{{ request('client_id') }}">
                        <input type="hidden" name="auth_token" value="{{ $authToken }}">



                        <button type="submit"
                            class="w-full py-2 px-4 bg-red-600 text-white rounded-lg font-medium shadow hover:bg-red-700 transition">
                            ✖️ Denegar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection