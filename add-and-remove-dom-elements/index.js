window.addEventListener('load', function (evt) {
    this.document.querySelector('#btn1').addEventListener('click', function (evt) {
        var p = document.createElement('p');
        p.textContent = 'here is a new paragraph';
        document.querySelector('#para').appendChild(p);
    });

    this.document.querySelector('#my_form').addEventListener('submit', function (evt) {
        evt.preventDefault();
        var li = document.createElement('li');
        li.textContent = document.querySelector('#list_item').value.trim();
        document.querySelector('#lst').appendChild(li);

    })


    this.document.querySelector('#btn2').addEventListener('click', function (evt) {
        var lst = document.querySelector('#lst');
        while (lst.lastChild) {
            lst.removeChild(lst.lastChild);
        }
    })

});
