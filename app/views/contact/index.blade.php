@section ('content')
<div class="content">
	<div class="container">
		<div class="box-content">
			<h2 class="title">Contact Us</h2>
			<div>
				<form action="{{ URL::to('contact') }}" method="post" id="contact_form">
					<label>Your name <span class="required_field">*</span></label><br />
					<input type="input" name="contact_name" style="width: 300px;" required>
					<br />
					<label>Your email <span class="required_field">*</span></label><br />
					<input type="input" name="contact_email" style="width: 300px;" required>
					<br />
					<label>Subject <span class="required_field">*</span></label><br />
					<input type="input" name="contact_subject" style="width: 450px;" required>
					<br />
					<label>Body <span class="required_field">*</span></label><br />
					<textarea rows="8" style="width: 450px;" name="contact_message" required></textarea>
					<br />
					<br />
					<input type="submit" value="Send">
				</form>
			</div>
		</div>
	</div>
</div>
@stop