<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" id="nombre"
           value="{{ old('nombre', $medicamento->nombre ?? '') }}"
           class="form-control @error('nombre') is-invalid @enderror">
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" id="descripcion" rows="3"
              class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $medicamento->descripcion ?? '') }}</textarea>
    @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" name="precio" id="precio"
           value="{{ old('precio', $medicamento->precio ?? '') }}"
           class="form-control @error('precio') is-invalid @enderror">
    @error('precio')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" id="stock"
           value="{{ old('stock', $medicamento->stock ?? '') }}"
           class="form-control @error('stock') is-invalid @enderror">
    @error('stock')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="laboratorio" class="form-label">Laboratorio</label>
    <input type="text" name="laboratorio" id="laboratorio"
           value="{{ old('laboratorio', $medicamento->laboratorio ?? '') }}"
           class="form-control @error('laboratorio') is-invalid @enderror">
    @error('laboratorio')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="fecha_caducidad" class="form-label">Fecha de caducidad</label>
    <input type="date" name="fecha_caducidad" id="fecha_caducidad"
           value="{{ old('fecha_caducidad', $medicamento->fecha_caducidad ?? '') }}"
           class="form-control @error('fecha_caducidad') is-invalid @enderror">
    @error('fecha_caducidad')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>