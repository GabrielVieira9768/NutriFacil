var loadFile = function(event, id) {
    var output = document.getElementById('output-' + id);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
    URL.revokeObjectURL(output.src)
    }
    document.getElementById('image-' + id).style.display = 'none';
};