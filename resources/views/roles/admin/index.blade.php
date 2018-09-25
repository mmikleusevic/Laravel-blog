@extends('layouts.layout')

@section('content')
<div class="col-sm-8">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Dashboard</div>

					<div class="panel-body">
						@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
						@endif
						<div class="alert alert-success">
							<p>You are logged in as Administrator</p>
						</div>
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th width="5">No.</th>
									<th>Member Name</th>
									<th>User</th>
									<th>Admin</th>
								</tr>
							</thead>
							<tbody>                    
								@foreach($users as $user)
								<tr>
									<form method="POST" action="/roles/admin">
										<td>{{ $user->name }}</td>                       
										<td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
										<td><input type="checkbox" {{ $user->hasRole('user') ? 'checked' : '' }} name="role_user"></td>                           
										<td><input type="checkbox" {{ $user->hasRole('admin') ? 'checked' : '' }} name="role_admin"></td>
										{{ csrf_field() }}
										<td><button type="submit">Assign Roles</button></td>
									</form>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection