import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Drag and drop files here or click to upload',
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    dictRemoveFile: 'Remove',
    maxFiles: 2,

    init: function () {
        if (document.querySelector('[name="image"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="image"]').value;
            console.log(imagenPublicada.name);
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success');
            imagenPublicada.previewElement.classList.add('dz-complete');
        }
    }
})

dropzone.on('success', function (file, response){
    document.querySelector('[name="image"]').value = response.imagen;
})

dropzone.on('error', function (file, response){
    console.log(file);
    console.log(response);
}
)
