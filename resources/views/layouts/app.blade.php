@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="text-center py-3 border-top mt-5">
        <small class="text-muted">
            <strong>{{ config('app.company_name', 'Sistema de Gestión') }}</strong> v{{ config('app.version', '1.0.0') }}
        </small>
    </div>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
<script>
    $(document).ready(function() {
        // Animaciones de entrada suave
        $('body').fadeIn(300);
        
        // Confirmar eliminación
        $('form').on('submit', function(e) {
            if ($(this).find('button[type="submit"]').hasClass('btn-danger')) {
                if (!confirm('¿Está seguro de que desea eliminar este registro?')) {
                    e.preventDefault();
                }
            }
        });

        // Ocultar alertas después de 5 segundos
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
<style type="text/css">
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .navbar-white {
        background: linear-gradient(90deg, #ffffff 0%, #f8f9fa 100%);
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .sidebar-dark-primary {
        background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .card-header {
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px 12px 0 0;
        color: white;
        padding: 1.5rem;
        font-weight: 600;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        box-shadow: 0 6px 18px rgba(102, 126, 234, 0.6);
        transform: translateY(-2px);
    }

    .btn-sm {
        border-radius: 8px;
        padding: 0.4rem 0.8rem;
        font-size: 0.85rem;
        transition: all 0.2s ease;
    }

    .btn-info {
        background-color: #0ea5e9;
        border: none;
    }

    .btn-info:hover {
        background-color: #0284c7;
        transform: translateY(-1px);
    }

    .btn-warning {
        background-color: #f59e0b;
        border: none;
        color: white;
    }

    .btn-warning:hover {
        background-color: #d97706;
        transform: translateY(-1px);
    }

    .btn-danger {
        background-color: #ef4444;
        border: none;
    }

    .btn-danger:hover {
        background-color: #dc2626;
        transform: translateY(-1px);
    }

    .table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-hover tbody tr:hover {
        background-color: #f0f9ff;
    }

    .table-dark {
        background: linear-gradient(90deg, #1e293b 0%, #0f172a 100%);
        color: white;
    }

    .table th {
        font-weight: 600;
        padding: 1.25rem;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border: none;
    }

    .table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .form-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .alert {
        border: none;
        border-radius: 10px;
        padding: 1.25rem;
        border-left: 5px solid;
        animation: slideIn 0.3s ease;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        border-left-color: #10b981;
    }

    .alert-danger {
        background-color: #fee2e2;
        color: #991b1b;
        border-left-color: #ef4444;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        color: #1e293b;
        font-weight: 700;
        margin-bottom: 2rem;
        font-size: 2rem;
    }

    h2 {
        color: #1e293b;
        font-weight: 600;
        font-size: 1.5rem;
    }

    .badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .content-wrapper {
        background: transparent;
    }

    .main-sidebar {
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    }

    .brand-link {
        background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
        border-bottom: 2px solid rgba(255,255,255,0.1);
    }

    .nav-link {
        transition: all 0.2s ease;
    }

    .nav-link:hover {
        background-color: rgba(255,255,255,0.1);
        transform: translateX(5px);
    }

    .nav-link.active {
        background: rgba(255,255,255,0.15);
        border-left: 4px solid #fbbf24;
    }

    .ml-auto {
        margin-left: auto !important;
    }

</style>
@endpush
