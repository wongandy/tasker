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
                            <div class="pb-3 bg-white border-gray-200">
                                <x-anchor :href="route('admin.tasks.create')">Assign Task</x-anchor>
                            </div>
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Assigned To
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Task
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Details
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Created At
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
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
                                                            {{ $task->created_at->diffForHumans() }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ $task->status->name }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            @can('edit', $task)
                                                                <x-anchor :href="route('admin.tasks.edit', $task)" class="mb-10">Edit</x-anchor>
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
                                    </div>

                                    <div class="mt-3">
                                        {{ $tasks->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
