@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 560px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .form-header {
        margin-bottom: 24px;
    }

    .form-header h1 {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0;
    }

    .form-header p {
        color: #6b7280;
        margin: 4px 0 0;
        font-size: 14px;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        padding: 32px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
    }

    .form-group input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-size: 14px;
        color: #1a1a2e;
        outline: none;
        transition: border 0.2s;
        box-sizing: border-box;
    }

    .form-group input:focus {
        border-color: #4f46e5;
    }

    .form-group .error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 4px;
    }

    .user-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #4f46e5;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 22px;
        margin-bottom: 24px;
    }

    .form-divider {
        border: none;
        border-top: 1px solid #f3f4f6;
        margin: 24px 0;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 28px;
    }

    .btn-save {
        background: #4f46e5;
        color: white;
        padding: 10px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-save:hover {
        background: #4338ca;
    }

    .btn-cancel {
        background: #f3f4f6;
        color: #374151;
        padding: 10px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
        color: #374151;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h1>Editar Usuario</h1>
        <p>Modifica los datos del usuario</p>
    </div>

    <div class="form-card">

        {{-- Avatar con inicial --}}
        <div class="user-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <form action="/user/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Ej: Juan Pérez">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Ej: juan@correo.com">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <hr class="form-divider">

            <div class="form-group">
                <label>Nueva contraseña <span style="color:#9ca3af;font-weight:400">(dejar vacío para no cambiar)</span></label>
                <input type="password" name="password" placeholder="Mínimo 8 caracteres">
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">Guardar Cambios</button>
                <a href="/user" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection