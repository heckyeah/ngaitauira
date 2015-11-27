@extends('admin_master')

@section('main_content')
	<div id="module">
		<div class="container_full" id="event_container">
			<div class="full">
				<a href="/page/staff/" class="create-button">View Staff Page</a>
			</div>
			<table>
				<tr>
					<td><p>Photo</p></td>
					<td><p>Name &amp; Title</p></td> 
					<td><p>Modify</p></td>
				</tr>
  
				@foreach ($events as $staff)
				<tr>
					<td class="staff-td">
						<div class="thumb">
							<img src="/img/site/staff/{{ $staff->image }}" alt="">
						</div>
					</td>
					<td>
						{{ $staff->title }}
						<p>
							{{ $staff->name}}
						</p>
					</td>
					<td>
						<a href="/admin/staff/{{ $staff->slug }}/edit" class="edit">Edit</a>
					</td>
				</tr>				
				@endforeach
			</table>
		</div>
	</div>

<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/accordian.js"></script>
<script src="/js/modal.js"></script>
@endsection