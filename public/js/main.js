    //   import * as help from './main/helpers.js';
    import {
        page
    } from './helpers/pages.js';
    import {
        url,
        index
    } from './helpers/index.js';
    import * as token from './helpers/token.js';
    $(document).ready(function () {
        let link = window.location.href;

        if (link === `${url}/master`) {
            page.master();

        } else {
            $.ajaxSetup({
                headers: {
                    'Authorization': `Bearer ${token.api}`,
                    'Accept': 'application/json',
                },
            });
            if (link === `${url}/publisher`) {
                page.publisher();
            } else if (link === `${url}/book`) {
                page.book();
                console.log('book');
            } else if (link === `${url}/member`) {
                page.member();
            } else if (link === `${url}/booking`) {
                page.booking();
                console.log('booking');
            } else if (link === `${url}/guest`) {
                page.guest();
            }
        }
        $(".dataTables_wrapper .row:not(:nth-child(2))").addClass("px-4");
        $('[id*="contact"],#nim, [id*="qty"], #hal_book, #postalCode_user,#idEmployee_user').keypress(function (e) {

            let char = e.which || e.keyCode;
            if (char >= 48 && char <= 57) {
                return true;
            } else {
                return false;
            }
        });
        $('.dataTables_wrapper').find('div.dataTables_filter, div.dataTables_paginate').addClass('float-right pr-4');
        $('.dataTables_wrapper').find('div.dataTables_info').addClass('d-inline-flex flex-wrap pl-4');
        $('.dataTables_processing').addClass('mt-2');
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Table search');

        bsCustomFileInput.init();
    });
