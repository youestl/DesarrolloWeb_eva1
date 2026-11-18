<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md border border-slate-200">
        <h1 class="text-2xl font-bold text-slate-800 mb-6 text-center">Crear Cuenta</h1>


        <form action="#" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nombre" class="block text-sm font-medium text-slate-700 mb-1">Nombre</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre completo"
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="correo" class="block text-sm font-medium text-slate-700 mb-1">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required placeholder="ejemplo@correo.com"
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="clave" class="block text-sm font-medium text-slate-700 mb-1">Clave</label>
                <input type="password" id="clave" name="clave" required minlength="6" placeholder="••••••••"
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-lg transition">
                Registrarse
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-600">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">Inicia sesión aquí</a>
        </p>
    </div>

</body>

</html>