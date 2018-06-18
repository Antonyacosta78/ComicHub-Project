function showImage(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('uploadedImage');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
    //show img and activate jcrop
	var uploadedImage = document.getElementById("uploadedImage");
    uploadedImage.style.display = "block";
    uploadedImage.onload = function(){
        $('#uploadedImage').Jcrop({
            onChange: showCoords,
            onSelect: showCoords,
            setSelect:[ 0, 0, 50, 50 ],
            aspectRatio: 1/1
        });
    };
}
function showCoords(c){
    var domRect = $(".jcrop-holder")[0].getBoundingClientRect();
    $("#bw").val(domRect.width);
    $("#bh").val(domRect.height);
    
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#x2').val(c.x2);
    $('#y2').val(c.y2);
    $('#w').val(c.w);
    $('#h').val(c.h);
    
};