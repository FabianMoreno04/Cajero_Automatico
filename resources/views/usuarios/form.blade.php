<div class="mb-3">
    <label class="form-label">
        Código <span class="text-danger">*</span>
    </label>
    <input type="text"
           name="codigo"
           class="form-control @error('codigo') is-invalid @enderror"
           value="{{ old('codigo', $usuario->codigo ?? '') }}"
           {{ isset($usuario) ? 'readonly' : '' }}
           required>

    @error('codigo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Nombre <span class="text-danger">*</span>
    </label>
    <input type="text"
           name="nombre"
           class="form-control @error('nombre') is-invalid @enderror"
           value="{{ old('nombre', $usuario->nombre ?? '') }}"
           required>

    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Apellido <span class="text-danger">*</span>
    </label>
    <input type="text"
           name="apellido"
           class="form-control @error('apellido') is-invalid @enderror"
           value="{{ old('apellido', $usuario->apellido ?? '') }}"
           required>

    @error('apellido')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">
        Saldo Bancario <span class="text-danger">*</span>
    </label>
    <input type="number"
           name="saldo_bancario"
           class="form-control @error('saldo_bancario') is-invalid @enderror"
           step="0.01"
           min="0"
           value="{{ old('saldo_bancario', $usuario->saldo_bancario ?? 0) }}"
           required>

    @error('saldo_bancario')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
