<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-3 text-red-500">
                            <p>Errors found:</p>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif               

                    <div>
                        <form method="POST" action="{{ route('admin.tasks.store') }}">
                            @csrf

                            <!-- Assign To User -->
                            <div>
                                <x-label for="user_id" :value="__('Assign To')" />

                                <select name="user_id" id="user_id" class="block mt-1 w-full">
                                    <option value="" disabled selected>-- SELECT USER --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if (old('user_id') == $user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Task name-->
                            <div class="mt-4">
                                <x-label for="name" :value="__('Task')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" />
                            </div>

                            <!-- Task details -->
                            <div class="mt-4">
                                <x-label for="details" :value="__('Details')" />

                                <x-textarea id="details" class="block mt-1 w-full" type="text" name="details">{{ old('details') }}</x-textarea>
                            </div>

                            <div class="mt-4">
                                <x-button>
                                    {{ __('Assign Task') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
