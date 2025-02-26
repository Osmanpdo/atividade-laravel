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
<body class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-900">
    <main class="container mx-auto p-6 max-w-6xl">
        <h1 class="text-4xl font-bold text-center mb-8">Lista de Clientes</h1>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-6">
                <a class="inline-block bg-blue-600 hover:bg-blue-500 text-white py-2 px-4 rounded transition duration-200" href="{{ route('clientes.create') }}">Criar</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="px-4 py-3 text-left">Nome</th>
                            <th class="px-4 py-3 text-left">Data de Nascimento</th>
                            <th class="px-4 py-3 text-left">Whatsapp</th>
                            <th class="px-4 py-3 text-left">CPF</th>
                            <th class="px-4 py-3 text-left">Foto</th>
                            <th class="px-4 py-3 text-left">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr class="border-b hover:bg-gray-50 transition duration-150">
                            <td class="px-4 py-3">
                                <a class="text-blue-600 hover:underline" href="{{ route('clientes.show', $cliente->id) }}">{{ $cliente->nome }}</a>
                            </td>
                            <td class="px-4 py-3">{{ $cliente->dt_nasc }}</td>
                            <td class="px-4 py-3">
                                <a class="text-blue-600 hover:underline" href="https://wa.me/{{ $cliente->whatsapp }}" target="_blank">{{ $cliente->whatsapp }}</a>
                            </td>
                            <td class="px-4 py-3">{{ $cliente->cpf }}</td>
                            <td class="px-4 py-3">
                                @if($cliente->foto)
                                    <img src="{{ $cliente->foto }}" alt="Foto de {{ $cliente->nome }}" class="w-12 h-12 object-cover rounded-full">
                                @else
                                    <span class="text-gray-500">Sem foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 flex items-center space-x-2">
                                <a class="text-blue-600 hover:underline" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
