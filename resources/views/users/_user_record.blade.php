<tr>
    <td>{{ $each->id }}</td>
    <td>{{ $each->name }}</td>
    <td>{{ $each->email }}</td>
    <td>{{ $each->credit }}</td>
    <td>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{ $each->id }}" 
         data-name="{{ $each->name }}" data-email="{{ $each->email }}" data-tourl="{{ route('users.update',$each->id) }}">
          编辑
        </button>
    </td>
</tr>