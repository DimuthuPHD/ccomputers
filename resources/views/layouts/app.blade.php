@extends('adminlte::page')
<style>
    .alert h5 {
        display: inline;
    }
</style>
@if (session('success'))
<x-adminlte-alert theme="success" dismissable>
    {{ session('success') }}
</x-adminlte-alert>
@endif

@if (session('error'))
<x-adminlte-alert theme="danger" dismissable>
    {{ session('error') }}
</x-adminlte-alert>
@endif

@if (session('warning'))
<x-adminlte-alert theme="warning" dismissable>
    {{ session('warning') }}
</x-adminlte-alert>
@endif

@if (session('info'))
<x-adminlte-alert theme="info" dismissable>
    {{ session('info') }}
</x-adminlte-alert>
@endif
@section('content')
    @yield('content')
@stop

@section('css')
    @yield('css')
@stop

@section('js')
    <script>
        function confirmAndSubmit(event, deleteUrl) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this item?')) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = '_token';
                hiddenField.value = csrfToken;

                var methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';

                form.appendChild(hiddenField);
                form.appendChild(methodField);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

    @yield('js')

@stop
