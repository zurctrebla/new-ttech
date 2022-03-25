<table class="table table-bordered">
    <thead>
        <th>Id</th>
        <th>uuid</th>
        <th>nome</th>
        <th>email</th>
        <th>senha</th>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->uuid }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
            </tr>
        @endforeach
    </tbody>

</table>
