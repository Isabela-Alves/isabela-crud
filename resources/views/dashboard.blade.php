<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Você está logado!") }}
                    @foreach (Auth::user()->myMaterials as $material)
                    <div>
                        class="
                        flex justify-between border-b mb=2 gap-4
                        hover:bg-gray300
                        "
                        x-data ="{showDelete:false,showEdit:false}">
                        <div>{{$material ->description}}</div>
                        <div>{{$material ->expiration}}</div>
                        </div>
                        <div class ="flex gap-2">
                            <div>
                               <span class="cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true">Delete</span>
                            </div>
                            <div> 
                                <span clss="cursor-pointer px=2 bg-blue-500 text-white" @click="showEdit = true">Edit</span>
                            </div>
                        </div>
                        <template x-if="showDelete">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                                <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 z-10">
                                    <h2 class="text-xl front-bold text-center">Are you sure?</h2>
                                    <div class="flex justify-between mt-4">
                                        <from action="{{ route('material.destroy', $material )}}" method="POST">
                                            @csrf  
                                            @method('DELETE')
                                        <x-danger-button>Delete anyway</x-danger-button>
                                        </from>
                                        <x-primary-button @click="showDelete = false">Cancel</x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </template>
                        
                        <template x-if="showEdit">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                               <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10">
                                <h2 class="text-xl front-bold text-center">{{ $material ->description }}</h2>
                                <from class="my-4" acion="{{ route('material.update', $material)}}" method="POST">
                                    @csrf  
                                    @method('PUT')
                                    <x-text-input name="description" placeholder="Description" value="{{ $material->description}}" />
                                    <x-text-input name="expiration" placeholder="Expiration" value="{{ $material->expiration}}" />
                                    <x-primary-button class="w-full text-center mt-2">Save</x-primary-button>
                                </from>
                                <x-danger-button @click="shoEdit = false" class="w-full">Cancel</x-danger-button>
                               </div>
                            </div>
                        </template>
                </div>
                @endforeach

                <from action="{{route('material.store')}}" method="POST">
                    @csrf 
                    <x-text-input name="description" placeholder="Description"/>
                    <x-text-input name="expiration" placeholder="Expiration" />
                    <x-primary-button>Save</x-primary-button>
                </from>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

                                


             
