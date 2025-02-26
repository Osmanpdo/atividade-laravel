<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100 text-gray-900 w-full">
    <main class="container mx-auto p-6 w-[78.125rem]">
        <h1 class="text-3xl font-bold text-center mb-6">Lista de Clientes</h1>
        <div class="flex flex-col w-full h-full">
            <div class="mb-4">
                <a class="my-4 bg-blue-600 hover:bg-blue-500 text-white p-2 rounded-md" href="{{ route('clientes.create') }}">Criar</a>
            </div>
            <table class="w-full border-collapse bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-blue-500 text-white text-left">
                        <th class="p-3">Nome</th>
                        <th class="p-3">Data de Nascimento</th>
                        <th class="p-3">Whatsapp</th>
                        <th class="p-3">CPF</th>
                        <th class="p-3">Foto</th>
                        <th class="p-3">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-3"><a href="">{{ $cliente->nome }}</a></td>
                        <td class="p-3">{{ $cliente->dt_nasc }}</td>
                        <td class="p-3"><a href="https://wa.me/{{ $cliente->whatsapp }}" target="_blank" class="text-blue-600 hover:underline">{{ $cliente->whatsapp }}</a></td>
                        <td class="p-3">{{ $cliente->cpf }}</td>
                        <td class="p-3">
                            @if($cliente->foto)
                                <img src="{{ $cliente->foto }}" alt="Foto de {{ $cliente->nome }}" class="w-12 h-12 object-cover rounded-full">
                            @else
                                <span class="text-gray-500">Sem foto</span>
                            @endif
                        </td>
                        <td class="p-3 flex"> 
                            <a class="text-blue-600 hover:underline pe-2" href="{{ route('clientes.edit', 1) }}">Editar</a>
                            <form class="text-blue-600 hover:underline" action="{{ route('clientes.destroy', 1) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="text-blue-600 hover:underline" type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>