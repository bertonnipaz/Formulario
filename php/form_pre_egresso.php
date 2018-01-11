<title>Form Pré-Egresso</title>
<!-- <div class="ui grid container"> -->
<div class="row">
	<div class="column">
		<form class="ui form">
			<div class="field">
				<label>First Name</label>
				<input type="text" name="first-name" placeholder="First Name">
			</div>
			<div class="field">
				<label>Last Name</label>
				<input type="text" name="last-name" placeholder="Last Name">
			</div>
			<div class="field required">
				<label>Multiple</label>
				<div class="ui fluid multiple search selection dropdown">
					<input name="tags" type="hidden">
					<i class="dropdown icon"></i>
					<div class="default text">Skills</div>
					<div class="menu">
						<div class="item" data-value="angular">Angular</div>
						<div class="item" data-value="css">CSS</div>
						<div class="item" data-value="design">Graphic Design</div>
						<div class="item" data-value="ember">Ember</div>
						<div class="item" data-value="html">HTML</div>
						<div class="item" data-value="ia">Information Architecture</div>
						<div class="item" data-value="javascript">Javascript</div>
						<div class="item" data-value="mech">Mechanical Engineering</div>
						<div class="item" data-value="meteor">Meteor</div>
						<div class="item" data-value="node">NodeJS</div>
						<div class="item" data-value="plumbing">Plumbing</div>
						<div class="item" data-value="python">Python</div>
						<div class="item" data-value="rails">Rails</div>
						<div class="item" data-value="react">React</div>
						<div class="item" data-value="repair">Kitchen Repair</div>
						<div class="item" data-value="ruby">Ruby</div>
						<div class="item" data-value="ui">UI Design</div>
						<div class="item" data-value="ux">User Experience</div>
					</div>
				</div>
			</div>
			<div class="field">
				<div class="ui checkbox">
					<input type="checkbox" tabindex="0" class="hidden">
					<label>I agree to the Terms and Conditions</label>
				</div>
			</div>
			<button class="ui button" type="submit">Submit</button>
		</form>
	</div>
</div>
<div class="row">
	<div class="column"></div>
</div>
<!-- </div> -->