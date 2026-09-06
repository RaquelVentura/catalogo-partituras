<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Partituras - Full Panel</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f2f5; padding: 20px; color: #333; }
        .container { max-width: 1200px; margin: auto; }
        .card { background: white; padding: 15px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 25px; display: flex; flex-direction: column; }
        h2 { border-left: 5px solid #4A90E2; padding-left: 15px; color: #2c3e50; margin-top: 0; font-size: 1.4rem; }
        
        #search { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; }

        table { width: 100%; border-collapse: collapse; }
        th, td { border-bottom: 1px solid #eee; padding: 10px; text-align: left; font-size: 14px; }
        th { background-color: #4A90E2; color: white; position: sticky; top: 0; }
        tr:hover { background-color: #f8f9fa; }
        
        /* Contenedor de 3 columnas para tablas pequeñas */
        .grid-small-tables { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 25px; }
        .scroll-area { max-height: 300px; overflow-y: auto; border: 1px solid #eee; }

        .footer-count { background: #f9f9f9; padding: 8px 15px; font-weight: bold; font-size: 13px; border-top: 1px solid #ddd; color: #666; margin-top: auto; }
        
        .btn-file { text-decoration: none; padding: 4px 8px; border-radius: 4px; font-size: 10px; font-weight: bold; color: white; display: inline-block; margin-right: 2px; }
        .bg-pdf { background-color: #e74c3c; }
        .bg-audio { background-color: #2ecc71; }
        .badge-id { background: #eee; padding: 2px 5px; border-radius: 4px; font-family: monospace; font-size: 11px; }
    </style>
</head>
<body>

<div class="container">

    <div class="card">
        <h2>🎵 Listado Maestro de Partituras</h2>
        <input type="text" id="search" placeholder="Buscar en el repertorio...">
        <div class="scroll-area" style="max-height: 500px;">
            <table id="tablePartituras">
                <thead>
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Autor</th>
                        <th>Archivos</th>
                    </tr>
                </thead>
                <tbody id="bodyPartituras">
                    @foreach($partituras as $p)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>{{ $p->nombre }}</td>
                        <td><small>{{ $p->categoria->nombre ?? '---' }}</small></td>
                        <td>{{ $p->autor->nombre ?? 'Anónimo' }}</td>
                        <td>
                            @if($p->audio && $p->audio->url) <a href="{{ $p->audio->url }}" target="_blank" class="btn-file bg-audio">AUDIO</a> @endif
                            @if($p->documento && $p->documento->url) <a href="{{ $p->documento->url }}" target="_blank" class="btn-file bg-pdf">PDF</a> @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer-count">Total en Repertorio: {{ $partituras->count() }}</div>
    </div>

    <div class="grid-small-tables">
        
        <div class="card">
            <h2>👥 Autores</h2>
            <div class="scroll-area">
                <table>
                    <thead><tr><th>ID</th><th>Nombre</th></tr></thead>
                    <tbody>
                        @foreach($autores as $a)
                        <tr><td><span class="badge-id">{{ $a->idautor }}</span></td><td>{{ $a->nombre }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="footer-count">Total: {{ $autores->count() }}</div>
        </div>

        <div class="card">
            <h2>📂 Categorías</h2>
            <div class="scroll-area">
                <table>
                    <thead><tr><th>ID</th><th>Nombre</th></tr></thead>
                    <tbody>
                        @foreach($categorias as $c)
                        <tr><td><span class="badge-id">{{ $c->idcategoria }}</span></td><td>{{ $c->nombre }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="footer-count">Total: {{ $categorias->count() }}</div>
        </div>

        <div class="card">
            <h2>🔊 Audios</h2>
            <div class="scroll-area">
                <table>
                    <thead><tr><th>ID</th><th>Link</th></tr></thead>
                    <tbody>
                        @foreach($audios as $au)
                        <tr><td><span class="badge-id">{{ $au->idaudio }}</span></td><td><a href="{{ $au->url }}" target="_blank">Abrir</a></td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="footer-count">Total: {{ $audios->count() }}</div>
        </div>

    </div>

    <div class="card">
        <h2>📄 Documentos Registrados</h2>
        <div class="scroll-area">
            <table>
                <thead><tr><th>ID</th><th>URL del Documento</th></tr></thead>
                <tbody>
                    @foreach($documentos as $d)
                    <tr><td><span class="badge-id">{{ $d->iddocumento }}</span></td><td><small>{{ $d->url }}</small></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer-count">Total: {{ $documentos->count() }}</div>
    </div>

</div>

<script>
    document.getElementById('search').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#bodyPartituras tr');
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(filter) ? '' : 'none';
        });
    });
</script>

</body>
</html>