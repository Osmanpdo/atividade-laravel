<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Clientes</title>
    <!-- Styles / Scripts -->
    @if (app()->environment('local') && file_exists(public_path('hot')) || file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <main class="bg-white p-8 rounded-xl shadow-lg w-96">
        <h1 class="text-2xl font-semibold text-center mb-6">Editar Clientes</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="post" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="dt_nasc" class="block text-sm font-medium text-gray-700">Data de nascimento</label>
                <input type="date" name="dt_nasc" id="dt_nasc" value="{{ $cliente->dt_nasc }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="whatsapp" class="block text-sm font-medium text-gray-700">Whatsapp</label>
                <input type="text" name="whatsapp" id="whatsapp" value="{{ $cliente->whatsapp }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input type="text" name="cpf" id="cpf" value="{{ $cliente->cpf }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="text" name="foto" id="foto" value="{{ $cliente->foto }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div> 
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Atualizar</button>
        </form>
    </main>
</body>
</html>
