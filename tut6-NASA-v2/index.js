window.addEventListener('load', function (evt) {
    const my_btn = this.document.querySelector('#my_btn');
    my_btn.addEventListener('click', function (evt) {
        const results = document.querySelector('#results');

        while (results.lastChild) {
            results.removeChild(results.lastChild);
        }

        var search = 'Apollo 11';
        const url = `https://images-api.nasa.gov/search?q=${encodeURIComponent(search)}&media_type=image`;

        async function getData(url) {
            try {
                const response = await fetch(url);
                const json = await response.json();
                if (response.status === 200) {
                    for (var item of json.collection.items) {
                        const card = document.createElement('div');

                        const title = document.createElement('p');
                        title.textContent = item.data[0].title;

                        const img = document.createElement('img');
                        img.setAttribute('alt', item.data[0].description);
                        img.setAttribute('src', item.links[0].href);

                        card.appendChild(title);
                        card.appendChild(img);

                        results.appendChild(card);
                    }

                }
                else {
                    console.log('server error', json.error.message);
                }

            }
            catch (error) {
                console.log('fetch error', error);
            }
        }

        getData(url);




    })

})