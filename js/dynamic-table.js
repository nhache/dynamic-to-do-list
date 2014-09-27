//define star rating and respective function
$low = '<span class="glyphicon glyphicon-star fill-star"></span><span class="glyphicon glyphicon-star-empty empty-star"></span><span class="glyphicon glyphicon-star-empty empty-star"></span>';
$average = '<span class="glyphicon glyphicon-star fill-star"></span><span class="glyphicon glyphicon-star fill-star"></span><span class="glyphicon glyphicon-star-empty empty-star"></span>';
$high = '<span class="glyphicon glyphicon-star fill-star"></span><span class="glyphicon glyphicon-star fill-star"></span><span class="glyphicon glyphicon-star fill-star"></span>';

function displayStars(){
	$('.urgency').each(function(){
		if($(this).text() === 'Low'){
			$(this).text('').html($low);
		}
		if($(this).text() === 'Average'){
			$(this).text('').html($average);;
		}
		if($(this).text() === 'High'){
			$(this).text('').html($high);;
		}
	});
}

//call star function
displayStars();


$('.submit').click(function(event){

	event.preventDefault();
	
	var $data = $('#input-form').serialize();

	$.ajax({
		url: 'save-get-data.php',
		type: 'post',
		data: $data,
		success: function(response){
			
			//clear input fields
			$('input').val('');
			$('option:selected').removeAttr('selected');
			
			//delete existing tbody
			$('tbody').remove();

			//create new tbody and insert task list from json
			$addition = '<tbody>';
			$data = $.parseJSON(response);
			$.each($data.tasks, function(i, task){
				$addition += '<tr id="' + task.id + '">';
					$addition += '<td>' + task.task + '</td>';
					$addition += '<td>' + task.dueDate + '</td>';
					$addition += '<td class="urgency">' + task.urgency + '</td>';
					$addition += '<td class="center"><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>';
				$addition += '</tr>'; 
			});
			$addition += '</tbody>';
			$('thead').after($addition);
			
			//stop button focus
			$('button').blur();

			//call star function
			displayStars();

		}//end success function
	});//end ajax call

});//end form submit event

//use 'on' to act on newly created elements
$('#task-table').on('click', 'a', function(event){
	
	event.preventDefault();
	
	$tablerow = $(this).closest('tr');

	$remove = $(this).closest('tr').attr('id');
	$data = { remove: $remove}
	$.ajax({
		url: 'remove-data.php',
		type: 'post',
		data: $data,
		success: function(){
			
			//remove selected row from table
			$tablerow.remove();
		
		}//end success
	});//end ajax call

});//end delete from table event
