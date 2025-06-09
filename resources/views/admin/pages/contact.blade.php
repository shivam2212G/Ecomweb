@extends('admin.layout.master')
@section('title','Contact')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-dark text-white rounded shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-white">Contact Messages</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-dark table-hover table-bordered align-middle mb-0">
                <thead class="table-primary text-center">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr class="text-center">
                        <td>{{ $contact->contact_name }}</td>
                        <td>{{ $contact->contact_email }}</td>
                        <td>{{ $contact->contact_subject }}</td>
                        <td>{{ $contact->contact_message }}</td>
                        <td>
                            <a href="{{ route('admin.contact.delete', ['id' => $contact->contact_id]) }}"
                               onclick="return confirm('Are you sure you want to delete this message?')">
                                <button class="btn btn-outline-danger btn-sm"
                                        style="font-weight: bold; transition: transform 0.3s;"
                                        onmouseover="this.style.transform='scale(1.05)'"
                                        onmouseout="this.style.transform='scale(1)'">
                                    🗑️ Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    @if($contacts->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">No contact messages found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
