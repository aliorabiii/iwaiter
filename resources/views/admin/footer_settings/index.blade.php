<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>About Text</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($footerSettings as $footer)
        <tr>
            <td>{{ $footer->id }}</td>
            <td>
                @if($footer->logo)
                    <img src="{{ asset('storage/'.$footer->logo) }}" width="80">
                @endif
            </td>
            <td>{{ $footer->about_text }}</td>
            <td>
                <a href="{{ route('admin.footer.edit') }}" class="btn btn-primary btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
