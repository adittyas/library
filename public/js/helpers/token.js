const csrf = $('meta[name="csrf-token"]').attr('content');
const api = $('meta[name="api-token"]').attr('content');
export {
    csrf,
    api
};
