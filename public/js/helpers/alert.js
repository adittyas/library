import * as token from './token.js';
import {
    validator
} from './validator.js';

var timer = 2000;
const error = function (text, button) {
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: text,
        timer: timer,
        showConfirmButton: button
    })
}
const success = function (text) {
    Swal.fire({
        title: 'Success!',
        text: text,
        type: 'success',
        timer: timer,
        showConfirmButton: false
    })
}
const renew = function (action) {
    Swal.fire({
        title: 'Extend Transaction',
        text: "You want to extend this transaction!",
        // type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, extend it!'
    }).then((result) => {
        if (result.value) {
            action();
        }
    })
}
const fullfill = function (action) {
    Swal.fire({
        title: 'Transaction complete',
        text: "You want to complete this transaction!",
        // type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, complete it!'
    }).then((result) => {
        if (result.value) {
            action();
        }
    })
}

export {
    error,
    success,
    renew,
    fullfill
};
