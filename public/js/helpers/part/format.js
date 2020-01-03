const format = {
    master: function (d = null) {
        return `
             <div class='row'>
                 <div class='col-lg-2'>
                 Full Name<br>ID Employee<br>Email<br>Contact<br>Address<br>Created<br>update
                 </div>
                 <div class='col-lg-7'>
                 : ${d.first_name +' '+ d.last_name}<br>: ${d.id_employee}<br>: ${d.email}<br>: ${d.contact}<br>: ${d.address}<br>: ${d.created}<br>: ${d.updated}
                 </div>
                 <div class='col-lg-3'>
                 <img style='max-width: 128px;' class='mx-auto d-block rounded-circle img-fluid' src='${d.avatar}'/>
                 </div>
             </div>`;
    },
    publisher: function (d = null) {
        return `
            <div class='row'>
                <div class='col-lg-2'>Name<br>Email<br>Contact<br>Address<br>Created<br>update
                </div>
                <div class='col-lg-10'>
                : ${d.name}<br>: ${d.email}<br>: ${d.address}<br>: ${d.contact}<br>: ${d.created}<br>: ${d.updated}
                </div>
            </div>`;
    },
    member: function (d = null) {
        const table = function (data, action) {
            return `
             <div class='col-lg-12 mt-3'>
                    <div class="table-responsive" >
                    <h5 class='text-center text-muted text-uppercase'>Stock ${action} Book</h5>
                        <div>
                        <table class = "table table-sm align-items-center" id='stock_table'>
                            <thead class='thead-light' >
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">book</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Late</th>
                              </tr>
                            </thead>
                            <tbody class="list">
                                ${data}
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            `;
        }
        let book = d.book;
        console.log(d.book);
        let dataBook = '';
        if (book.length > 0) {
            book.forEach(function (item, index) {
                dataBook += '<tr>';
                dataBook += `<td>${index + 1}</td>`;
                dataBook += `<td>${item.name}</td>`;
                dataBook += `<td>${item.start}</td>`;
                dataBook += `<td>${item.end}</td>`;
                dataBook += `<td>${item.late}</td>`;
                dataBook += '</tr>';
            });
        } else {
            dataBook += '<tr>';
            dataBook += '<td colspan="6" class="text-center">NO DATA</td>';
            dataBook += '</tr>';
        }
        return `
            <div class='row'>
                <div class='col-2'>NIM<br>Name<br>Contact<br>Email</div>
                <div class='col-4'>
                : ${d.nim}<br>: ${d.name}<br>: ${d.contact}<br>: ${d.email}
                </div>
                <div class='col-2'>Status<br>Reason</div>
                <div class='col-4'>
                : ${d.status}<br>: ${d.reason}
                </div>
                ${table(dataBook, 'Store')}
            </div>
            `;
    },
    book: function (d = null) {
        const table = function (data, action) {
            return `
             <div class='col-lg-12 mt-3'>
                    <div class="table-responsive" >
                    <h5 class='text-center text-muted text-uppercase'>Stock ${action} Book</h5>
                        <div>
                        <table class = "table table-sm align-items-center" id='stock_table'>
                            <thead class='thead-light' >
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Info</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody class="list">
                                ${data}
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            `;
        }
        let input = d.stock_in;
        let output = d.stock_out;
        let dataStockIn = '';
        let dataStockOut = '';
        if (input.length > 0) {
            input.forEach(function (item, index) {
                dataStockIn += '<tr>';
                dataStockIn += `<td>${index+1}</td>`;
                dataStockIn += `<td>${item.qty}</td>`;
                dataStockIn += `<td>${item.info}</td>`;
                dataStockIn += `<td>${item.created_at}</td>`;
                dataStockIn += `<td>${item.updated_at}</td>`;
                dataStockIn += `<td><button data-id='${item.id}' class='edit-stockIn btn btn-outline-light btn-sm border-0'><i class="far fa-edit"></i></button><button data-id='${item.id}' class='delete-stockIn btn btn-outline-light btn-sm border-0'><i class="far fa-trash-alt"></i></button></td>`;
                dataStockIn += '</tr>';
            });
        } else {
            dataStockIn += '<tr>';
            dataStockIn += '<td colspan="6" class="text-center">NO DATA</td>';
            dataStockIn += '</tr>';
        }
        if (output.length > 0) {
            output.forEach(function (item, index) {
                dataStockOut += '<tr>';
                dataStockOut += `<td>${index + 1}</td>`;
                dataStockOut += `<td>${item.qty}</td>`;
                dataStockOut += `<td>${item.info}</td>`;
                dataStockOut += `<td>${item.created_at}</td>`;
                dataStockOut += `<td>${item.updated_at}</td>`;

                if (item.member_id === null) {
                    dataStockOut += `<td><button data-id='${item.id}' class='edit-stockOut btn btn-outline-light btn-sm border-0'><i class="far fa-edit"></i></button><button data-id='${item.id}' class='delete-stockOut btn btn-outline-light btn-sm border-0'><i class="far fa-trash-alt"></i></button></td>`;
                } else if (item.member_id !== null) {
                    dataStockOut += `<td>none</td>`;
                }
                dataStockOut += '</tr>';
            });
        } else {
            dataStockOut += '<tr>';
            dataStockOut += '<td colspan="6" class="text-center">NO DATA</td>';
            dataStockOut += '</tr>';
        }


        return `
            <div class='row'>
                <div class='col-2'>Title<br>Category<br>Author<br>Page</div>
                <div class='col-4'>
                : ${d.title}<br>: ${d.category}<br>: ${d.author}<br>: ${d.hal}
                </div>
                <div class='col-2'>Publisher<br>Created<br>Updated</div>
                <div class='col-4'>
                : ${d.publisher}<br>: ${d.created}<br>: ${d.updated}
                </div>
                ${table(dataStockIn,'Store')}

                ${table(dataStockOut,'Out')}
                 <p class='pl-3'><small>* borrowed in member</small></p>
            </div>
            `;
    },
    booking: function (d = null) {
        return `
         <div class='row'>
                <div class='col-2'>Code<br>Member<br>Book</div>
                <div class='col-4'>
                : ${d.code}<br>: ${d.member}<br>: ${d.title}
                </div>
                <div class='col-2'>Out date<br>End date<br>Late<br>Charge</div>
                <div class='col-4'>
                : ${d.out_date}<br>: ${d.end_date}<br>: ${d.late}<br>: ${d.charge}
                </div>
            </div>
        `;
    },
    dashboard: function (d=null) {
        
    }
}

export {
    format
};
