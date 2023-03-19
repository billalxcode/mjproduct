import $ from 'jquery';
import * as ClassicEditor from '@ckeditor/ckeditor5-build-classic'

$(() => {
    ClassicEditor
        .create( document.querySelector( '.content-editor' ), {

        })
        .catch( error => {
            console.error( error );
        } );
    
})