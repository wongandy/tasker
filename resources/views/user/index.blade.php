<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        Total tasks started: <a class="text-blue-500" href="{{ route('user.tasks.started') }}">{{ $totalTasksStarted  }}</a>
                    </div>

                    <div>
                        Total tasks not started: <a class="text-blue-500" href="{{ route('user.tasks.not_started') }}">{{ $totalTasksNotStarted }}</a>
                    </div>

                    <div>
                        Total tasks completed: <a class="text-blue-500" href="{{ route('user.tasks.completed') }}">{{ $totalTasksCompleted  }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
