 import details from './detailsRow.js';
 import {
     url,
     index,
     pdf
 } from '../index.js';
 import * as token from '../token.js';
 import * as alert from '../alert.js';
 import {
     validator
 } from '../validator.js';

 const modalUp = function (page, action) {
     let thisModal = `#${page}Modal`;
     let thisModalLabel = `#${page}ModalLabel`;
     let thisForm = `#${page}Form`;
     $(thisModal).modal('show');
     $(thisForm).trigger('reset').find('.checkValidate').removeAttr('class').addClass('checkValidate');
     validator.resetForm();
     if (action == 'new') {
         $(thisModalLabel).text('Create New ' + page);
         $(thisForm).find('button[type="submit"]').text('Save');
         $(thisForm).find('input[name="_method"]').val('post');
     } else if (action == 'update') {
         $(thisModalLabel).text('Edit data ' + page);
         $(thisForm).find('button[type="submit"]').text('Update');
         $(thisForm).find('input[name="_method"]').val('patch');
     } else if (action == 'out') {
         $(thisModalLabel).text('Book ' + page + ' out');
         $(thisForm).find('button[type="submit"]').text('Submit');
         $(thisForm).find('input[name="_method"]').val('patch');
     } else if (action == 'in') {
         $(thisModalLabel).text('Book ' + page + ' in');
         $(thisForm).find('button[type="submit"]').text('Submit');
         $(thisForm).find('input[name="_method"]').val('patch');
     }
 }
 const excelModal = function (target = null) {
     $('#excelModal').modal('show');
     $('#excelExport').attr('href', `${url}/export/${target}`);
     $('#excelImport').attr('action', `${url}/import/${target}`);
 }
 const table = {
     master: $('#users-table').DataTable({
         "language": {
             "paginate": {
                 "previous": "<i class='fas fa-angle-left' />",
                 "next": "<i class='fas fa-angle-right' />",
             },
             "search": ""
         },
         dom: 'Bfrtip',
         lengthMenu: [
             [10, 25, 50, -1],
             ['10', '25', '50', 'Show all']
         ],
         buttons: [{
                 text: '<i class="fas fa-plus"></i>',
                 className: 'new-user'
             }, {
                 text: '<i class="far fa-file-excel"></i>',
                 action: function (e, dt, node, config) {
                     excelModal('master');
                 }
             }, {
                 text: '<i class="far fa-file-pdf"></i>',
                 action: function (e, dt, node, config) {
                     location.href = pdf.master;
                 }
             },
             'pageLength'
         ],
         serverSide: true,
         processing: true,
         ajax: {
             url: index.master,
             headers: {
                 'Authorization': `Bearer ${token.api}`,
                 'Accept': 'application/json',
             },
             type: 'get',
         },
         columns: [{
                 class: "details-control",
                 orderable: false,
                 searchable: false,
                 data: null,
                 defaultContent: ""
             },
             {
                 data: 'first_name',
                 name: 'first_name'
             },
             {
                 data: 'last_name',
                 name: 'last_name'
             },
             {
                 data: 'email',
                 name: 'email'
             },
             {
                 data: 'action',
                 name: 'action',
                 searchable: false,
                 orderable: false
             }
         ],
         order: [
             [4, 'desc']
         ]
     }),
     book: $('#books-table').DataTable({
         "language": {
             "paginate": {
                 "previous": "<i class='fas fa-angle-left' />",
                 "next": "<i class='fas fa-angle-right' />",
             }
         },
         serverSide: true,
         processing: true,
         ajax: {
             url: index.book,
             headers: {
                 'Authorization': `Bearer ${token.api}`,
                 'Accept': 'application/json',
             },
             type: 'get',
         },
         dom: 'Bfrtip',
         lengthMenu: [
             [10, 25, 50, -1],
             ['10', '25', '50', 'Show all']
         ],
         buttons: [{
                 text: '<i class="fas fa-plus"></i>',
                 className: 'new-book'
             }, {
                 text: '<i class="far fa-file-excel"></i>',
                 action: function (e, dt, node, config) {
                     excelModal('book');
                 }
             }, {
                 text: '<i class="far fa-file-pdf"></i>',
                 action: function (e, dt, node, config) {
                     location.href = pdf.book;
                 }
             },
             'pageLength'
         ],
         columns: [{
                 class: "details-control",
                 orderable: false,
                 searchable: false,
                 data: null,
                 defaultContent: ""
             },
             {
                 data: 'title',
             },
             {
                 data: 'category',
             },
             {
                 data: 'available',
             },
             {
                 data: 'action',
                 name: 'action',
                 searchable: false,
                 orderable: false
             }
         ],
         order: [
             [2, 'desc']
         ],
     }),
     member: $('#members-table').DataTable({
         "language": {
             "paginate": {
                 "previous": "<i class='fas fa-angle-left' />",
                 "next": "<i class='fas fa-angle-right' />",
             }
         },
         serverSide: true,
         processing: true,
         ajax: {
             url: index.member,
             headers: {
                 'Authorization': `Bearer ${token.api}`,
                 'Accept': 'application/json',
             },
             type: 'get',
         },
         dom: 'Bfrtip',
         lengthMenu: [
             [10, 25, 50, -1],
             ['10', '25', '50', 'Show all']
         ],
         buttons: [{
                 text: '<i class="fas fa-plus"></i>',
                 className: 'new-member'
             }, {
                 text: '<i class="far fa-file-excel"></i>',
                 action: function (e, dt, node, config) {
                     excelModal('member');
                 }
             }, {
                 text: '<i class="far fa-file-pdf"></i>',
                 action: function (e, dt, node, config) {
                     location.href = pdf.member;
                 }
             },
             'pageLength'
         ],
         columns: [{
                 class: "details-control",
                 orderable: false,
                 searchable: false,
                 data: null,
                 defaultContent: ""
             },
             {
                 data: 'name',
             },
             {
                 data: 'contact',
             },
             {
                 data: 'status',
             },
             {
                 data: 'action',
                 name: 'action',
                 searchable: false,
                 orderable: false
             }
         ],
         order: [
             [2, 'desc']
         ],
     }),
     publisher: $('#publishers-table').DataTable({
         "language": {
             "paginate": {
                 "previous": "<i class='fas fa-angle-left' />",
                 "next": "<i class='fas fa-angle-right' />",
             }
         },

         serverSide: true,
         processing: true,
         ajax: {
             url: index.publisher,
             headers: {
                 'Authorization': `Bearer ${token.api}`,
                 'Accept': 'application/json',
             },
             type: 'get',
         },
         dom: 'Bfrtip',
         lengthMenu: [
             [10, 25, 50, -1],
             ['10', '25', '50', 'Show all']
         ],
         buttons: [{
                 text: '<i class="fas fa-plus"></i>',
                 className: 'new-publisher'
             }, {
                 text: '<i class="far fa-file-excel"></i>',
                 action: function (e, dt, node, config) {
                     excelModal('publisher');
                 }
             }, {
                 text: '<i class="far fa-file-pdf"></i>',
                 action: function (e, dt, node, config) {
                     location.href = pdf.publisher;
                 }
             },
             'pageLength'
         ],
         columns: [{
                 class: "details-control",
                 orderable: false,
                 searchable: false,
                 data: null,
                 defaultContent: ""
             },
             {
                 data: 'name',
             },
             {
                 data: 'contact',
             },
             {
                 data: 'action',
                 name: 'action',
                 searchable: false,
                 orderable: false
             }
         ],
         order: [
             [2, 'desc']
         ],
     }),
     booking: $('#bookings-table').DataTable({
         "language": {
             "paginate": {
                 "previous": "<i class='fas fa-angle-left' />",
                 "next": "<i class='fas fa-angle-right' />",
             }
         },

         serverSide: true,
         processing: true,
         ajax: {
             url: index.booking,
             headers: {
                 'Authorization': `Bearer ${token.api}`,
                 'Accept': 'application/json',
             },
             type: 'get',
         },
         dom: 'Bfrtip',
         lengthMenu: [
             [10, 25, 50, -1],
             ['10', '25', '50', 'Show all']
         ],
         buttons: [{
                 text: '<i class="fas fa-plus"></i>',
                 className: 'new-booking',
             }, {
                 text: '<i class="far fa-file-pdf"></i>',
                 action: function (e, dt, node, config) {
                     location.href = pdf.booking;
                 }
             },
             'pageLength'
         ],
         //  "search": {
         //      "search": "Fred"
         //  },
         columns: [{
                 class: "details-control",
                 orderable: false,
                 searchable: false,
                 data: null,
                 defaultContent: ""
             },
             {
                 data: 'code',
                 name: 'code'
             },
             {
                 data: 'title',
                 name: 'title',

             },
             {
                 data: 'member',
                 name: 'member',

             },
             {
                 data: 'end_date',
                 name: 'end_date'
             },
             {
                 data: 'late',
                 name: 'late'
             },
             {
                 data: 'decision',
                 name: 'decision',
                 searchable: false,
                 orderable: false,
             },
             {
                 data: 'action',
                 name: 'action',
                 searchable: false,
                 orderable: false
             }
         ],
         order: [
             [1, 'desc']
         ],
     }),
     guest: $('#guests-table').DataTable({
         "language": {
             "paginate": {
                 "previous": "<i class='fas fa-angle-left' />",
                 "next": "<i class='fas fa-angle-right' />",
             }
         },
         serverSide: true,
         processing: true,
         ajax: {
             url: index.guest,
             headers: {
                 'Authorization': `Bearer ${token.api}`,
                 'Accept': 'application/json',
             },
             type: 'get',
         },
         dom: 'Bfrtip',
         lengthMenu: [
             [10, 25, 50, -1],
             ['10', '25', '50', 'Show all']
         ],
         buttons: [{
                 text: '<i class="fas fa-plus"></i>',
                 className: 'new-guest'
             }, {
                 text: '<i class="far fa-file-pdf"></i>',
                 action: function (e, dt, node, config) {
                     location.href = pdf.guest;
                 }
             },
             'pageLength'
         ],
         columns: [{
                 data: 'idcard',
             },
             {
                 data: 'type',
             },
             {
                 data: 'name',
             },
             {
                 data: 'time',
                 searchable: false
             },
             {
                 data: 'action',
                 name: 'action',
                 searchable: false,
                 orderable: false
             }
         ],
         order: [
             [4, 'desc']
         ],
     }),
 };

 export {
     table
 };
