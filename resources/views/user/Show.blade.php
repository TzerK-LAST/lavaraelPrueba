@extends('layouts.app')

@section('content')
<style>
    .detail-container {
        max-width: 560px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .detail-header {
        margin-bottom: 24px;
    }

    .detail-header h1 {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0;
    }

    .detail-header p {
        color: #6b7280;
        margin: 4px 0 0;
        font-size: 14px;
    }

    .detail-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        padding: 32px;
    }

    .user-avatar {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: #4f46e5;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 28px;
        margin: 0 auto 24px;
    }

    .user-name-center {
        text-align: center;
        font-size: 20px;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 4px;
    }

    .user-email-center {
        text-align: center;
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 28px;
    }

    .detail-divider {
        border: none;
        border-top: 1px solid #f3f4f6;
        margin: 0 0 24px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .detail-row:last-of-type {
        border-bottom: none;
    }

    .detail-label {
        font-size: 13px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .detail-value {
        font-size: 14px;
        color: #1a1a2e;
        font-weight: 500;
    }

    .id-badge {
        background: #ede9fe;
        color: #6d28d9;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
    }

    .detail-actions {
        display: flex;
        gap: 12px;
        margin-top: 28px;
    }

    .btn-edit {
        background: #fefce8;
        color: #ca8a04;
        padding: 10px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: opacity 0.2s;
    }

    .btn-edit:hover {
        opacity: 0.8;
        color: #ca8a04;
    }

    .btn-back {
        background: #f3f4f6;
        color: #374151;
        padding: 10px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
    }

    .btn-back:hover {
        background: #e5e7eb;
        color: #374151;
    }
</style>

<div class="detail-container">
    <div class="detail-header">
        <h1>Detalles del Usuario</h1>
        <p>Información completa del usuario</p>
    </div>

    <div class="detail-card">

        {{-- Avatar --}}
        <div class="user-avatar">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <div class="user-name-center">{{ $user->name }}</div>
        <div class="user-email-center">{{ $user->email }}</div>

        <hr class="detail-divider">

        <div class="detail-row">
            <span class="detail-label">ID</span>
            <span class="id-badge">{{ $user->id }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Nombre</span>
            <span class="detail-value">{{ $user->name }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Correo</span>
            <span class="detail-value">{{ $user->email }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-label">Registrado</span>
            <span class="detail-value">{{ $user->created_at->format('d/m/Y') }}</span>
        </div>

        <div class="detail-actions">
            <a href="/user/{{ $user->id }}/edit" class="btn-edit">Editar</a>
            <a href="/user" class="btn-back">Volver</a>
        </div>

    </div>
</div>
@endsection