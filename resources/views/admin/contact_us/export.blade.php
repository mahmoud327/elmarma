<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>email</th>


        </tr>
    </thead>
    <tbody>


        @foreach ($items as $item)
            <tr>


                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $item->email }}</td>


            </tr>
        @endforeach



    </tbody>
</table>
