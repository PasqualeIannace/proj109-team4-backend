@extends('layouts.admin')

@section('content')

<h2 class="text-center">Modifica il piatto</h2>

<div class="container-sm mt-4">
    <div class="row">
        <form action="{{ route('admin.foods.update' , $editFood) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label text-white">Nome Piatto</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') ?? $editFood->name}} ">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label text-white">Ingredienti</label>
                <input type="text" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                    name="ingredients" value="{{ old('ingredients') ?? $editFood->ingredients}} ">
                @error('ingredients')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="visible" class="form-label text-white">Disponibile</label>
                <input type="text" class="form-control @error('visible') is-invalid @enderror" id="visible"
                    name="visible" value="{{ old('visible') ?? $editFood->visible}} ">
                @error('visible')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="price" class="form-label text-white">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price') ?? $editFood->price}} ">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label text-white">Descrizione</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" value="{{ old('description') ?? $editFood->description}} ">
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="image" class="form-label text-white">Immagine</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                    value="{{ old('image') ?? $editFood->image}} ">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div>
                    <label for="tags" class="form-label text-white">Allergeni</label>
                </div>

                <input class="form-check-input" type="checkbox" name="tags[]" id="tags" value="">Nessuno
                @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="tags"
                        value="{{ old('tags') ?? $tag->id }}">
                    <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name}}</label>
                </div>
                @endforeach
                @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Modifica</button>
            </div>
        </form>
    </div>

</div>
@endsection