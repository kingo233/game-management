<tr>
    <td>{{ $each->id }}</td>
    <td>{{ $each->name }}</td>
    <td>{{ $each->email }}</td>
    <td>{{ $each->priority }}</td>
    <td>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{ $each->id }}" 
         data-name="{{ $each->name }}" data-email="{{ $each->email }}" data-priority="{{ $each->priority }}"
         data-tourl="{{ route('admins.modify',$each->id) }}">
          修改权限
        </button>
    </td>
</tr>