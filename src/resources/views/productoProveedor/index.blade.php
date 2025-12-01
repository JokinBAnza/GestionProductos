                                                        <table>
    <tr>
        <th>ID Producto</th>
        <th>Producto</th>
        <th>ID Proveedor</th>
        <th>Proveedor</th>
        <th>Acciones</th>
    </tr>
    @foreach($asignaciones as $item)
    <tr>
        <td>{{ $item->producto_id }}</td>
        <td>{{ $item->producto->nombre }}</td>
        <td>{{ $item->proveedor_id }}</td>
        <td>{{ $item->proveedor->nombre }}</td>
        <td>
            <a href="{{ route('producto_proveedors.edit', [$item->producto_id, $item->proveedor_id]) }}">Editar</a>
            <form action="{{ route('producto_proveedors.destroy', [$item->producto_id, $item->proveedor_id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro que quieres borrar esta relación?')">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ route('producto_proveedors.create') }}">Añadir nueva relación</a>
