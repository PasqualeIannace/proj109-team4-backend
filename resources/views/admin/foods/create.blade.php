@extends('layouts.admin')

@section('content')

<h1 class="text-center mt-3">Nuovo piatto</h2>

    <div class="container-fluid mt-4">
        <div class="row">
            <form action="{{ route('admin.foods.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-white">Nome Piatto</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name')}} ">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ingredients" class="form-label text-white">Ingredienti</label>
                    <input type="text" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                        name="ingredients" value="{{ old('ingredients')}} ">
                    @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="visible" class="form-label text-white">Disponibile</label>
                    <input type="text" class="form-control @error('visible') is-invalid @enderror" id="visible"
                        name="visible" value="{{ old('visible')}} ">
                    @error('visible')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="price" class="form-label text-white">Prezzo</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                        value="{{ old('price')}} ">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>




                <div class="mb-3">
                    <label for="description" class="form-label text-white">Descrizione</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" value="{{ old('description')}} ">
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label text-white">Immagine</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        value="{{ old('image')}} ">
                    @error('image')
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