import * as alert from './alert.js';
import * as token from './token.js';


const action = {
    destroy: function (url, table) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5e72e4',
            cancelButtonColor: '#f5365c',
            focusCancel: true,
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'Authorization': `Bearer ${token.api}`,
                        'Accept': 'application/json',
                    },
                    data: {
                        '_token': token.csrf
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.status === '400') {
                            alert.error(data.message, false);
                        } else if (data.status === '200') {
                            const text = 'Your file has been deleted.';
                            alert.success(text);
                            table.ajax.reload();
                        }
                    },
                    error: function (data) {
                        alert.error(data.statusText, true);
                        console.log(data);
                    }
                });
            }
        })
    },
    store: function (formMenu, index, table) {
        $.ajaxSetup({
            headers: {
                'Authorization': `Bearer ${token.api}`,
                'Accept': 'application/json',
            },
        });
        $(`#${formMenu}Form`).unbind('submit').submit(function (e) {
            e.preventDefault();
            console.log(index);
            if ($(this).valid()) {
                var form = new FormData($(this).get(0));
                $.ajax({
                    url: index,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    headers: {
                        'Authorization': `Bearer ${token.api}`,
                        'Accept': 'application/json',
                    },
                    data: form,
                    success: function (data) {
                        console.log(data);
                        if (data.status == '200') {
                            $(`#${formMenu}Modal`).modal('hide');
                            setTimeout(() => {
                                alert.success('New data has been added');
                            }, 500);
                            table.ajax.reload();
                        } else if (data.status == '400') {
                            $(`#${formMenu}Modal`).modal('hide');
                            setTimeout(
                                function () {
                                    alert.error(data.message);
                                }, 500);
                            setTimeout(() => {
                                $(`#${formMenu}Modal`).modal('show');
                            }, 2500);
                        }

                    },
                    error: function (data) {
                        console.log(index);
                        alert.error(data.statusText, true);
                        console.log(data);
                    }
                });
            };
        });
    },
    update: function (formMenu, index, table) {
        $(`#${formMenu}Form`).unbind('submit').submit(function (e) {
            e.preventDefault();

            if ($(this).valid()) {
                var form = new FormData($(this).get(0));
                let id = $(this).find(`#id_${formMenu}`).val();
                $.ajax({
                    url: `${index}/${id}`,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    headers: {
                        'Authorization': `Bearer ${token.api}`,
                        'Accept': 'application/json',
                    },
                    data: form,
                    success: function (data) {
                        console.log(data);
                        if (data.status == '200') {
                            $(`#${formMenu}Modal`).modal('hide');
                            setTimeout(() => {
                                alert.success('update data has been succesfully');
                            }, 500);
                            table.ajax.reload();
                        } else if (data.status == '400') {
                            $(`#${formMenu}Modal`).modal('hide');
                            setTimeout(
                                function () {
                                    alert.error(data.message);
                                }, 500);
                            setTimeout(() => {
                                $(`#${formMenu}Modal`).modal('show');
                            }, 2500);
                        }
                    },
                    error: function (data) {
                        alert.error(data.statusText, true);
                        console.log(data);
                    }
                });
            };
        });
    },
    renew: function (id, index, table) {
        const ajax = function () {
            $.ajax({
                url: `${index}/${id}`,
                type: 'POST',
                headers: {
                    'Authorization': `Bearer ${token.api}`,
                    'Accept': 'application/json',
                },
                success: function (data) {
                    table.ajax.reload();
                    // alert.success('Transaction has been renewed!');
                },
                error: function (data) {
                    alert.error(data.statusText, true);
                    console.log(data);
                }
            });
        }
        alert.renew(ajax);
    },
    fullfill: function (id, index, table) {
        const ajax = function () {
            $.ajax({
                url: `${index}/${id}`,
                type: 'POST',
                headers: {
                    'Authorization': `Bearer ${token.api}`,
                    'Accept': 'application/json',
                },
                success: function (data) {
                    table.ajax.reload();
                    // alert.success('Transaction has been renewed!');
                },
                error: function (data) {
                    alert.error(data.statusText, true);
                    console.log(data);
                }
            });
        }
        alert.fullfill(ajax);
    }
};

export {
    action
};
