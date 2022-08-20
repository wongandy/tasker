<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assigned Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="p-6 bg-white border-gray-200">                
                            <x-anchor :href="route('admin.tasks.create')">Assign Task</x-anchor>
                        </div>
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Task
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Details
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Created By
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Created At
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Action</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($tasks as $task)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $task->user->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $task->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $task->details }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $task->user->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $task->created_at->diffForHumans() }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        @can('edit', $task)
                                                            <x-anchor :href="route('admin.tasks.edit', $task)" class="mb-1">Edit</x-anchor>
                                                        @endcan

                                                        @can('delete', $task)
                                                            <form method="POST" action="{{ route('admin.tasks.delete', $task) }}" style="display: inline-block">
                                                                @csrf
                                                                @method('DELETE')

                                                                <x-button>
                                                                    {{ __('Delete') }}
                                                                </x-button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td>No tasks yet</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $tasks->links() }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="p-6 bg-white border-b border-gray-200">                
                    <x-anchor :href="route('admin.tasks.create')">Assign Task</x-anchor>
                </div>

                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    User
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Task
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Details
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Created At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $task->user->name }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $task->name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $task->details}}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $task->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            @empty
                            <tr><td>No tasks yet</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
</x-admin-layout>
