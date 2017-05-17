var courses;
var selected = [];
var count = 0;
function getOptList(event) {
	event.preventDefault();
	var search = document.getElementById("userin").value;
	$.getJSON("exam.php?course=" + search, function(res){
		courses = res;
		$("#select").empty();
		$("#select").append('<option value="0">Select Courses</option>');
		$.each(res, function(i, field) {
			$("#select").append("<option value="+field['id']+">"+field["course"]+' '+field["section"]+"</option>");
		});
	});
}
function reset(event) {
	location.reload();
}
function deletebtn() {
	
}

$(document).ready(function(){

	$("#submitbtn").click(getOptList);
	$("#resetbtn").click(reset)
	$("#select").on('change', function(event){
		var index = document.getElementById("select").selectedIndex -1;
		var obj = courses[index];
		if (selected.indexOf(obj.id) == -1) {
			selected.push(obj.id)
			count ++;
			var DELETE = "<td> <input type='button' name='delete' value='X'>" + "</td>"
			var Course = "<td>" + obj.course + "</td>";
			var Section = "<td>" + obj.section + "</td>";
			var Instructor = "<td>" + obj.instructor + "</td>";
			var D = "<td>" + obj.date + "</td>";
			var Start = "<td>" + obj.start + "</td>";
			var End = "<td>" + obj.end + "</td>";
			var new_row = "<tr>" + DELETE + Course + Section + Instructor + D + Start + End +"</tr>";
			$('#table').append(new_row);
		}
	});
	$("#table").on("click", 'input[type="button"]', function(e){
		$(this).closest("tr").remove();
	});
})