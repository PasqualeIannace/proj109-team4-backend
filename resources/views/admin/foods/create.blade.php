@extends('layouts.admin')

@section('content')
{{-- <h1 class="text-center mt-4 mb-3">Nuovo piatto</h1> --}}

<div class="container-sm mt-5 bg-opacity-50 mybg text-light br-2em">
    <div class="row g-3">
        <h1 class="text-center">NUOVO PIATTO</h1>
        <form action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-md-6 pt-3">
                    <label for="name" class="form-label">Nome Piatto *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }} ">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 pt-3">
                    <label for="image" class="form-label text-white">Carica Immagine *</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 pt-3">
                    <label for="ingredients" class="form-label">Ingredienti *</label>
                    <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" rows="3"
                        name="ingredients" value="{{ old('ingredients') }} "></textarea>
                    @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 pt-3">
                    <label for="price" class="form-label">Prezzo *</label>
                    <div class="w-10em input-group">
                        <span class="input-group-text">€</span>
                        <input type="number" step="0.01" min="0.01"
                            class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            value="{{ old('price', $food->price ?? '') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 pt-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                        name="description">{{ old('description', $food->description ?? '') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Disponibilità --}}
                <div class="col-md-4 pt-3">
                    <label class="form-check-label" for="visible" name="visible">Disponibilità</label>
                    <div class="form-check form-switch pt-1">
                        <input type="hidden" name="visible" value="0" />
                        <input class="form-check-input my-switch" type="checkbox" id="visible" name="visible" value="1"
                            checked>
                    </div>
                </div>

                <div class="col-md-2 pt-3">
                    <div class="logo_delivbeboo">
                        <img class="logo_deliveboo1 w-50" src="/logo.png" alt="logo">
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-4">
                <div class="d-flex justify-content-center mb-3">
                    <label for="tags" class="form-label text-white fw-bold">Allergeni</label>
                </div>
                <div class="d-flex justify-content-around">
                    @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="tags[]" id="tag_{{ $tag->id }}"
                            value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag_{{ $tag->id }}"><span class="text-light">{{ $tag->name
                                }}</span></label>
                    </div>
                    @endforeach
                    @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="d-flex justify-content-center mt-5 mb-5">
                <button type="submit" class="my-btn mb-4">
                    <i class="fa-solid fa-plus"></i>
                    Inserisci Piatto</button>
            </div>
        </form>
    </div>

</div>
</div>
@endsection