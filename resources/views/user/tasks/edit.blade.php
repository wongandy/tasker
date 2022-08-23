<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Task Status') }}
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

                    <form method="POST" action="{{ route('user.tasks.update', $task) }}">
                        @csrf
                        @method('PUT')

                        <!-- Task name-->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Task')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $task->name}}" disabled />
                        </div>

                        <!-- Task details -->
                        <div class="mt-4">
                            <x-label for="details" :value="__('Details')" />

                            <x-textarea id="details" class="block mt-1 w-full" name="details" disabled>{{ $task->details}}</x-textarea>
                        </div>

                        <!-- Task status -->
                        <div class="mt-4">
                            <x-label for="user_id" :value="__('Status')" />

                            <select name="status_id" id="status_id" class="block mt-1 w-full">
                                @foreach ($status as $status)
                                    <option value="{{ $status->id }}" @if ($status->id == $task->status_id) selected @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-button>
                                {{ __('Update Task Status') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
