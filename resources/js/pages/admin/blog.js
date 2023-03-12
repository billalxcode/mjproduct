import $ from 'jquery';
import select2 from 'select2'
import * as ClassicEditor from '@ckeditor/ckeditor5-build-classic'

select2($)

$(() => {
    $('#category_input').select2({
        placeholder: "Pilih kategori",
        tags: true,
        multiple: false,
        width: '100%',
        closeOnSelect: true,
        ajax: {
            url: BASE_URL + '/api/category',
            method: 'POST',
            data: function (params) {
                return {
                    'text': params.term,
                    'option': 'get'
                }
            },
            processResults: function (result) {
                return {
                    results: $.map(result.data, (dx) => {
                        return {
                            id: dx.id,
                            text: dx.name
                        }
                    })
                }
            }
        },
        createTag: function (params) {
            let term = $.trim(params.term)
            
            if (term == '') {
                return null
            }

            return {
                id: term,
                text: term,
                option: 'new'
            }
        },
        // insertTag: function (data, tag) {
        //     console.log({
        //         'data': data,
        //         'tags': tag
        //     })
        // }
    })
    ClassicEditor
        .create( document.querySelector( '.content-editor' ), {

        })
        .catch( error => {
            console.error( error );
        } );
    
})