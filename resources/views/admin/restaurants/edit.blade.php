@extends('layouts.admin')

@section('content')

<h2 class="text-center">Modifica il piatto</h2>

<div class="container-sm">
    <form action="{{ route('admin.restaurants.update' , $editFood->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6 offset-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome Piatto</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') ?? $editFood->name}} ">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3">
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredienti</label>
                    <input type="text" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                        name="ingredients" value="{{ old('ingredients') ?? $editFood->ingredients}} ">
                    @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3">
                <div class="mb-3">
                    <label for="visible" class="form-label">Disponibile</label>
                    <input type="text" class="form-control @error('visible') is-invalid @enderror" id="visible"
                        name="visible" value="{{ old('visible')?? $editFood->visible}} ">
                    @error('visible')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-6 offset-3">
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{ old('price')?? $editFood->price}} ">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" value="{{ old('description') ?? $editFood->description}} ">
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="mb-3">
                                <label for="image" class="form-label">Immagine</label>
                                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" value="{{ old('image') ?? $editFood->image}} ">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Modifica</button>
                        </div>
    </form>
</div>
</div>
@endsection