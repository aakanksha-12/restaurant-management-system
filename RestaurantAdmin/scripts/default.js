const changeStatus = (order_id, status, table_id) => {

    document.getElementById('order_id').value = order_id;
    document.getElementById('status').value = status;
    document.getElementById('table_id').value = table_id;

    document.getElementById('changeStatus').submit()

}