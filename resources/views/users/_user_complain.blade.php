<tr>
    <td>{{ $each->id }}</td>
    <td>{{ $each->uid }}</td>
    <td>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{ $each->id }}" 
         data-uid="{{ $each->uid }}" data-reason="{{ $each->reason }}" data-complain="{{ $each->complaint }}" 
         data-tourl="{{ route('users.deal_complain',$each->uid) }}">
          处理
        </button>
    </td>
</tr>