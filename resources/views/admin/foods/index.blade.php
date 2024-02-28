@extends('layouts.admin')

@section('content')
    <div class="container-sm d-flex flex-wrap p-5">
        @foreach ($foods as $food)
            <div class="bg-dark bg-opacity-50 text-light flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front d-flex flex-column justify-content-center align-items-center">
                        <div class="card-title">
                            <h3><em class="grey">{{ $food->name }}</em></h3>
                        </div>
                        <div class="myImg">
                            <img src="{{ asset('storage/' . $food->image) }}" class="w-100" alt="...">
                        </div>
                    </div>
                    <div class="flip-card-back d-flex flex-column justify-content-center align-items-center">
                        <p> {{ $food->ingredients }}</p>
                        <p> {{ $food->description }}</p>
                        <p>€ {{ $food->price }}</p>
                        {{-- <p> {{ $food->visible }}</p> --}}
                    </div>
                </div>
                <a href="{{ route('admin.foods.edit', $food->id) }}" class="btn btn-secondary">Edit</a>
                <a href="{{ route('admin.foods.show', $food->id) }}" class="btn btn-secondary">Show Details</a>
                {{-- PRIMO FORM --}}
                {{-- <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE') 
                    <input type="submit" value="&#9249;" class="btn btn-outline-danger" id="sure">
                </form> --}}
                {{-- SECONDO FORM CON CONFERMA --}}
                {{-- <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" class="d-inline-block" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="confirmDelete()" class="btn btn-outline-danger" id="sure">Elimina</button>
                </form> --}}

                {{-- TERZO FORM CON CONFERMA BRUTTO ma funziona--}}
                <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" class="d-inline-block" id="delete-form">
                    @csrf
                    @method('DELETE')
                    {{-- <button type="submit" onclick="confirmDelete()" class="btn btn-outline-danger" id="confirmDeleteBtn">Elimina</button> --}}
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" onclick="confirmDelete('{{ route('admin.foods.destroy', $food->id) }}')">
                        Elimina
                    </button>
                    {{-- <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo elemento?')" class="btn btn-outline-danger" id="sure">Elimina</button> --}}
                </form>

                {{-- MODAL --}}
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Conferma Eliminazione</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare questo elemento?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <button type="submit" id="confirmDeleteBtn" class="btn btn-danger">Elimina</button>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        @endforeach
    </div>
@endsection
