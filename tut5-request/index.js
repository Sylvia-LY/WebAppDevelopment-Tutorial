window.addEventListener('load', function (evt) {


    // q1
    const q1button = this.document.querySelector('#q1button');
    q1button.addEventListener('click', function (evt) {
        // construct a url
        const url = 'data.txt';

        // create request object
        var xhr = new XMLHttpRequest();

        // configure what happens when the response comes back

        xhr.addEventListener('load', function (evt) {
            if (xhr.status == 200) {
                const q1para = document.querySelector('#q1para');
                q1para.textContent = xhr.responseText;

            }
            else {
                console.log(`status code: ${xhr.status}`);
            }
        })

        // make the request
        xhr.open('GET', url, true);
        xhr.send();



    })


    // q2
    const q2form = this.document.querySelector('#q2form');
    q2form.addEventListener('submit', function (evt) {
        evt.preventDefault();

        // get field values
        const actor = document.querySelector('#q2actor').value.trim(),
            rating = document.querySelector('#q2rating').value.trim(),
            data = `actor=${encodeURIComponent(actor)}&rating=${encodeURIComponent(rating)}`;

        const url = 'https://mw159.brighton.domains/ci527/echo.php';

        var xhr = new XMLHttpRequest();

        xhr.addEventListener('load', function (evt) {
            if (xhr.status == 201) {
                const q2para = document.querySelector('#q2para');
                q2para.textContent = xhr.responseText;

            }
            else {
                console.log(`status code: ${xhr.status}`);
            }
        })

        xhr.open('POST', url, true);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.send(data);



    })

})