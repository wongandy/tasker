<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Assigned Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif               

                    <form method="POST" action="{{ route('admin.tasks.update', $task) }}">
                        @csrf
                        @method('PUT')

                        <!-- Assign To User -->
                        <div>
                            <x-label for="user_id" :value="__('Assign To')" />

                            <select name="user_id" id="user_id" class="block mt-1 w-full">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if ($task->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Task name-->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Task')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $task->name}}" />
                        </div>

                        <!-- Task details -->
                        <div class="mt-4">
                            <x-label for="details" :value="__('Details')" />

                            <x-textarea id="details" class="block mt-1 w-full" name="details">{{ $task->details}}</x-textarea>
                        </div>

                        <div class="mt-4">
                            <x-button>
                                {{ __('Edit Task') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
