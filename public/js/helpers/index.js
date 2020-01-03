const url = 'http://library.test:8080';

const index = {
    master: `${url}/api/master`,
    publisher: `${url}/api/publisher`,
    member: `${url}/api/member`,
    book: `${url}/api/book`,
    booking: `${url}/api/booking`,
    renew: `${url}/api/renew`,
    guest: `${url}/api/guest`,
    fullfill: `${url}/api/fullfill`,
    stock_in: `${url}/api/stock_in`,
    stock_out: `${url}/api/stock_out`,
};

const pdf = {
    master: `${url}/pdf/master`,
    member: `${url}/pdf/member`,
    publisher: `${url}/pdf/publisher`,
    book: `${url}/pdf/book`,
    booking: `${url}/pdf/booking`,
    guest: `${url}/pdf/guest`,
};


export {
    url,
    index,
    pdf
};
