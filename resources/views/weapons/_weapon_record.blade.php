<tr>
    <td>{{ $each->name }}</td>
    <td>{{ $each->attack }}</td>
    <td>{{ $each->defend }}</td>
    <td>{{ $each->critical_hit }}</td>
    <td>{{ $each->critical_damage }}</td>
    <td>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{ $each->id }}" 
         data-name="{{ $each->name }}" data-attack="{{ $each->attack }}" data-defend="{{ $each->defend }}" 
         data-critical_hit="{{ $each->critical_hit }}" data-critical_damage="{{ $each->critical_damage }}"  
         data-skill="{{ $each->skill }}" data-tourl="{{ route('weapons.update',$each->id) }}">
          编辑
        </button>
    </td>
</tr>