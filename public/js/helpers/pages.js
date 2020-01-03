 import {
     method
 } from './part/method.js';
 import {
     url,
     index
 } from './index.js';
 const getPublisher = function () {
     $("#publisher_book").empty().append(`<option value=''>Select...</option>`);
     $.get(index.publisher, function (data, status) {
         data.data.forEach(function (item, index) {
             $("#publisher_book").append(`<option value='${item.id}'>${item.name}</option>`);
         });
     });

 }
 const page = {
     book: function () {
         getPublisher();
         $('[href="#data-book"]').on('click', function () {
             getPublisher();
             $('#titleBook').text('Data Book');
             $("#bg_book").css("background-image", `url(${url}/images/icons/book-bg.jpg)`);
         });
         $('[href="#data-book3"]').on('click', function () {
             $('#titleBook').text('Data Publisher');
             $("#bg_book").css("background-image", `url(${url}/images/icons/publisher_bg.jpg)`);
         });
         $('[href="#data-book2"]').on('click', function () {
             $('#titleBook').text('Data Rack');
             $("#bg_book").css("background-image", `url(${url}/images/icons/rack_bg.jpg)`);
         });
         method.book();
         method.publisher();
         method.booking();
     },
     master: function () {
         method.master();
     },
     member: function () {
         method.member();
     },
     booking: function () {
         method.booking();
     },
     guest: function () {
         method.guest();
     }
 };
 export {
     page
 };
