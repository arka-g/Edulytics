
<select>

	@foreach ($assessments as $assessment)
	<option value="{{$assessment->assessment_type}}">{{$assessment->assessment_type}}</option>
	@endforeach
		<option>2</option>
	</select>