@extends('layouts.master')

{{-- Web site Title --}}
@section('title', __('site.leaderboard'))

{{-- Content Header --}}
@section('header', __('site.leaderboard'))

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li class="active">
        <i class="fa fa-dashboard"></i> {{ __('site.leaderboard') }}
    </li>
@endsection

@section('content')

    <table id="ranking" class="table table-hover">
        <thead>
        <tr>
            <th class="col-md-1">#</th>
            <th class="col-md-6">Jogador</th>
            <th class="col-md-3">Nível</th>
            <th class="col-md-2">Pontos</th>
        </tr>
        </thead>

        @foreach($usersInRanking as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('profiles.show', $user['username']) }}">{{ $user['name'] }}</a></td>
                <td>{{ $user['level'] }}</td>
                <td>{{ $user['experience'] }}</td>
            </tr>
        @endforeach

        <tfoot>
        <tr>
            <th class="col-md-1">#</th>
            <th class="col-md-6">Jogador</th>
            <th class="col-md-3">Nível</th>
            <th class="col-md-2">Pontos</th>
        </tr>
        </tfoot>
    </table>

@endsection
