@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Personen</h2>
                    <a href="{{ route('persons.create') }}" class="btn btn-primary">Nieuwe Persoon</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Naam</th>
                                    <th>Email</th>
                                    <th>Telefoonnummer</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($persons as $person)
                                    <tr>
                                        <td>{{ $person->id }}</td>
                                        <td>{{ $person->name }}</td>
                                        <td>{{ $person->email }}</td>
                                        <td>{{ $person->phone }}</td>
                                        <td>
                                            <a href="{{ route('persons.show', $person->id) }}" class="btn btn-sm btn-info">Details</a>
                                            <a href="{{ route('persons.edit', $person->id) }}" class="btn btn-sm btn-warning">Bewerken</a>
                                            <form action="{{ route('persons.destroy', $person->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Weet je zeker dat je deze persoon wilt verwijderen?')">Verwijderen</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Geen personen gevonden</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $persons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection