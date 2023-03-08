import $ from 'jquery';
import * as select2 from 'select2';
import * as ClassicEditor from '@ckeditor/ckeditor5-build-classic'

select2($)

$(() => {
    $('#category_input').select2()
    ClassicEditor
        .create( document.querySelector( '.content-editor' ), {

        })
        .catch( error => {
            console.error( error );
        } );
    
})