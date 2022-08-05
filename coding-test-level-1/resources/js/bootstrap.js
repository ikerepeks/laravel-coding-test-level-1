import _ from 'lodash';
window._ = _;

import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function(e){
    if ($('#event-table').length > 0){
        $('#event-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/api/v1/events",
            dataSrc: 'json',
            columns: [
                { data: "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
                },
                { data: "name" },
                { data: "id", render: function(data,type,row,meta){
                    return "<a href='/event/"+ data +"/edit'><i class='las la-edit'></i></i></a><a data-bs-toggle='modal' data-bs-target='#deleteModal' data-id='"+ data +"'><i class='las la-trash'></i></a>";
                } }
            ]
        });

        var modalDelete = document.getElementById('deleteModal')
        modalDelete.addEventListener('show.bs.modal', function(event){
            var href = $(event.relatedTarget);
            var id = href.data('id');
            $('#deleteid').val(id);
});
    }
});
