<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
        .cursor-pointer{
            color: red;
            text-decoration:underline;
            cursor:pointer;
        }
        
	</style>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
        
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full rounded-md">
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Title</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                Description</th>
              <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-800" colspan="3">
                Action</th>
            </tr>
          </thead>
          @foreach (Auth::user()->myMaterials as $material)
          <tbody class="bg-gray-800" x-data="{showDelete:false, showEdit:false}">
            
            <tr>
            
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="text-sm leading-5 text-white">{{$material ->description}}
                </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
              <div class="text-sm leading-5 text-white">{{$material ->expiration}}
                </div>
              </td>

              <td class="font-medium text-center whitespace-no-wrap border-b border-gray-200 ">
              <div class="flex gap-2 flex-col">
                            <div>
                                <span class="cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true">Deletar</span>
                            </div>
                            <div>
                                <span class="cursor-pointer px-2 bg-red-500 text-white" @click="showEdit = true">Editar</span>
                            </div>
                        </div>
                        <template x-if="showDelete">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 rounded-md">
                                    <h2 class="text-xl font-bold text-center">Tem certeza?</h2>
                                    <div class="flex justify-between mt-4">
                                        <form action="{{ route('material.destroy', $material) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Deletar</x-danger-button>
                                        </form>
                                        <x-primary-button @click="showDelete = false">Cancelar</x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="showEdit">
                            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0">
                                <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 rounded-md">
                                    <h2 class="text-xl font-bold text-center">Edição</h2>
                                        <form  class="my-4" action="{{ route('material.update', $material) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-text-input name="description" placeholder="Description" value="{{$material ->description}}" />
                                            <x-text-input name="expiration" placeholder="Expiration" value="{{$material ->expiration}}" />
                                            <x-primary-button class="w-full text-center mt-2">Salvar</x-primary-button>
                                        </form>
                                        <x-danger-button @click="showEdit = false" class="w-full">Cancelar</x-danger-button>
                                </div>
                            </div>
                        </template>
            
          
                    </div>
              </td>
          </tbody>
        
              
                    @endforeach
                 </table>

                    <form action="{{ route('material.store') }}" method="POST">
                        @csrf
                        <x-text-input name="description" placeholder="Description" />
                        <x-text-input name="expiration" placeholder="Expiration" />
                        <x-primary-button>Salvar</x-primary-button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
