<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task:') }} {{ $task->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Assign To User -->
                    <div>
                        <x-label for="user" :value="__('Assigned To')" />

                        <x-input id="user" class="block mt-1 w-full" type="text" name="user" value="{{ $task->user->name}}" disabled />
                    </div>

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
                        <x-label for="status" :value="__('Status')" />

                        <x-input id="status" class="block mt-1 w-full" type="text" name="status" value="{{ $task->status->name}}" disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
