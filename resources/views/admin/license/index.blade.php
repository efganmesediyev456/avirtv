@extends("admin.layout")
@section('title', 'License')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">License table</h6>
            <a href="{{ route('license.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>License</th>
                        <th>User</th>
                        <th>Created by</th>
                        <th>Is active</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>License</th>
                        <th>User</th>
                        <th>Created by</th>
                        <th>Is active</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($licenses as $license)
                        <tr>
                            <td>{{ $license->id }}</td>
                            <td>{{ $license->license }}</td>
                            <td>
                                @if($license->user_id !=0)
                                {{$license->user->name}}
                                @endif
                            </td>
                            <td>
                                {{$license->created_by}}
                            </td>
                            <td>
                                @if($license->is_active)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                @if($license->status)
                                    Unavailable
                                @else
                                    Available
                                @endif
                            </td>
                            <td>{{ $license->created_at }}</td>
                            <td>{{ $license->updated_at }}</td>
                            <td>

                                <form id="delete-form" action="{{ route('license.destroy', $license->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('license.show',$license->id)}}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
