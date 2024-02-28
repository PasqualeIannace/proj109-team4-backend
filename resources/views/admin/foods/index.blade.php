@extends('layouts.admin')

@section('content')
<div class="container-sm d-flex flex-wrap p-5">
    @foreach ($foods as $food)
    <div class="mybg bg-opacity-50 text-light flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front d-flex flex-column align-items-center">
                <div class="card-title h-10">
                    <h3><em class="grey">{{ $food->name }}</em></h3>
                </div>
                <div class="myImg">
                    @if ($food->image)
                    @if (filter_var($food->image, FILTER_VALIDATE_URL))
                    <img src="{{ $food->image }}" class="w-100" alt="">
                    @else
                    <img src="{{ asset('storage/' . $food->image) }}" class="w-100" alt="">
                    @endif
                    @else
                    <p>No image available</p>
                    @endif
                </div>
            </div>
            <div class="flip-card-back d-flex flex-column justify-content-center align-items-center">
                <p> {{ $food->ingredients }}</p>
                <p> {{ $food->description }}</p>
                <p>€ {{ $food->price }}</p>
                {{-- <p> {{ $food->visible }}</p> --}}
                <div>
                    <a href="{{ route('admin.foods.edit', $food->id) }}" class="btn btn-secondary"><i
                            class="fa-solid fa-pen-to-square fa-xl"></i></a>
                    <a href="{{ route('admin.foods.show', $food->id) }}" class="btn btn-secondary">Show Details</a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal{{ $food->id }}">
                        <i class="fa-solid fa-trash-can fa-xl"></i>
                    </button>
                </div>

            </div>
        </div>
        <div class="card-body">

        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="confirmDeleteModal{{ $food->id }}" tabindex="-1" role="dialog"
        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Conferma Eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questo elemento?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection