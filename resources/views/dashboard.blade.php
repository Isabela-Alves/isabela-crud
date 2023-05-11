<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bem vindes a seu CRUD de sla do que vai ser') }}
        </h2>
    </x-slot>

    <style>
        table {
           
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .cursor-pointer {
            color: white;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full rounded-md">
                    <thead>
                        <tr class="text-center">
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                                modelo</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-800">
                                ano</th>
                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-800 text-center" colspan="3">
                                cor</th>

                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-800 text-center" colspan="3">
                                placa</th>
                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-800 text-center" colspan="3">
                                preco</th>
                        </tr>


                    </thead>
                    @foreach (Auth::user()->myMaterials as $material)
                    <tbody class="bg-gray-800" x-data="{showDelete:false, showEdit:false}">

                        <tr>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-white">{{$material ->modelo}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
                                <div class="text-sm leading-5 text-white">{{$material ->ano}}
                                </div>
                            </td>


                            <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
                                <div class="text-sm leading-5 text-white">{{$material ->cor}}
                                </div>
                            </td>


                            <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
                                <div class="text-sm leading-5 text-white">{{$material ->placa}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b text-white border-gray-200">
                                <div class="text-sm leading-5 text-white">{{$material ->preco}}
                                </div>
                            </td>

                            <td class="font-medium text-center whitespace-no-wrap border-b border-gray-200 ">
                                <div class="flex gap-2 flex-col">
                                    <div>
                                        <x-primary-button class="cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true">Deletar</x-primary-button>
                                    </div>
                                    <div>
                                        <x-primary-button class="cursor-pointer px-2 bg-blue-500 text-white" @click="showEdit = true">Editar</x-primary-button>
                                    </div>
                                </div>
                                <template x-if="showDelete">
                                    <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-600 bg-opacity-20 z-0">
                                        <div class="w-96 bg-gray-500 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 rounded-md">
                                            <h2 class="text-xl font-bold text-center">Você tem certeza disso?</h2>
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
                                            <form class="my-4" action="{{ route('material.update', $material) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-text-input name="modelo" placeholder="modelo" value="{{$material ->modelo}}" />
                                                <x-text-input name="ano" placeholder="ano" value="{{$material ->ano}}" />
                                                <x-text-input name="cor" placeholder="cor" value="{{$material ->cor}}" />
                                                <x-text-input name="placa" placeholder="placa" value="{{$material ->placa}}" />
                                                <x-text-input name="preco" placeholder="preco" value="{{$material ->preco}}" />

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
                <x-text-input name="modelo" placeholder="modelo" />
                <x-text-input name="ano" placeholder="ano" />
                <x-text-input name="cor" placeholder="cor" />
                <x-text-input name="placa" placeholder="placa" />
                <x-text-input name="preco" placeholder="preco" />
                <x-primary-button>Salvar</x-primary-button>
            </form>
        </div>
    </div>

    </div>
    </div>
</x-app-layout>