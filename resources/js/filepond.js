import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

window.FilePond = FilePond ;

FilePond.registerPlugin(FilePondPluginImagePreview);

const input = document.querySelector('.filepond');
FilePond.create(input, {
    server:{url:'/api/upload/product'}
    
} );
