$(function() {
    $('input[name="birthdate"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
       // var years = moment().diff(start, 'years');
        //alert("You are " + years + " years old.");
    });
});



function add_fields1() {
   
    var objTo = document.getElementById('first')
    var divtest = document.createElement("div");
    divtest.innerHTML = '<input type="text" class="form-control" name="first[]">';
    
    objTo.appendChild(divtest)
}
function add_fields2() {
   
    var objTo = document.getElementById('second')
    var divtest = document.createElement("div");
    divtest.innerHTML = '<input type="text" class="form-control" name="second[]">';
    
    objTo.appendChild(divtest)
}
function add_fields3() {
   
    var objTo = document.getElementById('third')
    var divtest = document.createElement("div");
    divtest.innerHTML = '<input type="text" class="form-control" name="third[]">';
    
    objTo.appendChild(divtest)
}
function add_fieldshiq() {
   
    var objTo = document.getElementById('hiq')
    var divtest = document.createElement("div");
    divtest.innerHTML = '<input type="text" class="form-control" name="hiqpnt[]">';
    
    objTo.appendChild(divtest)
}