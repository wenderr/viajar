@include('admin.includes.alerts')

<div class="form-group">
    <label> Nome:</label>
<input type="text" name="nome" class="form-control" placeholder="Nome:" value="{{ $plano->nome ?? '' }}">
</div>

<div class="form-group">
    <label> Preço:</label>
    <input type="text" name="preco" class="form-control" placeholder="Preço:" value="{{ $plano->preco ?? '' }}">
</div>

<div class="form-group">
    <label> Descrição:</label>
    <input type="text" class="form-control" name ="descricao" placeholder="Descrição:" value="{{ $plano->descricao ?? '' }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>