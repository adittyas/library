 import {
     index
 } from '../index.js';
 import * as token from '../token.js';
 import * as alert from '../alert.js';
 import teritory from './teritory.js';
 import details from './detailsRow.js';
 import {
     table
 } from './table.js';
 import {
     format
 } from './format.js';

 import {
     action
 } from '../action.js';

 import {
     validator
 } from '../validator.js';



 const modalUp = function (page, action) {
     validator;
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
         $(thisModalLabel).text('Output data book');
         $(thisForm).find('button[type="submit"]').text('Submit');
         $(thisForm).find('input[name="_method"]').val('post');
     } else if (action == 'in') {
         $(thisModalLabel).text('Input data book');
         $(thisForm).find('button[type="submit"]').text('Submit');
         $(thisForm).find('input[name="_method"]').val('post');
     }
 }
 const method = {
     book: function () {
         table.book;
         details('#books-table', table.book, format.book);

         $("#books-table").on('click', '.delete-book', function () {
             let id = $(this).data('id');
             let url = `${index.book}/${id}`;
             action.destroy(url, table.book);
         });

         $(".new-book").on('click', function (e) {
             e.preventDefault();
             modalUp('book', 'new');
             validator.resetForm();
             console.log(index.book);
             action.store('book', index.book, table.book);
         });

         $("#books-table").on('click', '.edit-book', function (e) {
             e.preventDefault();

             let id = $(this).data('id');
             $.ajax({
                 url: `${index.book}/${id}/edit`,
                 type: 'get',
                 success: function (data) {
                     $('#id_book').val(data.id);
                     $('#title_book').val(data.title);
                     $('#author_book').val(data.author);
                     $('#hal_book').val(data.hal);
                     $('#category_book').children().each(function () {
                         if ($(this).val() == data.category) {
                             $(this).prop('selected', true);
                         }
                     });
                     $('#publisher_book').children().each(function () {
                         if ($(this).val() == data.publisher_id) {
                             $(this).prop('selected', true);
                         }
                     });
                 },
                 error: function (data) {
                     alert.error(data);
                 }
             });
             modalUp('book', 'update');
             action.update('book', index.book, table.book);
         });

         $("#books-table").on('click', '.stock-in', function (e) {
             e.preventDefault();
             modalUp('bookIn', 'in');
             $('#book_id').val($(this).data('id'));

             action.store('bookIn', index.stock_in, table.book);
         });
         $("#books-table").on('click', '.edit-stockIn', function (e) {
             e.preventDefault();
             console.log('ada');
             let id = $(this).data('id');
             $.ajax({
                 url: `${index.stock_in}/${id}/edit`,
                 type: 'get',
                 success: function (data) {
                     console.log(data);
                     $('#id_bookIn').val(data.id);
                     $('#qty_bookIn').val(data.qty);
                     $('#info_bookIn').children().each(function () {
                         if ($(this).val() == data.info) {
                             $(this).prop('selected', true);
                         }
                     });
                 },
                 error: function (data) {
                     console.log(data);
                     alert.error(data);
                 }
             });
             modalUp('bookIn', 'update');
             action.update('bookIn', index.stock_in, table.book);
         });
         $("#books-table").on('click', '.edit-stockOut', function (e) {
             e.preventDefault();
             let id = $(this).data('id');
             $.ajax({
                 url: `${index.stock_out}/${id}/edit`,
                 type: 'get',
                 success: function (data) {
                     console.log(data);
                     $('#id_bookIn').val(data.id);
                     $('#qty_bookIn').val(data.qty);
                     $('#info_bookIn').children().each(function () {
                         if ($(this).val() == data.info) {
                             $(this).prop('selected', true);
                         }
                     });
                 },
                 error: function (data) {
                     console.log(data);
                     alert.error(data);
                 }
             });
             modalUp('bookIn', 'update');
             action.update('bookIn', index.stock_out, table.book);
         });
         $("#books-table").on('click', '.stock-out', function (e) {
             e.preventDefault();
             modalUp('bookIn', 'out');
             $('#book_id').val($(this).data('id'));
             console.log(index.stock_out);
             action.store('bookIn', index.stock_out, table.book);
         });
         $('#books-table').on('click', '.delete-stockIn', function (e) {
             e.preventDefault();
             let id = $(this).data('id');
             let url = `${index.stock_in}/${id}`;
             action.destroy(url, table.book);
         });
         $('#books-table').on('click', '.delete-stockOut', function (e) {
             e.preventDefault();
             let id = $(this).data('id');
             let url = `${index.stock_out}/${id}`;
             action.destroy(url, table.book);
         });


     },
     master: function () {
         table.master;
         teritory();
         details('#users-table', table.master, format.master);

         $("#users-table").on('click', '.delete-user', function () {
             let id = $(this).data('id');
             let url = `${index.master}/${id}`;
             action.destroy(url, table.master);
         });

         $("#users-table").on('click', '.edit-user', function (e) {
             e.preventDefault();
             validator.resetForm();
             modalUp('user', 'update');
             $('#emailGroup').hide();
             let id = $(this).data('id');
             $.ajax({
                 url: `${index.master}/${id}/edit`,
                 type: 'get',
                 headers: {
                     'Authorization': `Bearer ${token.api}`,
                     'Accept': 'application/json',
                 },
                 success: function (data) {
                     let addressing = {
                         province: data.profile.province,
                         district: data.profile.district,
                         sub_district: data.profile.sub_district,
                         urban_village: data.profile.urban_village,
                         postal_code: data.profile.postal_code,
                     };
                     teritory(addressing);
                     $('#id_user').val(data.user.id);
                     $('#address_user').val(data.profile.address);
                     $('#postalCode_user').val(data.profile.postal_code);
                     $('#contact_user').val(data.profile.contact);
                     $('#firstName_user').val(data.user.first_name);
                     $('#lastName_user').val(data.user.last_name);
                     $('#email_user').val(data.user.email);
                     $('#idEmployee_user').val(data.user.id_employee);
                     $('#role_user option').each(function (e, i) {
                         if (i.value.toLowerCase() == data.user.role.toLowerCase()) {
                             i.selected = true;
                         }
                     });
                 },
                 error: function (data) {
                     alert.error(data.statusText);
                 }
             });
             action.update('user', index.master, table.master);
         });

         $(".new-user").on('click', function (e) {
             e.preventDefault();
             //  teritory();
             modalUp('user', 'new');
             validator.resetForm();
             action.store('user', index.master, table.master);
         });

     },
     member: function () {
         //  validator;
         table.member;

         details('#members-table', table.member, format.member);
         $("#reasonGroup").slideDown();
         $("#members-table").on('click', '.delete-member', function () {
             let id = $(this).data('id');
             let url = `${index.member}/${id}`;
             action.destroy(url, table.member);
         });

         $(".new-member").on('click', function (e) {
             e.preventDefault();
             $('#status, #reason_member').parents('.col-lg-12').hide();
             modalUp('member', 'new');
             validator.resetForm();
             action.store('member', index.member, table.member);
         });

         $("#members-table").on('click', '.edit-member', function (e) {
             e.preventDefault();
             modalUp('member', 'update');
             $('#status').parents('.col-lg-12').show();
             let id = $(this).data('id');
             const checkActive = function (val) {
                 if (val == '0') {
                     $("#reasonGroup").slideDown();
                 } else if (val == '1') {
                     $("#reasonGroup").slideUp();
                 }
             }
             $.ajax({
                 url: `${index.member}/${id}/edit`,
                 type: 'get',
                 success: function (data) {
                     $('#reason_member').children().each(function () {
                         if ($(this).val() == data.reason) {
                             $(this).prop('selected', true);
                         }
                     });
                     checkActive(data.status);
                     $('#id_member').val(data.id);
                     $('#nim_member').val(data.nim);
                     $('#name_member').val(data.name);
                     $('#email_member').val(data.email);
                     $('#contact_member').val(data.contact);
                     $('#status').find(`:radio[value="${data.status}"]`).prop("checked", true);

                 },
                 error: function (data) {
                     alert.error(data);
                 }
             });

             let radio = $(':radio[name="status_member"]');

             radio.click(function () {
                 checkActive($(this).filter(':checked').val());
             });

             action.update('member', index.member, table.member);
         });
     },
     publisher: function () {
         table.publisher;
         details('#publishers-table', table.publisher, format.publisher);

         $("#publishers-table").on('click', '.delete-publisher', function () {
             let id = $(this).data('id');
             let url = `${index.publisher}/${id}`;
             action.destroy(url, table.publisher);
             table.book.ajax.reload();
         });

         $(".new-publisher").on('click', function (e) {
             e.preventDefault();
             validator.resetForm();
             modalUp('publisher', 'new');
             action.store('publisher', index.publisher, table.publisher);
             table.book.ajax.reload();
         });

         $("#publishers-table").on('click', '.edit-publisher', function (e) {
             e.preventDefault();
             modalUp('publisher', 'update');

             let id = $(this).data('id');
             $.ajax({
                 url: `${index.publisher}/${id}/edit`,
                 type: 'get',
                 success: function (data) {
                     $('#id_publisher').val(data.id);
                     $('#name_publisher').val(data.name);
                     $('#email_publisher').val(data.email);
                     $('#contact_publisher').val(data.contact);
                     $('#address_publisher').val(data.address);
                 },
                 error: function (data) {
                     alert.error(data);
                 }
             });
             action.update('publisher', index.publisher, table.publisher);
             table.book.ajax.reload();
         });
     },
     booking() {
         table.booking;
         details('#bookings-table', table.booking, format.booking);
         const option = {
             member: {
                 url: index.member,
                 getValue: 'name',
                 listLocation: "data",
                 template: {
                     type: "description",
                     fields: {
                         description: "contact"
                     }
                 },
                 list: {
                     match: {
                         enabled: true
                     },
                     onSelectItemEvent: function () {
                         var value = $("#field1").getSelectedItemData().id;
                         $("#member_booking").val(value).trigger("change");
                     }
                 }
             },
             book: {
                 url: index.book,
                 getValue: 'title',
                 listLocation: "data",
                 template: {
                     type: "description",
                     fields: {
                         description: "author"
                     }
                 },
                 list: {
                     match: {
                         enabled: true
                     },
                     onSelectItemEvent: function () {
                         var value = $("#field2").getSelectedItemData().id;
                         $("#book_booking").val(value).trigger("change");
                     }
                 }
             },
             easyMember() {
                 $("#field1").easyAutocomplete(this.member);
                 $('#field1').on('keyup', function () {
                     $('#member_booking').val('');
                 });
             },
             easyBook() {
                 $("#field2").easyAutocomplete(this.book);
                 $('#field2').on('keyup', function () {
                     $('#book_booking').val('');
                 });
             }
         }

         $('.new-booking').on('click', function (e) {
             option.easyMember();
             option.easyBook();
             $("#field1,#field2").parent().css('width', '100%');
             modalUp('booking', 'new');
             validator.resetForm();

             action.store('booking', index.booking, table.booking);
         });
         $("#bookings-table").on('click', '.delete-booking', function () {
             let id = $(this).data('id');
             let url = `${index.booking}/${id}`;
             action.destroy(url, table.booking);
         });
         $("#bookings-table, #books-table").on('click', '.edit-booking', function (e) {
             option.easyMember();
             option.easyBook();
             let id = $(this).data('id');
             $.ajax({
                 url: `${index.booking}/${id}/edit`,
                 type: 'get',
                 success: function (data) {
                     $('#field1').val(data.member_name);
                     $('#field2').val(data.book_name);
                     $('#member_booking').val(data.member_id);
                     $('#book_booking').val(data.book_id);
                     $('#id_booking').val(data.id);
                 },
                 error: function (data) {
                     console.log(data);
                     alert.error(data);
                 }
             });
             $("#field1,#field2").parent().css('width', '100%');
             modalUp('booking', 'update');
             action.update('booking', index.booking, table.booking);
         });

         $("#bookings-table").on('click', '.renew-booking', function (e) {
             let id = $(this).data('id');
             action.renew(id, index.renew, table.booking);
         });
         $("#bookings-table").on('click', '.full-booking', function (e) {
             let id = $(this).data('id');
             action.fullfill(id, index.fullfill, table.booking);
         });
     },
     guest() {
         table.guest;
         $("#guests-table").on('click', '.delete-guest', function () {
             let id = $(this).data('id');
             let url = `${index.guest}/${id}`;
             action.destroy(url, table.guest);
         });
         $(".new-guest").on('click', function (e) {
             e.preventDefault();
             modalUp('guest', 'new');
             validator.resetForm();
             action.store('guest', index.guest, table.guest);
         });
     }
 };
 export {
     method
 };
