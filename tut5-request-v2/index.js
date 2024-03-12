window.addEventListener('load', function (evt) {
    // q1

    const btn1 = this.document.querySelector('#btn1');
    btn1.addEventListener('click', function (evt) {
        const url = 'data.txt';

        async function getData(url) {
            try {
                const response = await fetch(url);
                const text = await response.text();
                if (response.status === 200) {
                    const q1para = document.querySelector('#q1para');
                    q1para.textContent = text;
                }
            }
            catch (error) {
                console.log('fetch error', error);
            }
        }

        getData(url);

    })


    // q2
    const q2form = this.document.querySelector('#q2form');
    q2form.addEventListener('submit', function (evt) {
        evt.preventDefault();

        const actor = document.querySelector('#q2actor').value.trim(),
            rating = document.querySelector('#q2rating').value.trim(),
            data = `actor=${encodeURIComponent(actor)}&rating=${encodeURIComponent(rating)}`;

        const url = 'https://mw159.brighton.domains/ci527/echo.php';

        const request = new Request(url, {
            headers: {
                'content-type': 'application/x-www-form-urlencoded'
            },
            method: 'POST',
            body: data
        })

        async function postData(request) {
            try {
                const response = await fetch(request);
                const text = await response.text();
                if (response.status === 201) {
                    const q2para = document.querySelector('#q2para');
                    q2para.textContent = text;

                }

            }
            catch (error) {
                console.log('fetch error', error);
            }
        }

        postData(request);



    })

})