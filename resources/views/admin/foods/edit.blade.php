@extends('layouts.admin')

@section('content')
    <h1 class="text-center mt-4 mb-3">Modifica il piatto</h1>

    <div class="container-sm mt-4 bg-opacity-50 bg-black text-light">
        <div class="row g-3">
            <form action="{{ route('admin.foods.update', $editFood) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label text-white">Nome Piatto</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') ?? $editFood->name }} ">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" step="0.01" min="0.01"
                            class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            value="{{ old('price') ?? $editFood->price }} ">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="ingredients" class="form-label">Ingredienti</label>
                        <input type="text" class="form-control @error('ingredients') is-invalid @enderror"
                            id="ingredients" name="ingredients" value="{{ old('ingredients') ?? $editFood->ingredients }} ">
                        @error('ingredients')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="image" class="form-label text-white">Immagine scaricata</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- For Image URL -->
                        <div class="col-md-6">
                            <label for="image_url" class="form-label text-white">Image URL</label>
                            <input type="text" class="form-control @error('image_url') is-invalid @enderror"
                                id="image_url" name="image_url" value="{{ old('image_url', $food->image_url ?? '') }}">
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                            name="description" value="{{ old('description') ?? $editFood->description }}"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="visible" class="form-label">Disponibile</label>
                        <div class="form-check">
                            <input class="form-check-input @error('visible') is-invalid @enderror" id="visible"
                                name="visible" value="1" type="radio">
                            {{-- value="{{ old('visible') ?? $editFood->visible }} --}}
                            @error('visible')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="form-check-label" for="visible">
                                Si
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input @error('visible') is-invalid @enderror" id="visible"
                                name="visible" value="0" type="radio">
                            @error('visible')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="form-check-label" for="visible2">
                                No
                            </label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="logo_delivbeboo">
                            <img class="logo_deliveboo1 w-50" src="/logo.png" alt="logo">
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-4">
                    <div class="d-flex justify-content-center mb-3">
                        <label for="tags" class="form-label text-white">Allergeni</label>
                    </div>
                    <div class="d-flex justify-content-around">
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags[]"
                                    id="tag_{{ $tag->id }}" value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tag_{{ $tag->id }}"><span
                                        class="text-light">{{ $tag->name }}</span></label>
                            </div>
                        @endforeach
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="d-flex justify-content-center mt-5 mb-5">
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </div>
            </form>
        </div>

    </div>
@endsection
