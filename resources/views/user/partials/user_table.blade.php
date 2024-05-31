@foreach($users as $user)
    <tr>
        <td>{{ $user->email }}</td>
        <td>{{ ucfirst($user->user_role) }}</td>
        <td>{{ $user->mobile_no }}</td>
        @if(!empty($user->country->name))
            <td>{{ ucfirst($user->country->name) }}</td>
        @else
            <td>Country Not Found</td>
        @endif
        <td>{{ ucfirst($user->package_name) }}</td>
        <td>{{ $user->package_price }}</td>
        <td>{{ $user->passport_one_img }}</td>
        <td>{{ $user->passport_two_img }}</td>
        <td>{{ $user->amount }}</td>
        <td>{{ $user->amount_type }}</td>
        <td>
            <a href="{{ route('user.edit', ['user_id' => $user->id]) }}" class="btn btn-primary">Edit</a>
            <form method="POST" id="delete" action="{{ route('user.destroy', $user->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
