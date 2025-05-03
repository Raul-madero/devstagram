import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Drag and drop files here or click to upload',
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    dictRemoveFile: 'Remove',
    maxFiles: 2,

})

dropzone.on('sending', function (file, response) {
    console.log(file);
})

dropzone.on('success', function (file, response){
    console.log(file);
    console.log(response);
})

dropzone.on('error', function (file, response){
    console.log(file);
    console.log(response);
}
)
