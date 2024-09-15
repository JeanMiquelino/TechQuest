<table id="ranking" class="table table-hover">
    <thead>
    <tr>
        <th class="col-md-1">#</th>
        <th class="col-md-6">Jogador</th>
        <th class="col-md-3">Nível</th>
        <th class="col-md-2">Pontos</th>
    </tr>
    </thead>
    @foreach($usersInRanking as $index => $userInRank)
        <tr>
            <td>{{ $index+1 }}</td>
            <td><a href="{{ route('profiles.show', $userInRank['username']) }}">{{ $userInRank['name'] }}</a></td>
            <td>{{ $userInRank['level'] }}</td>
            <td>{{ $userInRank['experience'] }}</td>
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
