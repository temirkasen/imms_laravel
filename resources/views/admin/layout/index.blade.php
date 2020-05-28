@extends('layout.layout')

@push('nav_bar')
    <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle @if(isset($have_more) && $have_more) text-success @endif" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Questionarys @if(isset($have_more) && $have_more) <div class="badge badge-light">{{$have_more}}</div> @endif
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item @if(isset($have_more) && $have_more)bg-success @endif" href="{{ route('customer.questionary.active') }}">Active @if(isset($have_more) && $have_more) <span class="badge badge-light">{{$have_more}}</span> @endif</a>
            <a class="dropdown-item disabled" href="{{ url('/questionary/answered') }}" >Answered</a>
        </div>
    </li>
@endpush
