// global variables

let order = []

// global variales end

const getDataFromCookie = async cookieName => {
    console.log('cookiename = ', cookieName);

    let value = document.cookie.split(`${cookieName}=`)[1];
    let strarray = decodeURIComponent(value).split('--');
    console.log('Cookie value : ', strarray);
    let alldata = [];

    for(let i=0; i < strarray.length; i++){
        let item = strarray[i].split(";")[0];
        if(item){
            console.log(item);
            alldata.push(item)
        }
    }

    return alldata
}

const displayData = () => {
    getDataFromCookie('allData')
        .then(res => {

            console.log('Result length : ',res.length);
            console.log('Result : ',res);

            res.forEach(item => {
                console.log('Item : ', item);
                item = JSON.parse(item)
                let starterDiv = document.getElementsByClassName('starter')[0]
                let mainDiv = document.getElementsByClassName('main')[0]
                let desertDiv = document.getElementsByClassName('desert')[0]
                let menuDiv = document.getElementsByClassName('menu')[0]

                switch(item.category)
                {
                    case 'starter':
                        let div = document.createElement('div')
                        div.textContent = item.item_name.trim().replace('+', ' ')
                        starterDiv.appendChild(div)
                        $(div).attr('class', 'p-2')
                        $(div).attr('data-item', item.item_name.trim().replace('+', ' '))
                        $(div).attr('data-price', item.price)

                        let chkbox = document.createElement('input')
                        div.appendChild(chkbox)
                        $(chkbox).attr('type','checkbox')
                        $(chkbox).attr('class','float-end form-check-input me-3')

                        chkbox.addEventListener('change', event => {
                            if(event.target.checked)
                            {
                                let currentorder = {
                                    item,
                                    quantity:1,
                                    price:parseInt(item.price)
                                }

                                order.push(currentorder)
                                console.log(order);
                                calculateOrder()
                            }
                            else
                            {
                                order = order.filter(currentItem => currentItem.item.menu_id !== item.menu_id)
                                calculateOrder()
                            }
                        })

                        let price = document.createElement('span')
                        price.textContent = 'Rs. '+item.price
                        div.appendChild(price)
                        $(price).attr('class', 'float-end me-2')

                        break;
                    case 'main':
                        let div1 = document.createElement('div')
                        div1.textContent = item.item_name.replace('+', ' ')
                        mainDiv.appendChild(div1)
                        $(div1).attr('class', 'p-2')
                        $(div1).attr('data-item', item.item_name.replace('+', ' '))
                        $(div1).attr('data-price', item.price)

                        let chkbox1 = document.createElement('input')
                        div1.appendChild(chkbox1)
                        $(chkbox1).attr('type','checkbox')
                        $(chkbox1).attr('class','float-end form-check-input me-3')

                        chkbox1.addEventListener('change', event => {
                            if(event.target.checked)
                            {
                                let currentorder = {
                                    item,
                                    quantity:1,
                                    price:parseInt(item.price)
                                }

                                order.push(currentorder)
                                // console.log(order);
                                calculateOrder()
                            }
                            else
                            {
                                order = order.filter(currentItem => currentItem.item.menu_id !== item.menu_id)
                                calculateOrder()
                            }
                        })

                        let price1 = document.createElement('span')
                        price1.textContent = 'Rs. '+item.price
                        div1.appendChild(price1)
                        $(price1).attr('class', 'float-end me-2')
                        break;
                    case 'desert':
                        let div2 = document.createElement('div')
                        div2.textContent = item.item_name.replace('+', ' ')
                        desertDiv.appendChild(div2)
                        $(div2).attr('class', 'p-2')
                        $(div2).attr('data-item', item.item_name.replace('+', ' '))
                        $(div2).attr('data-price', item.price)

                        let chkbox2 = document.createElement('input')
                        div2.appendChild(chkbox2)
                        $(chkbox2).attr('type','checkbox')
                        $(chkbox2).attr('class','float-end form-check-input me-3')

                        chkbox2.addEventListener('change', event => {
                            if(event.target.checked)
                            {
                                let currentorder = {
                                    item,
                                    quantity:1,
                                    price:parseInt(item.price)
                                }

                                order.push(currentorder)
                                // console.log(order);
                                calculateOrder()
                            }
                            else
                            {
                                order = order.filter(currentItem => currentItem.item.menu_id !== item.menu_id)
                                calculateOrder()
                            }
                        })

                        let price2 = document.createElement('span')
                        price2.textContent = 'Rs. '+item.price
                        div2.appendChild(price2)
                        $(price2).attr('class', 'float-end me-2')

                        break;
                    default:
                        console.log('In default');


                }
                
             })
        })
}

const calculateOrder = () => {
    let table = document.getElementById('finalorders')
    table.innerHTML = ''
    let bill = 0
    order.forEach((currentItem, index) => {
        console.log(index);
        let str = currentItem.item.item_name.replace('+', ' ') + ' ' + currentItem.quantity + ' ' + 'Rs. ' +currentItem.price
        
        let td1 = document.createElement('td')
        let td2 = document.createElement('td')
        let td3 = document.createElement('td')
        let td4 = document.createElement('td')
        td1.textContent = currentItem.item.item_name.replace('+', ' ')
        td2.textContent = currentItem.quantity
        td3.textContent = 'Rs. ' +currentItem.price
        $(td1).attr('class', 'p-1 px-3 text-center border-end')
        $(td2).attr('class', 'p-1 px-3 text-center border-end')
        $(td3).attr('class', 'p-1 px-3 text-center border-end')
        $(td4).attr('class', 'p-1 text-center')

        let tr = document.createElement('tr')
        tr.appendChild(td1)
        tr.appendChild(td2)
        tr.appendChild(td3)

        let plus = document.createElement('button')

        let plusIcon = document.createElement('i')
        $(plusIcon).attr('class', 'fas fa-plus')
        $(plus).attr('class', 'btn-qty bg-secondary text-white')
        plus.appendChild(plusIcon)
        td4.appendChild(plus)

        $(plus).click(() => {
            order[index].quantity += 1
            order[index].price += parseInt(order[index].item.price)  
            calculateOrder()
        })

        

        let minus = document.createElement('button')
        let minusIcon = document.createElement('i')
        $(minusIcon).attr('class', 'fas fa-minus')
        $(minus).attr('class', 'btn-qty bg-secondary text-white ms-2')
        minus.appendChild(minusIcon)
        td4.appendChild(minus)

        $(minus).click(() => {
            if(order[index].quantity > 1){
                order[index].quantity -= 1
                order[index].price -= parseInt(order[index].item.price)  
                calculateOrder()
            }
        })

        tr.appendChild(td4)
        $(tr).attr('class','border')
        
        table.appendChild(tr)
        bill += currentItem.price
    })
    document.getElementById('amt').innerHTML = 'Rs. '+bill
}


const placeOrder = () => {
    // console.log('Order : ', JSON.stringify(order));
    document.getElementById('finalorder').value = JSON.stringify(order)
    document.getElementById('orderid').value = Date.now()
    document.getElementById('bill').submit();
}

const bookTable = table_id => {
    console.log(table_id);
    document.getElementById('table_id').value = table_id;
    document.getElementById('bookTable').submit();
}
