@extends('layouts.app')

@section('content')
<style>
    .users-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .users-header h1 {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0;
    }

    .users-header p {
        color: #6b7280;
        margin: 4px 0 0;
        font-size: 14px;
    }

    .btn-new {
        background: #4f46e5;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: background 0.2s;
    }

    .btn-new:hover {
        background: #4338ca;
        color: white;
    }

    .users-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table thead {
        background: #f8f9ff;
    }

    .users-table thead th {
        padding: 14px 20px;
        text-align: left;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6b7280;
        border-bottom: 1px solid #e5e7eb;
    }

    .users-table tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.15s;
    }

    .users-table tbody tr:hover {
        background: #fafafa;
    }

    .users-table tbody tr:last-child {
        border-bottom: none;
    }

    .users-table td {
        padding: 14px 20px;
        font-size: 14px;
        color: #374151;
    }

    .id-badge {
        background: #ede9fe;
        color: #6d28d9;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #4f46e5;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
    }

    .email {
        color: #6b7280;
        font-size: 13px;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .action-btn:hover {
        opacity: 0.8;
    }

    .details {
        background: #eff6ff;
        color: #2563eb;
    }

    .edit {
        background: #fefce8;
        color: #ca8a04;
    }

    .delete {
        background: #fef2f2;
        color: #dc2626;
    }
</style>

<div class="users-container">
    <div class="users-header">
        <div>
            <h1>Gestión de Usuarios</h1>
            <p>Administra todos los usuarios del sistema</p>
        </div>
        <a href="/user/create" class="btn-new">Nuevo Usuario</a>
    </div>

    <div class="users-card">
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><span class="id-badge">{{ $user->id }}</span></td>
                    <td>
                        <div class="user-info">
                            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                            {{ $user->name }}
                        </div>
                    </td>
                    <td><span class="email">{{ $user->email }}</span></td>
                    <td>
                        <div class="actions">
                            <a href="/user/{{ $user->id }}" class="action-btn details">Ver</a>
                            <a href="/user/{{ $user->id }}/edit" class="action-btn edit">Editar</a>
                            <form action="/user/{{ $user->id }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete"
                                    onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection