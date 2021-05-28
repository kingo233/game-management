<tr>
    <td>{{ $each->id }}</td>
    <td>{{ $each->name }}</td>
    <td>{{ $each->email }}</td>
    <td>{{ $each->credit }}</td>
    <td>
        <a href="{{ route('users.show',$each) }}" class="btn btn-primary">编辑</a>
    </td>
</tr>