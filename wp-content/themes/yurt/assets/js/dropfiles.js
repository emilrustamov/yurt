// Form 

var inputs = document.querySelectorAll('.inputfile');

Array.prototype.forEach.call(inputs, function (input) {

    input.addEventListener('focus', function () { input.classList.add('has-focus'); });

    input.addEventListener('blur', function () { input.classList.remove('has-focus'); });

    var label = input.nextElementSibling,

        labelVal = label.innerHTML;

 

    input.addEventListener('change', function (e) {

        var fileName = '';

        if (this.files && this.files.length > 1) {

            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);

        } else {

            fileName = e.target.value.split('\\').pop();

        }

 

        if (fileName) {

            label.querySelector('.draglabel').innerHTML = fileName;

        } else {

            label.innerHTML = labelVal;

        }

    });

});

 
// Drag drop function

// Portfolio

var fileDropZone = document.getElementById('file-drop-zone');

fileDropZone.addEventListener('dragover', function(e) {

    e.preventDefault();

    e.stopPropagation();

    fileDropZone.classList.add('dragover');

});

 

fileDropZone.addEventListener('dragleave', function(e) {

    e.preventDefault();

    e.stopPropagation();

    fileDropZone.classList.remove('dragover');

});

 

fileDropZone.addEventListener('drop', function(e) {

    e.preventDefault();

    e.stopPropagation();

    fileDropZone.classList.remove('dragover');

   

    var files = e.dataTransfer.files;

    var input = document.getElementById('file');

    input.files = files;

 

    var event = new Event('change');

    input.dispatchEvent(event);

});

// Dop files

var fileDropZoneSnd = document.getElementById('file-drop-zone-scnd');

fileDropZoneSnd.addEventListener('dragover', function(e) {

    e.preventDefault();

    e.stopPropagation();

    fileDropZone.classList.add('dragover');

});

 

fileDropZoneSnd.addEventListener('dragleave', function(e) {

    e.preventDefault();

    e.stopPropagation();

    fileDropZone.classList.remove('dragover');

});

 

fileDropZoneSnd.addEventListener('drop', function(e) {

    e.preventDefault();

    e.stopPropagation();

    fileDropZone.classList.remove('dragover');

   

    var files = e.dataTransfer.files;

    var input = document.getElementById('file-v');

    input.files = files;

 

    var event = new Event('change');

    input.dispatchEvent(event);

});
