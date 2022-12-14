<x-admin-layout>
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
                        <div>
                            Total assigned tasks: <a class="text-blue-500" href="{{ route('admin.tasks') }}">{{ $totalAssignedTasks  }}</a>
                        </div>

                        <div>
                            Total assigned tasks started: <a class="text-blue-500" href="{{ route('admin.tasks.started') }}">{{ $totalAssignedTasksStarted }}</a>
                        </div>

                        <div>
                            Total assigned tasks not started: <a class="text-blue-500" href="{{ route('admin.tasks.not_started') }}">{{ $totalAssignedTasksNotStarted }}</a>
                        </div>

                        <div>
                            Total assigned tasks completed: <a class="text-blue-500" href="{{ route('admin.tasks.completed') }}">{{ $totalAssignedTasksCompleted  }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
