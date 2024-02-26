@extends('layouts.admin')

@section('content')

<h1 class="text-center mt-3">Nuovo piatto</h2>

    <div class="container-sm mt-4">
        <div class="row">
            <form action="{{ route('admin.foods.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome Piatto</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name')}} ">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredienti</label>
                    <input type="text" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                        name="ingredients" value="{{ old('ingredients')}} ">
                    @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="visible" class="form-label">Disponibile</label>
                    <input type="text" class="form-control @error('visible') is-invalid @enderror" id="visible"
                        name="visible" value="{{ old('visible')}} ">
                    @error('visible')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                        value="{{ old('price')}} ">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>




                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" value="{{ old('description')}} ">
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        value="{{ old('image')}} ">
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
                        <input class="form-check-input" type="checkbox" name="tags[]" id="tags" value="{{ $tag->id }}">
                        <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name}}</label>
                    </div>
                    @endforeach
                    @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Inserisci Piatto</button>
                </div>
            </form>
        </div>
    </div>
    @endsection